<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function categories(){
        return $this->hasMany(Category::class,"user_id","id");
    }
    public function links(){
        return $this->hasMany(Link::class,"user_id","id");
    }
    public function photo(){
        return $this->hasOne(Photo::class,"user_id","id");
    }
}
