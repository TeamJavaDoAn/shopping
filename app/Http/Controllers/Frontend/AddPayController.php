<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\CartPays\CartPaysRepositoryInterface;
use Cart;

class AddPayController extends Controller
{
    /**
     * @var ProductRepositoryInterface|\App\Repositories\Product
     */
    protected $productRepository;

    /**
     * @var CartPaysRepositoryInterface|\App\Repositories\CartPays
     */
    protected $cartPaysRepository;

    public $productId     = null;
    public $productById   = null;
    public $data          = null;

    /**
     * [__construct description]
     */
    public function __construct(ProductRepositoryInterface $productRepository, CartPaysRepositoryInterface $cartPaysRepository)
    { 
        $this->productRepository    = $productRepository;
        $this->cartPaysRepository   = $cartPaysRepository;
    }

    /**
     *
     * @param Request $request
     */
    public function hanlderPay(Request $request)
    {
      $dataArr = [];
      $cart = $request->session()->all();
      $dataArr = (array)$cart['cart']['default'];
      foreach ($dataArr as $key => $value) {
        if(empty($value)){
          // Flash a successful message
          $request->session()->flash('danger', 'Xin vui lòng chọn giỏ hàng!');
          return redirect()->route('home');
        }
      }
      return view('Frontend.cartpay');
    }

    /**
     * 
     */
    public function cartHandlePay(Request $request)
    {
      try {
        $cart = $request->session()->get('cart');
        $data = (array)$cart['default'];
        $cartPay = (object)[
         'name'     => $request->name,
         'phone'    => $request->phone,
         'email'    => $request->email,
         'city'     => $request->city,
         'message'  => $request->message,
         'image'    => $request->image,
        ];
        if($this->cartPaysRepository->insertData($cartPay)) {
          // send mail
          \Mail::send('frontend.cartPayComplete',['cartPay' => $cartPay, 'data' => $data], function ($message) use ($cartPay) {
            $message->to($cartPay->email, $cartPay->name)->subject('Xác nhận giao hàng thành công');
          });
          // Flash a successful message
          $request->session()->flash('warning', 'Xin vui lòng xác nhân đơn hàng trong mail!');
        }
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
