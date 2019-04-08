<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Gist;
use Illuminate\Http\Request;
//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;



class ApiController extends Controller
{
    //--------Действия с категориями------------------



    public function actionAddCategory(Request $request){
        try{
            DB::beginTransaction();

            Category::create([
                "category_name"=>$request->post("CategoryName"),
                "user_id"=>Auth::id()
            ])->save();

            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
        }
       return redirect()->back();


    }
    public function actionDelCategory($id){


        try{
            DB::beginTransaction();
            Category::destroy($id);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
        }

        return redirect()->back();


    }

  //--------Действия с гистами------------------

    public function actionGetGists($id){
           $gists=Gist::where("cat_id",$id)->get();
           //echo count($gists);
           if (count($gists)==0){
               return redirect()->back();
           }
           return view('gistslist',[
                 "gists"=>$gists
             ]);

         }



    public function actionGist(){
        $categories=Category::where("user_id",Auth::id())->get();
        return view('addgist',[
            "categories"=>$categories
        ]);

    }
    public function actionAddAGist(Request $request){

        try{
            DB::beginTransaction();
            /*Gist::create(
                [   "gist_name"=>$request->post("gistName"),
                    "gist_text"=>$request->post("gist_text"),
                    "cat_id"=>$request->post("categoryId")]
            )->save();*/
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
        }
        return redirect()->route('AddCategory');



    }
    public function actionDelGist($id){
        try{
            DB::beginTransaction();
            Gist::destroy($id);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
        }

        return redirect()->back();

    }
    public function actionPutGist(){

    }
}
