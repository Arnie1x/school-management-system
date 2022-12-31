<?php

namespace App\Http\Controllers;

use App\Models\UnitActivity;
use Illuminate\Http\Request;

class UnitActivityController extends Controller
{
    public function show($id)
    {
        return view('activity', [
            'activity' => UnitActivity::find($id)
        ]);
    }
    public function showFromUnit($unit_id)
    {
        return view('activity', [
            'activity' => UnitActivity::findFromUnit($unit_id)
        ]);
    }
}
