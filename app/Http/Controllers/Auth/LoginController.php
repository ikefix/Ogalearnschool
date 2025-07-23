<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Redirect users after login based on role.
     *
     * @return string
     */
    protected function redirectTo()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 'student':
                return '/student/dashboard'; // adjust as needed
            case 'school':
                return '/school/dashboard'; // adjust as needed
            case 'admin':
                return '/admin/dashboard'; // adjust as needed
            case 'super_admin':
                return '/super_admin/dashboard'; // adjust as needed
            default:
                return '/home'; // fallback
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
