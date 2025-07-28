<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/student/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Validate incoming student registration request.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'gender'   => ['required', 'in:male,female'],
            'school_id' => ['required', 'exists:users,id'], // Assuming schools are also stored in users table
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new student user instance.
     */
    protected function create(array $data)
    {
        return User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'gender'    => $data['gender'],
            'role'      => 'student',
            'school_id' => $data['school_id'],
            'password'  => Hash::make($data['password']),
        ]);
    }


public function showRegistrationForm()
{
    // Fetch the specific school by name (or you could fetch by ID if preferred)
    $school = User::where('role', 'school')
                  ->where('school_name', 'Ogalearn')
                  ->select('id', 'school_name')
                  ->firstOrFail();

    return view('auth.register', compact('school'));
}



}
// This controller handles the registration of students, validating their input and creating a new user in the database.