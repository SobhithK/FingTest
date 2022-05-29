<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        teacher::factory()
            ->count(10)
            ->create();
    }
}
