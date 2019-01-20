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
      $this->productId    = $request['cart-id'];
      $this->productById  = $this->productRepository->getProductId($this->productId);
      $cartInfo = [
        'id'       => $this->productId,
        'name'     => $this->productById->name,
        'price'    => $this->productById->price,
        'image'    => $this->productById->image,
        'quantity' => (int)$request['qty'],
      ];
      Cart::add($cartInfo);
      $this->data['cartProducts'] = Cart::getContent();

      return view('frontend.showCart',$this->data);
    }

    public function updateCart(Request $request)
    {
      dd($request);
      Cart::update((int)$request['cart-id'], array(
        'quantity' => array(
            'relative' => false,
            'value'    => (int)$request['new_quantity'],
        ),
      ));
      $this->data['cartProducts'] = Cart::getContent();

      return view('frontend.showCart',$this->data);
    }
}
