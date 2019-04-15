<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable=["link_name","URL","user_id"];
    public function user(){
        return $this->belongsTo(User::class,"user_id","id");
    }
}
