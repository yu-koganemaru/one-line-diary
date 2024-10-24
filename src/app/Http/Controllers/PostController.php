<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Contracts\View\View;
use Log;

class PostController extends Controller
{
    public function __construct(
        private PostService $postService
    ) {
    }

    /**
     * 一覧ページの表示
     */
    public function index(): View
    {
        // 投稿一覧を取得する
        $post = $this->postService->getList();

        return view('index',['posts' => $post]);
    }

    /**
     * 投稿作成ページの表示
     */
    public function create(): View
    {
        return view('post');
    }

     /**
     * 投稿
     */
    public function store(PostStoreRequest $request): Redirector|RedirectResponse
    {
      
      $this->postService->create(
        ['main_text' => $request->main_text],
        $request->file('image')
      );

      // 一覧へ遷移する
      return redirect('/');
    }

    /**
     * 編集ページの表示
     */
    public function edit($id): View
    {
      $post = $this->postService->getOneById($id);

      return view('edit',['post' => $post]);
    }

    /**
     * 編集
     */
    public function update(PostUpdateRequest $request, $id): Redirector|RedirectResponse
    {

      // 更新項目の設定
      $attributes = [];
      if($request->main_text) {
        $attributes['main_text'] = $request->main_text;
      }
      
      $this->postService->update(
        $id, 
        $attributes, 
        $request->file('image')
      );

      // 一覧へ遷移する
      return redirect('/');
        
    }

    /**
     * 削除
     */
    public function destroy($id): Redirector|RedirectResponse
    {
      // 投稿を削除する
      $this->postService->destroy($id);

      // 一覧へ遷移する
      return redirect('/');
    }
}