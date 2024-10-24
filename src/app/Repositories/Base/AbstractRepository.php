<?php

namespace App\Repositories\Base;

use Illuminate\Contracts\Auth\Guard;
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
     * 取得系
     */

    public function getAll(): ?Collection
    {
        return $this->model->all();
    }

    public function getList( array $with = [], int $count = 10): LengthAwarePaginator
    {
        return $this->model->with($with)->paginate($count);
    }

    /**
     * 検索系
     */
    public function getOneById(int $id, array $with = []): ?Model
    {
        return $this->model->with($with)->find($id);
    }

    public function getByIds(array $ids, array $with = []): Collection
    {
        return $this->model->whereIn($this->model->getKeyName(), $ids)->with($with)->get();
    }

    public function getFirstWhere(array $params, array $with = []): ?Model
    {
        return $this->model->where($params)->with($with)->first();
    }

    /**
     * 作成系
     */
    public function create(array $attributes): Model
    {
        return $this->model->create($attributes);
    }

    /**
     * 更新系
     */
    public function update(int $id, array $attributes): ?Model
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
     * 削除系
     */
    public function destroy(int $id)
    {
        return $this->model->destroy($id);
    }

}
