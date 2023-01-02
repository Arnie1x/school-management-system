<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index() {

        if (auth()->user()->application != null) {
            if (auth()->user()->application->student != null) {
                return Redirect::to('/student');
            }
            if (auth()->user()->application->lecturer != null) {
                return Redirect::to('/lecturer');
            }
            if (auth()->user()->application->staff != null) {
                return Redirect::to('/staff');
            }
        }
        else {
            return Redirect::to('/admin');
        }
    }
}
