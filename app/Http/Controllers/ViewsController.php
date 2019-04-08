<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Gist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewsController extends Controller
{
    public function actionGistsServices(){
        return view('gistsservices');
    }
    public function actionProfile(){
        return view('profile');
    }
    public function actionNyGists(){
        $categories=Category::where("user_id",Auth::id())->get();
        $gists=Gist::all();
            return view('mygists',[
                "categories"=>$categories,
                "gists"=>$gists
            ]);
    }
}
