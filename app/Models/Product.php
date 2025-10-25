<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Kyslik\ColumnSortable\Sortable;

class Product extends Model
{
    use HasFactory, Sortable;

    protected $fillable = [
        'category_id',
        'name',
        'description',
        'price',
        'is_recommended',
        'image',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function favorited_users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    protected static function booted()
    {
        // 更新前に image が差し替えられたら古いファイルを削除
        static::saving(function ($product) {
            if ($product->isDirty('image')) {
                $original = $product->getOriginal('image');
                if ($original) {
                    Storage::disk('public')->delete($original);
                }
            }
        });

        // モデル削除時に画像ファイルを削除
        static::deleting(function ($product) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
        });

        // is_recommendedが変更されたらキャッシュをクリア
        static::saved(function ($product) {
            if ($product->wasChanged('is_recommended')) {
                \Illuminate\Support\Facades\Cache::forget('recommended_products');
            }
        });
    }
}
