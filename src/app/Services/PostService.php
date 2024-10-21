<?php

namespace App\Services;

use App\Repositories\PostRepository;
use App\Enums\Posts;

class PostService
{
    public function __construct(
        private PostRepository $postRepository
    ){
    }

    /**
     *  ページネーションデータの取得
     */
    public function getList()
    {
        return $this->postRepository->getList(Posts::getValue('トップページネーション'));
    }

}
