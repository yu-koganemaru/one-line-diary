<?php

namespace App\Services;

use App\Repositories\PostImageRepository;

class PostImageService
{
    public function __construct(
        private PostImageRepository $postImageRepository
    ){
    }

    /**
     *  画像の保存
     */
    public function create(array $attributes)
    {
        return $this->postImageRepository->create($attributes);
    }

}
