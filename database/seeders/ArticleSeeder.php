<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $articles = [
                ['libelle' => 'Soie', 'prix' => 1500, 'stock' => 100, 'categorie_id' => 1, 'ref'=>'REF_SOI_TISSU_1'],
                ['libelle' => 'Triangulaire', 'prix' => 2500, 'stock' => 50, 'categorie_id' => 2,'ref'=>'REF_TRI_BOUTTON_1'],
                ['libelle' => 'Denim', 'prix' => 50, 'stock' => 500, 'categorie_id' => 3,'ref'=>'REF_DEN_BOUTTON_1'],
            ];
    
        
        Article::insert($articles);

    }
}
