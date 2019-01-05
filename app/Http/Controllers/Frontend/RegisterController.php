<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use Mail;

class RegisterController extends Controller
{
  /**
   * [$register description]
   * @var [type]
   */
  public $register = [];

  /**
   * @var UserRepositoryInterface|\App\Repositories\User
   */
  protected $userRepository;

  /**
   * [$repository description]
   * @var [type]
   */
  protected $repository;

  public function __construct(UserRepositoryInterface $userRepository)
  {
    $this->userRepository = $userRepository;
  }

  /**
   * [register description]
   * @return [type] [description]
   */
  public function register()
  {
    return view('frontend.register');
  }

  /**
   * [handlingRegister description]
   * @return [type] [description]
   */
  public function handlingRegister(Request $request)
  {
    $request->validate([
      'name'              => 'min:5|max:20',
      'email'             => 'email|unique:users,email',
      'phone'             => 'numeric|digits:10|unique:users,phone',
      'password'          => 'min:6|max:50',
      'confirm_password'  => 'min:6|max:50|same:password'
    ]);

    try {
      // insert data
      if ($this->userRepository->insertData($request->all())) {
        $user = (object) $this->userRepository->getAllAttributes();
        $user->password     = \Crypt::decrypt($user->password);
        $user->re_password  = \Crypt::decrypt($user->re_password);
        // send mail
        Mail::send('frontend.mailfb',['user' => $user], function ($message) use ($user) {
          $message->to($user->email, $user->name)->subject('Link active register');
        });
      } else {
        throw new \Exception("Error Processing Request", 1);
      }
    } catch (\Exception $e) {
      // Log error
      \Log::error($e->getMessage());

      // Flash a error message
      $request->session()->flash('status', [
        'type' => 'danger',
        'message' => 'Cannot register user'
      ]);
    }

    // Back to list page with flash message
    return redirect()->route('home');
  }
}
