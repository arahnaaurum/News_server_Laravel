<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    use CategoryTrait;

    public function index(): View
    {
        return \view('news.categories', [
            'categories' => $this->getCategory(),
        ]);
    }

    public function show(int $id): View
    {
        return \view('news.showCategory', [
                'category' => $this->getCategory($id)[1],
            ]);
    }
}
