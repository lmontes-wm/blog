<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $fillable = ['name'];
    
    //uno a muchos
    public function article(){
        return $this->hasMany('App\Article','category_id');
    }
}
