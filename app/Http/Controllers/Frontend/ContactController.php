<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Contact\ContactRespositoryInterface;

class ContactController extends Controller
{
  /**
   * [$contactRepository description]
   * @var [type]
   */
  protected $contactRepository;

  public function __construct(ContactRespositoryInterface $contactRepository)
  {
    $this->contactRepository = $contactRepository;
  }

  /**
   * [index description]
   * @return [type] [description]
   */
  public function index()
  {
    return view('frontend.contact');
  }

  /**
   * [complete description]
   * @param  Request $request [description]
   * @return [type]           [description]
   */
  public function complete(Request $request)
  {
    if(!$this->contactRepository->InsertDataContact($request->all())){
      throw new \Exception("Bạn chưa liên hệ với nhà quản trị...!");
    }

    return view('frontend.complete');
  }
}
