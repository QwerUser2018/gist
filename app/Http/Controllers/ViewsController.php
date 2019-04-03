<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ViewsController extends Controller
{
    public function actionGistsServices(){
        return view('gistsservices');
    }
    public function actionProfile(){
        return view('profile');
    }
    public function actionNyGists($id=null){
        $categories=DB::table("categories")
            ->select('*')->get();
        if ($id!=null){
            $gists=DB::table("gist")->select('*')->where("cat_id",$id)->get();
            return view('mygists',[
                "categories"=>$categories,
                "gists"=>$gists
            ]);


        }
        return view('mygists',[
        "categories"=>$categories,
        ]);

    }
    public function actionLogin(){
        return view('login');
    }
    public function actionRegister(){
        return view('signup');
    }
}
