<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\JobNewsParsing;
use App\Models\News;
use App\QueryBuilders\SourcesQueryBuilder;
use App\Services\Contracts\Parser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Orchestra\Parser\Xml\Facade as XmlParser;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function __invoke(Request $request, Parser $parser, SourcesQueryBuilder $sourcesQueryBuilder): string
    {
        $urls = $sourcesQueryBuilder->getAll();

        foreach($urls as $url) {
            \dispatch(new JobNewsParsing($url['url']));
        }

        return 'Parsing completed';
    }
}
