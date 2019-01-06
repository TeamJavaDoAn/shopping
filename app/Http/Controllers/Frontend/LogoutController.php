<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;

class LogoutController extends Controller
{
  /**
   * @var UserRepositoryInterface|\App\Repositories\User
   */
  protected $userRepository;

  /**
   * [__construct description]
   */
  public function __construct()
  {

  }

  /**
   * [login description]
   * @return [type] [description]
   */
  public function logout(Request $request)
  {
    $request->session()->forget('username');
    return redirect()->route('home');
  }
}
