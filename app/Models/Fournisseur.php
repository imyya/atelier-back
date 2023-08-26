<?php

namespace App\Models;

use App\Models\Article;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fournisseur extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $guarded = ['id'];

    public function articles(){
        return $this->belongsToMany(Fournisseur::class,'article_fournisseurs','fournisseur_id','article_id');
    }
}
