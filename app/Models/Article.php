<?php

namespace App\Models;

use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Article extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    public $timestamps=false;

    public function categorie(){
        return $this->belongsTo(Category::class,'categorie_id');
    }

    public function fournisseurs(){
        return $this->belongsToMany(Fournisseur::class,'article_fournisseurs','article_id','fournisseur_id');
    }




}
