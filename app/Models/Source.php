<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Source extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'sources';

    protected $fillable = [
        'site',
        'url',
        'category_id'
    ];

//    добавить связь с моделью Category belongs to
}
