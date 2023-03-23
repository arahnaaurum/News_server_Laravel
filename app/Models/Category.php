<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'title',
        'description',
    ];

    protected $casts = [
        'news_ids' => 'array',
    ];

    public function news(): BelongsToMany
    {
        return $this->belongsToMany(News::class, 'category_has_news',
            'category_id', 'news_id',
            'id', 'id');
    }

    public function getCategories(): Collection
    {
        return DB::table($this->table)->get();
    }

    public function getCategoryById(int $id): mixed
    {
        return DB::table($this->table)->find($id, ['id', 'title', 'description']);
    }

    //    добавить связь с моделью Source has many
}
