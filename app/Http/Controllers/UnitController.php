<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use App\Models\UnitActivity;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    // Show all Units
    public function index() {
        return view('main_student', [
            'units' => Unit::all()
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
        return view('units/create');
    }
}
