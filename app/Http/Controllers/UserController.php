<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Department;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use function PHPUnit\Framework\returnSelf;

class UserController extends Controller
{
    //
    public function create() {
        return view('authentication/register');
    }

    public function store(Request $request) {
        $formFields = $request->validate([
            'name' => ['required', 'min:5'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/');
    }

    public function login() {
        return view('authentication/login');
    }

    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/');
        }
        else {
            return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
        }

    }

    public function logout(Request $request) {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();


        return redirect('/');
    }

    public function studentApplication() {
        return view('student/register', [
            'courses' => Course::all()
        ]);
    }
    public function lecturerApplication() {
        return view('lecturer/register');
    }
    public function staffApplication() {
        return view('staff/register', [
            'departments' => Department::all()
        ]);
    }
}
