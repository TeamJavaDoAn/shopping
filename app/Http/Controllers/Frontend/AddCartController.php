<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\CartItems\CartItemsRepositoryInterface;
use Cart;

class AddCartController extends Controller
{
    /**
     * @var ProductRepositoryInterface|\App\Repositories\Product
     */
    protected $productRepository;

    /**
     * @var UserRepositoryInterface|\App\Repositories\User
     */
    protected $userRepository;

    /**
     * @var CartItemsRepositoryInterface|\App\Repositories\CartItems
     */
    protected $cartItemsRepository;

    public $productId     = null;
    public $productById   = null;
    public $data          = null;

    /**
     * [__construct description]
     */
    public function __construct(ProductRepositoryInterface $productRepository, UserRepositoryInterface $userRepository, CartItemsRepositoryInterface $cartItemsRepository)
    {
        $this->productRepository        = $productRepository;
        $this->userRepository           = $userRepository;
        $this->cartItemsRepository      = $cartItemsRepository;
    }

    /**
     *
     * @param Request $request
     */
    public function addCart(Request $request)
    {
        if ($request->session()->has('username')) {
          $rowId = [];
          $this->data['user_id']  = $request->session()->get('user_id');
          $this->data['username'] = $request->session()->get('username');
          $this->data = $this->userRepository->checkLogin($this->data);
          if(!empty($this->data)) {
            if($this->data->active == 1) {
              $this->productId    = $request['cart-id'];
              $this->productById  = $this->productRepository->getProductId($this->productId);
              $cartInfo = [
                'id'       => $this->productId,
                'user_id'  => $this->data['user_id'],
                'name'     => $this->productById->name,
                'price'    => $this->productById->price,
                'image'    => $this->productById->image,
                'qty'      => (int)$request['qty'],
              ];
              Cart::add($cartInfo);
              $this->data['cart_id']      = Cart::content();
              foreach ($this->data['cart_id'] as $key => $value) {
                  $rowId['cart_id'] = $value->rowId;
              }
              $this->data['cartProducts'] = Cart::content();
              $this->data['insertData']   = $this->cartItemsRepository->insertData($cartInfo, $rowId);
            }
          }
        } else {
          // Flash a successful message
          $request->session()->flash('danger', 'Xin vui lòng đăng nhập tài khoản...!');
          return redirect()->route('home');
        }
        return view('frontend.showCart', $this->data);
    }

    /**
     * [updateCart description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function updateCart(Request $request)
    {
        $cartData = Cart::content();
        foreach ($cartData as $key => $value) {
            Cart::update($value->rowId, $request['valueQty']);
        }

        return view('frontend.showCart', ['cartProducts' => $cartData]);
    }

    /**
     * [deleteCart description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function deleteCart(Request $request)
    {
        Cart::remove($request->rowId);
        return redirect()->route('cartDeleteComplete');
    }

    /**
     * [deleteCartComplete description]
     * @return [type] [description]
     */
    public function deleteCartComplete()
    {
        $this->data['cartProducts'] = Cart::content();
        return view('frontend.showCart', $this->data);
    }
}
