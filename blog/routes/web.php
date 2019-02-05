<?php

use App\Article;
use Illuminate\Http\Request;
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

Route::get('/', function (Request $req) {

    if(isset($req->search) && $req->search != ""){
        $search = $req->search;
        $list   = Article::listSite(3, $search);
    } else {
        $list   = Article::listSite(3);
        $search = '';
    }
    
    return view('site', compact('list', 'search'));
})->name('site');

Route::get('/article/{id}/{title?}', function ($id) {
    $article = Article::find($id);
    if($article){
        return view('article', compact('article'));
    }
    return redirect()->route('site');
})->name('article');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('can:isAuthor');;

Route::middleware(['auth'])->prefix('admin')->namespace('Admin')->group(function () {
    Route::resource('articles', 'ArticlesController')->middleware('can:isAuthor');;
    Route::resource('users', 'UsersController')->middleware('can:isAdmin');;
    Route::resource('authors', 'AuthorsController')->middleware('can:isAdmin');;
    Route::resource('adm', 'AdminsController')->middleware('can:isAdmin');
});


