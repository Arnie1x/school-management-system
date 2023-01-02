<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Unit extends Model
{
    use HasFactory;

    public static function find($id) {
        $units = self::all();

        foreach ($units as $unit) {
            if ($unit['id'] == $id) {
                return $unit;
            }
        }
    }
    public function registeredUnits(): HasMany {
        return $this->hasMany(Unit::class, 'unit', 'id');
    }

    public static function getRegistered() {
        $units = self::all();
        $registered = RegisteredUnits::query()->where('student', auth()->user()->student->id)->pluck('unit')->all();

        // $newUnits = $units;

        // foreach ($units as $unit){
        //     foreach($registered as $register){
        //         if ($unit['id'] != $register) {
        //             $units->forget($unit['id']);
        //         }
        //     }
        // }
        
        return $units->only($registered);

    }
}
