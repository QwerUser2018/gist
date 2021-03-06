<?php

namespace App\Http\Controllers;

use App\Model\Category;
use App\Model\Gist;
use App\Model\Link;
use App\Model\Photo;
use App\User;
use Illuminate\Http\Request;
//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;



class ApiController extends Controller
{
    //--------Действия с категориями------------------


    public function actionAddCategory(Request $request)
    {
        try {
            DB::beginTransaction();
            Category::create([
                "category_name" => $request->post("CategoryName"),
                "user_id" => Auth::id()
            ])->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect()->back();


    }

    public function actionDelCategory($id)
    {
        try {
            DB::beginTransaction();
            Category::destroy($id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect()->back();


    }

    //--------Действия с гистами------------------

    public function actionGetGists($id)
    {
        $gists = Gist::where("cat_id", $id)->get();
        if (count($gists) == 0) {
            return redirect()->back();
        }
        return view('gistslist', [
            "gists" => $gists
        ]);

    }


    public function actionGist()
    {
        $categories = Category::where("user_id", Auth::id())->get();
        return view('addgist', [
            "categories" => $categories
        ]);

    }

    public function actionAddAGist(Request $request)
    {
        try {
            DB::beginTransaction();
            Gist::updateOrCreate(
                ["id" => $request->post("gistId")],
                [   "gist_name"=>$request->post("gistName"),
                    "gist_text"=>$request->post("gist_text"),
                    "cat_id"=>$request->post("categoryId")]
            )->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect()->route('AddCategory');
    }

    public function actionUpdateGist(Request $request){
    $idcat=$request->get("categoryId");
    $idgist=$request->get("gistId");

    $gist=Gist::find($idgist);
    $category = Category::find($idcat);
        return view('updategist', [
            "category" => $category,
            "gist"=>$gist
        ]);

    }

    public function actionDelGist($id)
    {
        try {
            DB::beginTransaction();
            Gist::destroy($id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }

        return redirect()->back();

    }



    public function actionAddLink(Request $request)
    {
        try {
            DB::beginTransaction();

            Link::create([
                "link_name" => $request->post("linkName"),
                "URL" => $request->post("URL"),
                "user_id" => Auth::id()
            ])->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
        return redirect()->back();

    }

    public function actionEditProfile()
    {
        return view("editprofile");
    }

    public function actionUpdateProfile(Request $request)
    {
        //create and save file
        if ($request->hasFile("photo")) {
            $file = $request->file("photo");
            $name = Auth::id() . "_" . time() . "." . $file->extension();
            $file->move(public_path("images"), $name);
            try {
                DB::beginTransaction();
                Photo::updateOrCreate(
                    ["user_id" => Auth::id()],
                    ["file_path" => asset("images/" . $name)]);
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
            }
        }
        //update email
        if (!empty($request->post("mail"))){
            User::where(["id"=>Auth::id()])->update(["email"=>$request->post("mail")]);

        }
        return redirect()->route('Profile');

    }

}
