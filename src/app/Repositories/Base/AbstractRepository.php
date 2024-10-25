<?php

namespace App\Repositories\Base;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

abstract class AbstractRepository
{
    /** @var string */
    private $modelClass;

    /** @var Model */
    protected $model;

    public function __construct(?string $modelClass = null)
    {
        $this->modelClass = $modelClass ?: self::guessModelClass();
        $this->model = app($this->modelClass);
    }

    private static function guessModelClass(): string
    {
        return preg_replace('/(.+)\\\\Repositories\\\\(.+)Repository$/m', '$1\Models\\\$2', static::class);
    }

    /**
     * 取得
     */
    public function getList(array $with = [], int $count = 10): LengthAwarePaginator
    {
        return $this->model->latest()->with($with)->paginate($count);
    }

    /**
     * 検索
     */
    public function getOneById(int $id, array $with = []): ?Model
    {
        return $this->model->with($with)->find($id);
    }

    /**
     * 作成
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * 更新
     */
    public function update(int $id, array $attributes): Model
    {
        return tap($this->model->find($id), function ($model) use ($attributes) {
            if ($model !== null) {
                $model->update($attributes);
            }
        });
    }

    /**
     * 更新 or 作成
     */
    public function updateOrCreate(array $search, array $attributes): Model
    {
        return $this->model->updateOrCreate($search, $attributes);
    }


    /**
     * 削除
     */
    public function destroy(int $id): bool
    {
        return $this->model->destroy($id);
    }

}
