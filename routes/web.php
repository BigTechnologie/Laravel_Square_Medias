<?php

use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

////////////////////////////////////////////////////////////////////////////////// (1)
/*
Route::get('/', function () {
    return view('welcome'); 
});

// Retourner une chaine d ecaractère
Route::get('/hello', function() {
    return 'Hello Dawan';
});

// retourner du json
Route::get('/data', function() {
    return [
        'name' => 'Jehann',
        'age' => 56
    ];
});
*/

/////////////////////////////////////////////////////////////////////////////////// (2)
/*
// Nommage des route
Route::get('/', function () {
    return view('welcome');
})->name('welcome'); //

Route::prefix('post')->name('post.')->group(function () {
    Route::get('/hello', function () {
        return 'Hello Word';
    })->name('hello');

    //Route dynamique dans Laravel
    Route::get('/show/{slug}-{id}', function (string $slug, int $id) {
        return [
            'slug' => $slug,
            'id' => $id
        ];
    })->where(['id' => '[0-9]+', 'slug' => '[a-z0-9-]+'])->name('show');

    // Utilisation de l'objet Request: HTTP Request
    Route::get('/data', function (Request $request) {
        return [
            'name' => $request->input('names', 'Jean'),
            'value' => $request->input('value', '25'),
            'all' => $request->all()
        ];
    })->name('data');

    // Les redirections
    Route::get('/new', function () {
        
        // return [
        //     //'welcome' =>route('welcome'),
        //     'hello' => route('hello')
        // ];
        
        return to_route('post.show', ['id' => 96, 'slug'=> 'new-article-symfony']);
        //return redirect()->route('welcome');
        //return redirect()->route('post.data');

    })->name('new');
});
*/

// Les controller
 Route::get('/', 'App\Http\Controllers\BlogController@index')->name('welcome');

Route::prefix('blog')->namespace('App\Http\Controllers')->name('blog.')->group(function() {
    Route::get('/show/{slug}-{id}', 'BlogController@show')
        ->where(['id' => '[0-9]+', 'slug' => '[a-z0-9-]+'])
        ->name('show');
    Route::get('/categories', 'BlogController@categories')->name('categories');
    Route::get('/categories/show/{id}', 'BlogController@showCategory')->name('show.category');
});

//Mise en place des routes pour l'administration du site
Route::prefix('admin')->namespace('App\Http\Controllers')->name('admin.')->group(function() {

    Route::get('/posts', 'PostController@index')->name('post.index');
    Route::get('/posts/create', 'PostController@create')->name('post.create');
});

// Les routes de secours (erreur 404)
Route::fallback(function() {
    return "Oooops Cette page n'existe pas !";
});

