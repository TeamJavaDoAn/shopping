<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;

class HomeController extends Controller
{
    /**
     * @var ProductRepositoryInterface|\App\Repositories\Product
     */
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Show page home
     * @param Request $request
     */
    public function index(Request $request)
    {
      $products = $this->productRepository->getAll();
      return view('frontend.home', ['products' => $products]);
    }
}
