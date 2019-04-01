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
Route::get('/mygists', "ViewsController@actionNyGists");
Route::get('/login', "ViewsController@actionLogin");
Route::get('/registration', "ViewsController@actionRegister");


Route::get('/category', "ApiController@actionGetCategories");
Route::post('/category/{Categorytoken}/{CategoryName}', "ApiController@actionAddCategory");
Route::delete('/category/{Categorytoken}', "ApiController@actionDelCategory");


Route::get('/gist/{Categorytoken}', "ApiController@actionGetGists");
Route::post('/gist/{id}/{name}/{text}', "ApiController@actionAddGist");
Route::delete('/gist/{idGist}', "ApiController@actionDelGist");
Route::put('/gist/{id}/{name}/{text}', "ApiController@actionPutGist");

