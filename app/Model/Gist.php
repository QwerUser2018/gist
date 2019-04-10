<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gist extends Model
{
    protected $fillable=["gist_name","gist_text","cat_id"];
    protected $table="gist";
    public function category(){
        return $this->belongsTo(Category::class,"cat_id","id");
    }
}
