<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    protected $fillable = [
        'title',
        'author',
        'description',
        'image',
        'status'
    ];

    protected $casts = [
        'category_ids' => 'array',
    ];

    protected function author(): Attribute
    {
        return Attribute::make(
            get: fn($value): string => strtoupper($value),
//            set: fn($value): string => strtolower($value)
        );
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'category_has_news',
            'news_id', 'category_id',
        'id', 'id');
    }

    public function getNews(): Collection
    {
        return DB::table($this->table)->get();
//        return DB::select("select id, title, author, description, created_at from {$this->table}");
    }

    public function getNewsById(int $id): mixed
    {
        return DB::table($this->table)->find($id, ['id', 'title', 'author', 'description', 'created_at']);
//        return DB::selectOne("select id, title, author, description from {$this->table} where id = :id", [
//            'id' => $id,
//        ]);
    }
}
