<?php

namespace Database\Seeders;

use App\Models\Fournisseur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FournisseurSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fournisseurs=[
            ['libelle'=>'Marco'],
            ['libelle'=>'Fournisseur2'],
            ['libelle'=>'Mul'],
            ['libelle'=>'Fournisseur4'],
            ['libelle'=>'Fournisseur5'],




            
        ];
        Fournisseur::insert($fournisseurs);
    }
}
