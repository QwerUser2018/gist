<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=["category_name","user_id"];
    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }
    public function gists(){
        return $this->hasMany(Gist::class,"cat_id","id");
    }
}
