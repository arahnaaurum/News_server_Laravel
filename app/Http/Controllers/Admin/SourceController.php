<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Source\CreateRequest;
use App\Http\Requests\Source\EditRequest;
use App\Models\Source;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\SourcesQueryBuilder;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(SourcesQueryBuilder $sourcesQueryBuilder): View
    {
        return \view('admin.sources.index',[
            'sources' => $sourcesQueryBuilder->getSourcesWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder)
    {
        return \view('admin.sources.create', [
            'categories'=>  $categoriesQueryBuilder->getAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
        $source = Source::create($request->validated());

        if ($source->save()) {
            return redirect()->route('admin.sources.index')->with('success', 'Source added');
        }

        return \back()->with('error', 'Source not added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Source $source
     * @return View
     */

    public function edit(Source $source, CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('admin.sources.edit',[
            'source'=>  $source,
            'categories'=>  $categoriesQueryBuilder->getAll(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditRequest $request
     * @param Source $source
     * @return RedirectResponse
     */
    public function update(EditRequest $request, Source $source): RedirectResponse
    {
        $source = $source->fill(($request->validated()));

        if ($source->save()) {
            return redirect()->route('admin.sources.index')->with('success', 'Source updated');
        }

        return \back()->with('error', 'Source not updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Source $source
     * @return RedirectResponse
     */
    public function destroy(Source $source): RedirectResponse
    {
        try {
            $source->delete();
            return redirect()->route('admin.sources.index')->with('success', 'Source deleted');
        } catch (Exception $exception) {
            return \back()->with('error', 'Source not deleted');
        }
    }
}
