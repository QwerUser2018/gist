<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Route;



class ApiController extends Controller
{
    public $path;

    /**
     * ApiController constructor.
     * @param $path
     */
    public function __construct()
    {
        $this->path = "/Users/yanahalata/Desktop/app/resources/data/gists.json";
    }


    public function fs_getAll(){
        $file_content = file_get_contents($this->path);
        return json_decode($file_content,true);
    }
    public function fs_saveFile($arr){
        file_put_contents($this->path,json_encode($arr));
    }

    public function fs_append($data){
        $arr = $this->fs_getAll();
        $this->fs_saveFile($arr);
    }

    public function fs_getById($id){
        $arr = $this->fs_getAll();
        foreach ($arr as $data){
            if($data["id"]===$id) return $data;
        }
        return null;
    }
    public function fs_del($id){
        $arr= $this->fs_getAll();
        $arr = array_filter($arr,function ($e) use ($id){
            return $e["id"]!=$id;
        });
        $this->fs_saveFile($arr);
    }


    //--------Действия с категориями------------------

    public function actionGetCategories(){
        $data=$this->fs_getAll();
        return $data['categories'];
    }

    public function actionAddCategory($Categorytoken,$CategoryName){
        $data=$this->fs_getAll();
        foreach ($data as &$d){
            if (isset($d[$CategoryName])){
                $record["categories"][$CategoryName]=[];
                $record["categories"][$CategoryName]["categyToken"][$Categorytoken]=[];
            }
        }
        $this->fs_saveFile($data);
        return true;

    }
    public function actionDelCategory($Categorytoken){
        $arr= $this->fs_getAll();
        $arr = array_filter($arr,function ($e) use ($Categorytoken){
            return $e["categories"]["categyToken"]!=$Categorytoken;
        });
        $this->fs_saveFile($arr);

    }

  //--------Действия с гистами------------------

    public function actionGetGists($Categorytoken){

    }
    public function actionAddGist($idCategory,$name,$text){

    }
    public function actionDelGist($idGist){

    }
    public function actionPutGist($idGist,$name,$text){

    }
}
