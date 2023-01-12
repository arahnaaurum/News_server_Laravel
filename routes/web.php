<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello/{name}', static function (string $name): string {
    return "hello, {$name}";
});

Route::get('/info', static function (): string {
    return "Here is some infromation about project...";
});

Route::get('/news/{id}', static function (string $id): string {
    return "You are reading the news with id {$id}";
});