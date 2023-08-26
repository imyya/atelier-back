<?php

namespace Database\Seeders;

use App\Models\ArticleFournisseur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticleFournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    { 
        $lol=[
            ['article_id'=>2,'fournisseur_id'=>1 ],
            ['article_id'=>1,'fournisseur_id'=>2 ],
            ['article_id'=>3,'fournisseur_id'=>1 ],
            ['article_id'=>1,'fournisseur_id'=>3 ],
            ['article_id'=>3,'fournisseur_id'=>2 ],
            ['article_id'=>1,'fournisseur_id'=>4 ],






        ];
        ArticleFournisseur::insert($lol);
        
    }
}
