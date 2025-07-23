<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SchoolRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show school registration form.
     */
public function showRegistrationForm()
{
    return view('auth.register-school'); // Since it's inside `resources/views/auth/`
}

    /**
     * Handle the school registration request.
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $school = $this->create($request->all());

        auth()->login($school);

        return redirect('/school/dashboard'); // redirect to school dashboard
    }

    /**
     * Validate the school input.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'school_name' => ['required', 'string', 'max:255'],
            'name'        => ['required', 'string', 'max:255'], // contact person
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone_number'       => ['required', 'string', 'max:20'],
            'address'     => ['required', 'string', 'max:255'],
            'password'    => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create the school user.
     */
    protected function create(array $data)
    {
        return User::create([
            'school_name' => $data['school_name'],
            'name'        => $data['name'],
            'email'       => $data['email'],
            'phone_number'=> $data['phone_number'],
            'address'     => $data['address'],
            'role'        => 'school',
            'password'    => Hash::make($data['password']),
        ]);
    }
}



// This controller handles the registration of schools, validating their input and creating a new user in the database.