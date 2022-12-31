<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\DepartmentActivity;
use Illuminate\Http\Request;
use Nette\Utils\Random;

class DepartmentController extends Controller
{
    public function index() {
        $random_department = rand(0, count(Department::all()) - 1);
        return view('main_staff', [
            'department' => Department::find($random_department),
            'departments' => Department::all(),
            'activities' => DepartmentActivity::findFromDepartment($random_department),
        ]);
    }

    // Show one Unit
    public function show($id)
    {
        return view('department', [
            'department' => Department::find($id)
            // 'activities' => UnitActivity::findFromUnit($id)
        ]);
    }
}
