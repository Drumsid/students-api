<?php

namespace Database\Seeders;

use App\Models\ClassRoom;
use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::factory()->count(10)
            ->state(new Sequence(
                function ($sequence) {
                    return ['class_room_id' => ClassRoom::all()->random()->id];
                }
            ))
            ->create();
    }
}
