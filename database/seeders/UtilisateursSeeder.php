<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Utilisateures;
use Illuminate\Support\Facades\Hash;

class UtilisateursSeeder extends Seeder
{
    public function run()
    {
        Utilisateures::create([
            'profile' => 'RH',
            'nomComplet' => 'Taha Lamhandi',
            'CIN' => 'D688672',
            'email' => 'lamhandit@gmail.com',
            'motdepasse' => 'Taha2004',
            'telephone' => '0706706551',
            'adresse' => 'Zitoune Jamaa Roua , Meknes',
            'dateNaissance' => '2004-10-30',
            'sexe' => 'Homme',
            'dateEmbauche' => '2027-07-10',
            'statutMarital' => 'Marié(e)',
            'salaire' => 18000.00,
            'typeContrat' => 'CDD',
            'niveauEtude' => 'Master en Econnomie',
            'competences' => 'Comtabilite, Gestion de projet',
            'photo' => 'images\Mee.jpg',
            'Fonction' => 'HR Manager',
            'Departement' => 'Human Resources',
            'etat' => 'Actif',
        ]);
         Utilisateures::create([
            'profile' => 'employe',
            'nomComplet' => 'Oussama Faiz',
            'CIN' => 'BK123456',
            'email' => 'oussama.faiz@gmail.com',
            'motdepasse' => 'oussama123',
            'telephone' => '0612345678',
            'adresse' => '123 Tech Street, Essaouira',
            'dateNaissance' => '1990-05-15',
            'sexe' => 'Homme',
            'dateEmbauche' => '2026-08-10',
            'statutMarital' => 'Marié(e)',
            'salaire' => 14000.00,
            'typeContrat' => 'CDI',
            'niveauEtude' => 'Master en Informatique',
            'competences' => 'Scala, Spring , React , Laravel',
            'photo' => 'images\1742669249_WhatsApp Image 2024-12-11 at 13.45.17.jpeg',
            'Fonction' => 'Backend Developer',
            'Departement' => 'Software Development',
            'etat' => 'Actif',
        ]);
    }
}

