<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    public $timestamps=false;
    protected $guarded = ['id'];
    public function articles()
    {
        return $this->hasMany(Article::class);
    }
    static  function countArticles($id){
        $total = Category::where('id',$id)->count()+1;
        return $total;



    }
}
