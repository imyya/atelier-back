<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Fournisseur;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    { $this->call([
       CategorySeeder::class,
       ArticleSeeder::class,
       FournisseurSeeder::class,
       ArticleFournisseurSeeder::class

    ]);

    }
}
