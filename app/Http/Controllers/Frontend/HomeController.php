<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Category\CateRepositoryInterface;

class HomeController extends Controller
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
        $this->cateRepository     = $cateRepository;
        $this->productRepository  = $productRepository;
    }

    /**
     * Show page home
     * @param Request $request
     */
    public function index(Request $request)
    {
        $data['category'] = $this->cateRepository->getAll();
        $data['products'] = $this->productRepository->getProductCate($data['category'][0]['cat_id']);
        return view('frontend.home', $data);
    }

    public function menuTab(Request $request)
    {
        $arrData    = [];
        $arrCount   = 0;
        $cate_id    = $request->id;
        $data       = $this->productRepository->getProductCate($cate_id);
        foreach ($data as $key => $value) {
            $arrData[$arrCount]['id']       = $value['product_id'];
            $arrData[$arrCount]['name']     = $value['name'];
            $arrData[$arrCount]['price']    = $value['price'];
            $arrData[$arrCount]['image']    = $value['image'];
            $arrData[$arrCount]['sale']     = $value['sale'];
            $arrData[$arrCount]['quantity'] = $value['quantity'];
            $arrCount++;
        }
        // convert array to json
        $encodeData = json_encode($arrData);
        return response()->json(['success'=> $encodeData]);
    }
}
