<?php
declare (strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Enums\NewsStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\EditRequest;
use App\Models\News;
use App\QueryBuilders\CategoriesQueryBuilder;
use App\QueryBuilders\NewsQueryBuilder;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
//        $model = new News();
//        $newsList = $model->getNews();
//        return \view('admin.news.index',[
//            'newslist'=> $newsList,
//        ]);

        return \view('admin.news.index',[
            'newslist'=> $newsQueryBuilder->getNewsWithPagination(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('admin.news.create',[
            'categories'=>  $categoriesQueryBuilder->getAll(),
            'statuses' => NewsStatus::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(CreateRequest $request): RedirectResponse
    {
//        $news = new News($request->except('_token', 'category_ids'));

        $news = News::create($request->validated());

        if ($news) {
            $news->categories()->attach($request->getCategoryIds());
            return redirect()->route('admin.news.index')->with('success', __('messages.admin.news.success'));
        }

        return \back()->with('error', __('messages.admin.news.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id): void
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @param CategoriesQueryBuilder $categoriesQueryBuilder
     * @return View
     */
    public function edit(News $news, CategoriesQueryBuilder $categoriesQueryBuilder): View
    {
        return \view('admin.news.edit',[
            'news' => $news,
            'categories'=>  $categoriesQueryBuilder->getAll(),
            'statuses' => NewsStatus::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return RedirectResponse
     */
    public function update(EditRequest $request, News $news): RedirectResponse
    {
        $news = $news->fill(($request->validated()));

        if ($news->save()) {
//            $news->categories()->sync($request->input('category_ids'));
            $news->categories()->sync($request->getCategoryIds());
            return redirect()->route('admin.news.index')->with('success', 'News updated');
        }

        return \back()->with('error', 'News not updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return RedirectResponse
     */
    public function destroy(News $news): RedirectResponse
    {
        try {
            $news->delete();
            return redirect()->route('admin.news.index')->with('success', 'News deleted');
//            return response()->json('ok');
        } catch (Exception $exception) {
            \Log::error($exception->getMessage(), [$exception]);
            return \back()->with('error', 'News not deleted');
//            return response()->json('error', 400);
        }
    }
}
