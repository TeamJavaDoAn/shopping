<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;

class RegisterController extends Controller
{
	/**
     * @var UserRepositoryInterface|\App\Repositories\User
     */
    protected $userRepository;

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
		    'name' 	=> 'min:5|max:20',
		    'email' => 'email',
		    'phone' => 'numeric|size:11'
		]);

 		// get value model
    	return view('frontend.register');
    }
}
