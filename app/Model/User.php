<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function categories(){
        return $this->hasMany(Category::class,"user_id","id");
    }
}
