<?php

namespace App\Services;

use App\Repositories\PostRepository;
use App\Repositories\PostImageRepository;
use App\Services\StorageService;
use Illuminate\Http\UploadedFile;
use App\Enums\Posts;

class PostService
{
    public function __construct(
        private PostRepository $postRepository,
        private PostImageRepository $postImageRepository,
        private StorageService $storageService
    ){
    }
    
    /**
     *  ページネーションデータの取得
     */
    public function getList()
    {
        return $this->postRepository->getList(['image'], Posts::getValue('トップページネーション'));
    }

    /**
     *  取得
     */
    public function getOneById(int $id)
    {
        return $this->postRepository->getOneById($id, ['image']);
    }

    /**
     *  作成
     */
    public function create(array $attributes, UploadedFile|null $file = null): void
    {
        // 本文を保存する
        $post = $this->postRepository->create($attributes);

        // 画像を保存する
        if($filepath = $this->storageService->storeFile($file, '/img')){
            
            // パスの保存
            $this->postImageRepository->create([
            'post_id' => $post->id,
            'image_path' => str_replace('img/', 'storage/img/', $filepath)
            ]);
        }

    }

    /**
     *  更新
     */
    public function update(int $id, array $attributes, UploadedFile|null $file = null ): void 
    {
      
        if($file){

            // 古い画像を削除する
            $post = $this->postRepository->getOneById($id);
            if($post->image){
                $this->storageService->deleteFile(str_replace('storage/img/', 'img/', $post->image->image_path));
            }
            
            // 画像を保存する
            $filepath = $this->storageService->storeFile($file, '/img');
            $imgFilepath = str_replace('img/', 'storage/img/', $filepath);

            // データの更新 or 作成
            $this->postImageRepository->updateOrCreate(
                ['post_id' => $id],
                ['image_path' => $imgFilepath]
            );
        }
  
        // 本文を保存する
        $this->postRepository->update($id, $attributes);
        
    }

    /**
     *  削除
     */
    public function destroy(int $id)
    {
        // 古い画像を削除する
        $post = $this->postRepository->getOneById($id);
        if($post->image){
            $this->storageService->deleteFile(str_replace('storage/img/', 'img/', $post->image->image_path));
        }

        return $this->postRepository->destroy($id);
    }

}
