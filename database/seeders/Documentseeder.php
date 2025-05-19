<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Utilisateures;
use App\Models\Document;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DocumentSeeder extends Seeder
{
    public function run()
    {
        $employee1 = Utilisateures::first();
        Document::create([
            'employee_id' => 1,
            'employee_name' => 'Taha Lamhandi',
            'document_title' => 'Employment Certificate',
            'description' => 'Required for visa application',
            'status' => 'pending',
            'created_at' => Carbon::now()->subDays(3),
            'updated_at' => Carbon::now()->subDays(3),
        ]);

        Document::create([
            'employee_id' => 2,
            'employee_name' => 'Oussama Faiz',
            'document_title' => 'Salary Slip',
            'description' => 'Needed for bank loan',
            'status' => 'pending',
            'created_at' => Carbon::now()->subDays(5),
            'updated_at' => Carbon::now()->subDay(),
        ]);

    }
}