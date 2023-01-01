<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Course;
use App\Models\RegisteredUnits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class RegisteredUnitsController extends Controller
{
    public function index() {
        return view('units/all_units', [
            'units' => Unit::all()
        ]);
    }

    public function register($id) {

        if (count(RegisteredUnits::query()->where([
            'unit' => $id,
            'student' => 1
        ])->get()) > 0) {
            return $this->index();
        }
        $registeredUnit = new RegisteredUnits([
            'student' => 1,
            'unit' => $id
        ]);

        $registeredUnit->save();

        return $this->index();
    }

    public function create() {
        return view('units/all_units', [
            'courses' => Course::all()
        ]);
    }
    public function store(Request $request) {
        $formFields = $request->validate([
            'course' => 'required',
            'name' => 'required',
        ]);

        Unit::create($formFields);
        
        return Redirect::to('/');
    }
}
