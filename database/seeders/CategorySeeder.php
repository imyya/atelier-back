<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['libelle'=>'costume','type'=>'VENTE'],
            ['libelle'=>'pantalon','type'=>'VENTE'],
            ['libelle'=>'bouton','type'=>'CONF'],
            ['libelle'=>'tissu','type'=>'CONF'],
            ['libelle'=>'jupe','type'=>'VENTE'],    
        ];

        Category::insert($categories);
    }
}
