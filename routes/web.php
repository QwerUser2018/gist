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

use Illuminate\Support\Facades\Route;

Route::get('/', "ViewsController@actionGistsServices");

Route::get('/gistsservices', "ViewsController@actionGistsServices");
Route::get('/profile', "ViewsController@actionProfile");
Route::get('/mygists/', "ViewsController@actionNyGists");
Route::get('/login', "ViewsController@actionLogin");
Route::get('/registration', "ViewsController@actionRegister");



Route::post('/mygists', [
    "as"=>"AddCategory",
    "uses"=>"ApiController@actionAddCategory"
]);
Route::delete('/mygists/delete/{id}', "ApiController@actionDelCategory")->name("DelCategory");


Route::get('/mygists/get/{id}', "ApiController@actionGetGists")->name("GetGists");
Route::get('/post', "ApiController@actionGist")->name("Gist");
Route::post('/post', "ApiController@actionAddAGist")->name("AddGist");
Route::delete('/mygists/del/{id}', "ApiController@actionDelGist")->name("DelGist");
Route::put('/put', "ApiController@actionPutGist")->name("PutGist");

