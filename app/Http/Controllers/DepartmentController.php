<?php

namespace App\Http\Controllers;

use Nette\Utils\Random;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\DepartmentActivity;
use Illuminate\Support\Facades\Redirect;

class DepartmentController extends Controller
{
    public function index() {
        $random_department = rand(0, count(Department::all()) - 1);
        return view('departments/department', [
            'department' => Department::find($random_department),
            'departments' => Department::all(),
            'activities' => DepartmentActivity::findFromDepartment($random_department),
        ]);
    }

    public function show($id)
    {
        return view('departments/department', [
            'department' => Department::find($id),
            'activities' => DepartmentActivity::findFromDepartment($id),
        ]);
    }

    public function create() {
        return view('departments/create');
    }
    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        Department::create($formFields);
        
        return Redirect::to('/');
    }
    public function delete($id) {
        Department::destroy($id);

        return Redirect::to('/');
    }
}
