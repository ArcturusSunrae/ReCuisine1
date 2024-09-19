<?php

//app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers;

use App\Enums\Role;
use App\Http\Controllers\Controller;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{


    //protected $redirectTo = '/home';

    protected function authenticated(Request $request, $user)
    {
        if ($user->role === \App\Enums\Role::admin->value) {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role === \App\Enums\Role::supplier->value) {
            return redirect()->route('supplier.dashboard');
        }

        // Default redirect
        return redirect()->route('home');
    }




//    protected function redirectTo()
//    {
//        $user = Auth::user();
//
//        if ($user->role === Role::admin->value) {
//            return '/admin/dashboard'; // Redirect to admin dashboard
//        } elseif ($user->role === Role::supplier->value) {
//            return '/supplier/dashboard'; // Redirect to supplier dashboard
//        } else {
//            return '/home'; // Redirect to customer home page
//        }
//    }
}
