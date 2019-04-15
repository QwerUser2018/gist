<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Gist;
use App\Model\Link;
use App\Model\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ViewsController extends Controller
{
    public function actionGistsServices(){
        return view('gistsservices');
    }
    public function actionProfile(){
        $categories=Category::where("user_id",Auth::id())->get();
        $links=Link::where("user_id",Auth::id())->get();
        $photo=Photo::where("user_id",Auth::id())->get()->count()>0?Photo::where("user_id",Auth::id())->value("file_path"):asset("images/def_img.jpeg");

        //$photo=asset("images/def_img.jpeg");
        //$photo=Photo::where("user_id",Auth::id())->get();
        //$countgist=count()
        //вывод количества гистов у пользователя
        return view('profile',[
            "categories"=>$categories,
            "links"=>$links,
            "photo"=>$photo
        ]);
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
