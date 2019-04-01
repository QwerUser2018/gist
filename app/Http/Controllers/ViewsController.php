<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewsController extends Controller
{
    public function actionGistsServices(){
        return view('gistsservices');
    }
    public function actionProfile(){
        return view('profile');
    }
    public function actionNyGists(){
        return view('mygists',[
            'data'=>file_get_contents('/Users/yanahalata/Desktop/app/resources/data/gists.json'),
        ]);
    }
    public function actionLogin(){
        return view('login');
    }
    public function actionRegister(){
        return view('signup');
    }
}
