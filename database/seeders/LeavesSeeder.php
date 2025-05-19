<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Utilisateures;
use App\Models\leave;



class LeavesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        leave::create([
            'employee_id' => 1,
            'employee_name' => 'Oussama Faiz',
            'leave_reason' => 'Congé annuel',
            'start_date' => '2025-07-01',
            'end_date' => '2025-07-15',
            'status' => 'pending',
            'rejected_reason' => null,
        ]);

        /*
        leave::create([
            'employee_id' => 3,
            'employee_name' => 'Tarik Boukaidi',
            'leave_reason' => 'Maladie',
            'start_date' => '2025-08-05',
            'end_date' => '2025-08-10',
            'status' => 'pending',
            'rejected_reason' => null,
        ]);
        */
        leave::create([
            'employee_id' => 2,
            'employee_name' => 'Taha Lamhandi',
            'leave_reason' => 'Congé exceptionnel',
            'start_date' => '2025-09-12',
            'end_date' => '2025-09-14',
            'status' => 'pending',
            'rejected_reason' => null,
        ]);
    }
}
