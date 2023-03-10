<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class InfoController extends Controller
{

    public function index(): View
    {
        return \view('info.index', []);
    }

}
