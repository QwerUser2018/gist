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

use App\Model\Category;
use App\Model\Gist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;



Route::get('/gistsservices', "ViewsController@actionGistsServices")->name("gistservice");


Route::get('/profile', "ViewsController@actionProfile")->name('Profile');
Route::post('/profile','ApiController@actionAddLink')->name('AddLink');
Route::get('/profile/edit','ApiController@actionEditProfile')->name('EditProfile');
Route::post('/profile/edit','ApiController@actionUpdateProfile')->name('UpdateProfile');


Route::get('/mygists/', "ViewsController@actionNyGists");



Route::post('/mygists', [
    "as"=>"AddCategory",
    "uses"=>"ApiController@actionAddCategory"
]);
Route::delete('/mygists/delete/{id}', "ApiController@actionDelCategory")->name("DelCategory");


Route::get('/mygists/get/{id}', "ApiController@actionGetGists")->name("GetGists");

Route::get('/post', "ApiController@actionGist")->name("Gist");
Route::get('/update', "ApiController@actionUpdateGist")->name("UpdateGist");
Route::post('/post', "ApiController@actionAddAGist")->name("AddGist");
Route::delete('/mygists/del/{id}', "ApiController@actionDelGist")->name("DelGist");
Route::put('/put', "ApiController@actionPutGist")->name("PutGist");


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


