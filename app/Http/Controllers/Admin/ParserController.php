<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $parser)
    {
        $load = $parser->setLink("https://www.vedomosti.ru/rss/news")
            ->getParseData();

        foreach ($load['news'] as $item) {
            $newsData = [
                'title' => $item['category'],
                'description' => $item['title'],
                'image' => $load['image'],
                'status'=> 'draft',
            ];

            $news = News::create($newsData);
        }
        dd($newsData);
    }
}
