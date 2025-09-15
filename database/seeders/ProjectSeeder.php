<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Project::create(
            [
                'name'=>'E-commerce site',
                'description'=>'It is built using core php only',
                'status'=>'completed',
                'image'=>'my_pic',
                'start_date'=>'2025/07/01',
                'end_date'=>null,
            ]
        );
    }
}
