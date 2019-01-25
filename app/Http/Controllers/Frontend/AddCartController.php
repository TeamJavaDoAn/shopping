<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use Cart;

class AddCartController extends Controller
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
    public function addCart(Request $request)
    {
      if ($request->isMethod('post')) {
        $this->productId    = $request['cart-id'];
        $this->productById  = $this->productRepository->getProductId($this->productId);
        $cartInfo = [
          'id'       => $this->productId,
          'name'     => $this->productById->name,
          'price'    => $this->productById->price,
          'image'    => $this->productById->image,
          'qty'      => (int)$request['qty'],
        ];
        Cart::add($cartInfo);
      }
      $this->data['cartProducts'] = Cart::content();

      return view('frontend.showCart',$this->data);
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

      return view('frontend.showCart',['cartProducts' => $cartData]);
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
      return view('frontend.showCart',$this->data);
    }
}
