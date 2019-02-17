<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use Cart;

class AddPayController extends Controller
{
    /**
     * @var ProductRepositoryInterface|\App\Repositories\Product
     */
    protected $productRepository;

    public $productId     = null;
    public $productById   = null;
    public $data          = null;

    /**
     * [__construct description]
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    { 
        $this->productRepository  = $productRepository;
    }

    /**
     *
     * @param Request $request
     */
    public function hanlderPay(Request $request)
    {
      return view('Frontend.cartpay');
    }

    /**
     * 
     */
    public function cartHandlePay(Request $request)
    {
      try {
        $tmp = [];
        $data = Cart::content();
        foreach ($data as $key => $value) {
          $tmp['rowId'] = $value->rowId;
          $tmp['image'] = $value->image;
        }
        $cartPay = (object)[
         'name'     => $request->name,
         'phone'    => $request->phone,
         'email'    => $request->email,
         'city'     => $request->city,
         'message'  => $request->message,
         'image'    => $tmp['image'],
         'rowId'    => $tmp['rowId'],
        ];
        // send mail
        \Mail::send('frontend.cartPayComplete',['cartPay' => $cartPay], function ($message) use ($cartPay) {
          $message->to($cartPay->email, $cartPay->name)->subject('Xác nhận giao hàng thành công');
        });
        // Flash a successful message
        $request->session()->flash('warning', 'Xin vui lòng xác nhân đơn hàng trong mail!');
      } catch (Exception $e) {
        // Log error
        \Log::error($e->getMessage());

        // Flash a error message
        $request->session()->flash('status', [
          'type' => 'danger',
          'message' => 'Không thể gửi đơn hàng'
        ]);
      }
      // Back to list page with flash message
      return redirect()->route('home');
    }
}
