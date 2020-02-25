<?php

use Illuminate\Database\Seeder;
use App\{Teacher, Student};

class TeachersStudentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            factory(Teacher::class, 10)->create();
            factory(Student::class, 10)->create();
    }
}
