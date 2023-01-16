<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use CategoryTrait;

    public function index() {
        return \view('news.categories', [
            'categories' => $this->getCategory(),
        ]);
    }

    public function show(int $id) {
        return \view('news.showCategory', [
                'category' => $this->getCategory($id)[1],
            ]);
    }
}
