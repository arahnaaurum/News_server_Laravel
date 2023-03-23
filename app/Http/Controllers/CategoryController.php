<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use App\QueryBuilders\CategoriesQueryBuilder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use CategoryTrait;

    public function index(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('categories.index',[
            'categories'=> $categoriesQueryBuilder->getAll(),
        ]);
    }

    public function show(CategoriesQueryBuilder $categoriesQueryBuilder, int $id): View
    {
        return \view('categories.show', [
                'category' => $categoriesQueryBuilder->getCategoryById($id),
            ]);
    }
}
