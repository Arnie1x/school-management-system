<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
