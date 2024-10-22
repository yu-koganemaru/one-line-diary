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
     *  投稿の作成
     */
    public function create(array $attributes)
    {
        return $this->postRepository->create($attributes);
    }

    /**
     *  ページネーションデータの取得
     */
    public function getList()
    {
        return $this->postRepository->getList(['images'], Posts::getValue('トップページネーション'));
    }

}
