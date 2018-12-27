<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function forgotPassword()
    {
        return view('frontend.forgotPassword');
    }
}
