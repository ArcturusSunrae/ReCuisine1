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

        elseif ($user->role === \App\Enums\Role::supplier->value) {
            return redirect()->route('supplier.dashboard');
        }

        elseif ($user->role === \App\Enums\Role::customer->value) {
            return redirect()->route('dashboard');
        }

        // Default redirect
       // return redirect('/home');
    }



//    public function authenticated(Request $request, $user)
//    {
//        // Check user role using Enums and redirect accordingly
//        if ($user->role === Role::admin) {
//            return redirect()->route('admin.dashboard');
//        } elseif ($user->role === Role::supplier) {
//            return redirect()->route('supplier.dashboard');
//        } elseif ($user->role === Role::customer) {
//            return redirect()->route('dashboard'); // or customer-specific route if different
//        }
//
//
//        // Default fallback in case roles aren't matched
//        return redirect('/home');
//    }




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
