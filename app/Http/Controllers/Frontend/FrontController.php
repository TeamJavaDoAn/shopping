<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Mail;
class FrontController extends Controller
{
    public function addFeedback(Request $request)
    {
      $user = (object) $request->all();
      Mail::send('frontend.mailfb',['user' => $user], function ($message) use ($user) {
        $message->to($user->email, $user->name)->subject('Link active register');
      });

      Session::flash('flash_message', 'Send message successfully!');
      return view('frontend.form');
    }
}
