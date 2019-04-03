<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;



class ApiController extends Controller
{
    //--------Действия с категориями------------------



    public function actionAddCategory(Request $request){
        try{
            DB::beginTransaction();
            DB::table("categories")
                ->insert([
                    "category_name"=>$request->post("CategoryName"),
                    "user_id"=>"1"]);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
        }
        /*$categories=DB::table("categories")
            ->select('*')->get();
        foreach ($categories as $category){
            echo $category->category_name;
            echo $category->category_id;
        };*/
       return redirect()->back();


    }
    public function actionDelCategory($id){

        try{
            DB::beginTransaction();
            DB::table("categories")
                ->where("category_id",(int)$id)
                ->delete();
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
        }

        return redirect()->back();


    }

  //--------Действия с гистами------------------

    public function actionGetGists($id){
             $gists=DB::table("gist")->select('*')->where("cat_id",$id)->get();

             return view('gistslist',[
                 "gists"=>$gists,
             ]);

         }


    public function actionGist(){
        $categories=DB::table("categories")->select('*')->get();;
        return view('addgist',[
            "categories"=>$categories
        ]);

    }
    public function actionAddAGist(Request $request){

        try{
            DB::beginTransaction();
            DB::table("gist")
                ->insert([
                    "gist_name"=>$request->post("gistName"),
                    "gist_text"=>$request->post("gist_text"),
                    "cat_id"=>$request->post("categoryId")]);
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
        }
        return redirect()->route('AddCategory');



    }
    public function actionDelGist($id){
        try{
            DB::beginTransaction();
            DB::table("gist")
                ->where("gist_id",(int)$id)
                ->delete();
            DB::commit();
        }catch (\Exception $e){
            DB::rollBack();
        }

        return redirect()->back();

    }
    public function actionPutGist(){

    }
}
