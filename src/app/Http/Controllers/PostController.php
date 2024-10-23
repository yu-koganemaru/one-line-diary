<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use App\Services\PostImageService;
use App\Services\StorageService;
use App\Http\Requests\PostPublishRequest;

class PostController extends Controller
{
    public function __construct(
        private PostService $postService,
        private PostImageService $postImageService,
        private StorageService $storageService
    ) {
    }

    /**
     * 一覧ページの表示
     */
    public function index()
    {
        return view('index',
            [
                // 投稿一覧を取得する
                'posts' => $this->postService->getList()
            ]
        );
    }

    /**
     * 投稿作成ページの表示
     */
    public function create()
    {
        return view('post');
    }

     /**
     * 投稿
     */
    public function store(PostPublishRequest $request)
    {
      // 本文を保存する
      $post = $this->postService->create(['main_text' => $request->main_text]);

      // 画像を保存する
      if($filepath = $this->storageService->storeFile($request->file('image'), '/img')){
        
        // パスの保存
        $this->postImageService->create([
          'post_id' => $post->id,
          'image_path' => str_replace('img/', 'storage/img/', $filepath)
        ]);
      }

      // 一覧へ遷移する
      return redirect('/');
    }

    /**
     * 編集ページの表示
     */
    public function edit($id)
    {
        //
    }

    /**
     * 編集
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 削除
     */
    public function destroy()
    {
      // 投稿を削除する
      $this->postService->destroy($request->post_id);

      // 一覧へ遷移する
      return redirect('/');
    }
}