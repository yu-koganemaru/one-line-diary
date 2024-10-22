<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use App\Services\PostImageService;
use App\Services\LocalStorageService;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function __construct(
        private PostService $postService,
        private PostImageService $postImageService,
        private LocalStorageService $localStorageService
    ) {
    }

    /**
     * 一覧ページの表示
     */
    public function indexView()
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
    public function postView()
    {
        return view('post');
    }

     /**
     * 投稿
     */
    public function post(PostRequest $request)
    {
      // 本文を保存する
      $this->postService->create(['main_text' => $request->main_text]);

      // 画像を保存する
      if($filepath = $this->localStorageService->storeFile($request->file('image'), 'public/img')){
        // 画像パスの保存
        $this->postImageService->create(['image_path' => $filepath]);
      }

      // 一覧へ遷移する
      return redirect('/');
    }
}