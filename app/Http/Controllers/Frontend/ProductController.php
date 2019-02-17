<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CateRepositoryInterface;

class ProductController extends Controller
{
  const LAPTOP     = '1';
  const SMARTPHONE = '2';
  const CAMERAS    = '3';
  /**
   * @var ProductRepositoryInterface|\App\Repositories\Product
   */

    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository  = $productRepository;
    }

  /**
   *
   */
    public function laptop()
    {
      $data['product']  = $this->productRepository->getProductCate(self::LAPTOP);
      if (empty($data)) {
          throw new \Exception('giá trị danh mục không tồn tại...!');
      }
      return view('frontend.laptop', $data);
    }

  /**
   *
   */
    public function smartphone()
    {
      $data['product']  = $this->productRepository->getProductCate(self::SMARTPHONE);
      if (empty($data)) {
          throw new \Exception('giá trị danh mục không tồn tại...!');
      }
      return view('frontend.smartphone', $data);
    }

  /**
   *
   */
    public function cameras()
    {
      $data['product']  = $this->productRepository->getProductCate(self::CAMERAS);
      if (empty($data)) {
          throw new \Exception('giá trị danh mục không tồn tại...!');
      }
      return view('frontend.cameras', $data);
    }

  /**
   *
   */
    public function detail(Request $request, $id)
    {
        $productDetail = $this->productRepository->getProductId($id);
        if (empty($productDetail)) {
            throw new \Exception("giá trị bị rỗng..!");
        }
        return view('frontend.productDetail', ['productDetail' => $productDetail]);
    }
}
