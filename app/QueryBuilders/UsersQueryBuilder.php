<?php

declare(strict_types=1);

namespace App\QueryBuilders;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

final class UsersQueryBuilder extends QueryBuilder
{

    public Builder $model;

    public function __construct()
    {
        $this->model = User::query();
    }

    function getAll(): Collection
    {
        return $this->model->get();
    }

    public function getUsersWithPagination(int $quantity = 10): LengthAwarePaginator
    {
        return $this->model->paginate($quantity);
    }

    public function getUserById(int $id): Model
    {
        return $this->model->where('id', $id)->get()[0];
    }

    public function getUserByEmail(str $email): Model
    {
        return $this->model->where('email', $email)->get()[0];
    }

    public function getNonAdmins(): array|Collection
    {
        return $this->model->where('is_admin', false)->get();
    }
}
