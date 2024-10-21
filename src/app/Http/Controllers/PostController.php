<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\PostService;
use Illuminate\Http\Request;
use Log;


class PostController extends Controller
{
    public function __construct(
        private PostService $postService
    ) {
    }

    /**
     * 一覧ページ
     */
    public function index()
    {
        // 投稿一覧を取得する
        $posts = $this->postService->getList();
        
        return view(
            'index',
            [
                'posts' => $posts
            ]
        );
    }
}