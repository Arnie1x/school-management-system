<?php

namespace App\Http\Controllers;

use App\Models\DepartmentActivity;
use Illuminate\Http\Request;

class DepartmentActivityController extends Controller
{
    public function show($id)
    {
        return view('activity', [
            'activity' => DepartmentActivity::find($id)
        ]);
    }
    public function showFromDepartment($department_id)
    {
        return view('activity', [
            'activity' => DepartmentActivity::findFromDepartment($department_id)
        ]);
    }
}
