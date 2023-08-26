<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticleVente extends Model
{   
    protected $table='article_vente';
    protected $guarded=['id'];
    public $timestamps=false;

    use HasFactory;
    use SoftDeletes;


    public static function boot(){
        parent::boot();
        static::creating(function($article){
            $confections=$article->getAttribute('confection');
            if(is_array($confections)){
              $article->confections()->attach($confections);
            }
        });

        
    }
    public function confections(){
        return $this->belongsToMany(Article::class, 'vente_confection','vente_id','article_id')->withPivot('quantite');
    }
    public function categorie(){
        return $this->belongsTo(Category::class);
    }
}
