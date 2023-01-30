<?php

namespace App\QueryBuilders;

use App\Models\Source;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

final class SourcesQueryBuilder extends QueryBuilder
{

    public Builder $model;

    public function __construct()
    {
        $this->model = Source::query();
    }

    function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getSourcesWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

    public function getSourceById(int $id): Model
    {
        return $this->model->where('id', $id)->get()[0];
    }
}
