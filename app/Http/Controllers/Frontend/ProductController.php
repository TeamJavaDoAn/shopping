<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     *
     */
    public function laptop()
    {
        return view('frontend.laptop');
    }

    /**
     *
     */
    public function smartphone()
    {
        return view('frontend.smartphone');
    }

    /**
     *
     */
    public function cameras()
    {
        return view('frontend.cameras');
    }

    /**
     *
     */
    public function contact()
    {
        return view('frontend.contact');
    }
}
