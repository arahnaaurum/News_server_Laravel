<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\EditRequest;
use App\Models\Category;
use App\QueryBuilders\CategoriesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
//        $model = new Category();
//        $categories = $model->getCategories();
        return \view('admin.categories.index',[
            'categories' => $categoriesQueryBuilder->getCategoriesWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return \view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
//        $request->validate([
//            'title' => 'required',
//        ]);

        $category = Category::create($request->validated());

        if ($category) {
            return redirect()->route('admin.categories.index')->with('success', 'Category added');
        }

        return \back()->with('error', 'Category not added');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function show($id): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */

    public function edit(Category $category): View
    {
        return \view('admin.categories.edit',[
            'category'=>  $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Category $category): RedirectResponse
    {
        $category = $category->fill(($request->validated()));

        if ($category->save()) {
            return redirect()->route('admin.categories.index')->with('success', 'Category updated');
        }

        return \back()->with('error', 'Category not updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy(Category $category): RedirectResponse
    {
        try {
            $category->delete();
            return redirect()->route('admin.categories.index')->with('success', 'Category deleted');
        } catch(Exception $exception) {
            return \back()->with('error', 'Category not deleted');
        }
    }
}
