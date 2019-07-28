<?php

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
use App\Articles\ArticlesRepository;

Route::get('/', function () {
    return view('articles.index', [
        'articles' => App\Article::all(),
    ]);
});

Route::get('search', function (ArticlesRepository $repository) {
    $articles = $repository->search(request('q'));

    return view('articles.index', [
        'articles' => $articles,
    ]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
