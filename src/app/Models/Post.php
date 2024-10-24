<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'main_text'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [];


    public static function boot(): void
    {
        parent::boot();

        // 削除の際に画像テーブルも削除
        static::deleting(function ($post) {
            $post->image()->delete();
        });
    }

    /**
     * 投稿画像
     */
    public function image()
    {
        return $this->hasOne('App\Models\PostImage', 'post_id', 'id');
    }
}
