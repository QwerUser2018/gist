<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable=["file_path","user_id"];
    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }
}
