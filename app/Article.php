<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Article extends Model
{
    use Sluggable;
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    
    protected $table = 'articles';
    protected $fillable = ['title','content','category_id','user_id'];

    //uno a uno - inversa o muchoa a uno inversa, buscar mediante llave foranea category_id
    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
    
    //uno a uno - inversa o muchoa a uno inversa, buscar mediante llave foranea user_id
    public function user()  
    {
        return $this->belongsTo('App\User');
    }
    
    //uno a muchos
    public function images(){
        return $this->hasMany('App\Image');
    }
    
    //muchos a muchos
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    
    public function store($request){
        $article = $this;
        $article->title = $request['title'];
        $article->content = $request['content'];
        $article->user_id = $request['user_id'];
        $article->category_id = $request['category_id'];
        $article->save();
    }
}
