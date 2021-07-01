<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0;$i<100;$i++){
            DB::table('subject')->insert([  
                'subject_name' => Str::random(10),
                'status' => 1,
            ]);
        }
    }
}
