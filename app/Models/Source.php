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

    protected $table = 'sources';

    public function getCategories(): Collection
    {
        return DB::table($this->table)->get();
    }

    public function getSourceById(int $id): mixed
    {
        return DB::table($this->table)->find($id);
    }
}
