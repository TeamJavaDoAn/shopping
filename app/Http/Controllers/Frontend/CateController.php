<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CateRepositoryInterface;

class CateController extends Controller
{
    /**
     * @var CateRepositoryInterface|\App\Repositories\Cate
     */
    protected $cateRepository;

    /**
     * @var ProductRepositoryInterface|\App\Repositories\Product
     */
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository, CateRepositoryInterface $cateRepository)
    {
        $this->cateRepository       = $cateRepository;
        $this->productRepository    = $productRepository;
    }

    public function index()
    {
        $data['category'] = $this->cateRepository->getAll();
        $data['product']  = $this->productRepository->getProductCate('1');
        if (empty($data)) {
            throw new \Exception('giá trị danh mục không tồn tại...!');
        }
        return view('frontend.cate', $data);
    }
}
