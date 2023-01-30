<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use App\QueryBuilders\NewsQueryBuilder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(NewsQueryBuilder $newsQueryBuilder): View
    {
        return \view('news.index',[
            'newslist'=> $newsQueryBuilder->getNewsWithPagination(),
        ]);
    }

    public function show(NewsQueryBuilder $newsQueryBuilder, int $id): View
    {
        return \view('news.show', [
            'news' => $newsQueryBuilder->getNewsById($id),
        ]);
    }
}
