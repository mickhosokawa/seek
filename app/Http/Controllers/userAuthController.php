<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userAuthController extends Controller
{
    public function authUser()
    {
        $user = Auth::user();

        if (Auth::check()) {
            return ('authorizedUser');
        }
    }
}
