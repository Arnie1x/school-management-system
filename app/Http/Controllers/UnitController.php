<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\Course;
use App\Models\RegisteredUnits;
use App\Models\UnitActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UnitController extends Controller
{
    // Show all Units
    public function index() {
        // dd(RegisteredUnits::query()->where('student', auth()->user()->student->id)->get());

        // dd(Unit::getRegistered());
        return view('main_student', [
            'units' => Unit::getRegistered()->toQuery()->latest()->paginate(9),
            // 'registeredUnits' => RegisteredUnits::query()->where('student', auth()->user()->student->id)->get('unit')->units
        ]);
    }

    // Show one Unit
    public function show($id)
    {
        return view('units/unit', [
            'unit' => Unit::find($id),
            'activities' => UnitActivity::findFromUnit($id)
        ]);
    }

    public function create() {
        return view('units/create', [
            'courses' => Course::all(),
        ]);
    }
    public function store(Request $request) {
        $formFields = $request->validate([
            'course' => 'required',
            'administrator' => 'required',
            'name' => 'required',
            'description' => 'required',
        ]);

        Unit::create($formFields);
        
        return Redirect::to('/');
    }
    public function delete($id) {
        Unit::destroy($id);

        return Redirect::to('/');
    }
}
