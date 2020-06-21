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

Route::resource('/posts','PostController');
Route::get('/insert', function () {

    DB::insert("insert into posts(title,content) values (?,?)",array('ttile ','c'));
    return 'Done';
});


Route::get('/read', function () {

    $results = DB::select("select * from  posts where id = ?",array(1));
    return $results;
});


Route::get('/update', function () {

    $results = DB::update("update posts set title ='updated' where id = ?",array(1));
    return $results;
});

Route::get('/delete', function () {

    $results = DB::delete("delete from posts  where id = ?",array(1));
    return $results;
});

Route::get('/readorm', function () {

    $results = \App\Post::all();
    $results = \App\Post::find(2);
    return $results;
});

Route::get('/insertorm', function () {

    $post = new \App\Post();
    $post->title = "nothing ";
    $post->content = "broken";
    return $post->save();
});


Route::get('/createorm', function () {


    return \App\Post::create(array('title'=>'XXX','content'=>'YYY'));
});

Route::get('/updateorm', function () {


    return \App\Post::where('id',2)->update(array('title'=>'updated right now'));
});


Route::get('/deleteorm', function () {


    return \App\Post::where('id',2)->delete();
});

Route::get('/destroyorm', function () {


    return \App\Post::destroy([3]);
});
