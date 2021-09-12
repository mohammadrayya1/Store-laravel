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
Route::get('/Dashbourd','Admin\CategoriesController@index');


Route::group(['prefix'=>
    'admin/categories',
    'namespace'=>'Admin',
    'as'=>'admin.categories.'],
    function ()
    {
        Route::get('/create','CategoriesController@create')->name('create');
        Route::get('/','CategoriesController@index')->name('index');
        Route::post('/create','CategoriesController@store')->name('store');
        Route::get('/{id}/edit','CategoriesController@edit')->name('edit');
        Route::Put('/{id}','CategoriesController@update')->name('update');
        Route::delete('/{id}','CategoriesController@delete')->name('delete');

    });


Route::get('admin/users/{id}','Admin\UserController@show')->name('admin.users.show');
Route::get('admin/tages/{id}','Admin\TagsController@products')->name('admin.Tags.products');

Route::get('/', function () {
    return view('welcome');
});



    Route::get('regular',function ()
    {
        $text="0935655464";
        $exp='/^(093|049)([0-9]{7})$/';
        dd(preg_match($exp,$text));
    });

