<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Course;
use App\Models\Department;
use App\Models\DepartmentActivity;
use App\Models\Lecturer;
use App\Models\RegisteredUnits;
use App\Models\School;
use App\Models\Staff;
use App\Models\Student;
use App\Models\Unit;
use App\Models\UnitActivity;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // This Factory creates lecturers
        $lecturers = User::factory(5)->create()->each(function($user) {
            Lecturer::factory()->create([
                'user_id' => $user->id
            ]);
        });

        $schools = School::factory(3)->create([
            'administrator' => Lecturer::all()->random(1)->first()
        ]);

        $courses = Course::factory(4)->create([
            'school'=>$schools->first()
        ])->each(function($course) use($lecturers) {
            Unit::factory(6)->create([
                'course' => $course->id,
                'administrator' => $lecturers->random(1)->first()
            ])->each(function($unit) {
                UnitActivity::factory(5)->create([
                    // TODO: Figure out how to fill the author field
                    'unit' => $unit->id,
                    'author' => $unit->administrator
                ]);
            });
        });

        // This Factory creates students
        $students = User::factory(5)->create()->each(function($user) use($courses){
            Student::factory()->create([
                'user_id' => $user->id,
                'course_enrolled' => $courses->random(1)->first()
            ]);
        });

        // RegisteredUnits::factory(1)->create([
        //     'student' => Student::all()->random(1)->get('id')->id,
        //     'unit' => Unit::all()->random(1)->first()->id
        // ]);

        // This factory creates the departments to be used by Staff
        $departments = Department::factory(2)->create()->each(function($department) {
            DepartmentActivity::factory(rand(1, 10))->create([
                'department_id'=>$department->id,
                'author' => User::all()->random(1)->first()
            ]);
        });

        // This Factory creates staff
        $staff = User::factory(5)->create()->each(function($user) use($departments) {
            Staff::factory()->create([
                'user_id' => $user->id,
                'department' => $departments->random(1)->first()
            ]);
        });

    }
}
