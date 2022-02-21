<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Repositories\Article\ArticleRepositoryInterface;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Image\ImageRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Repositories\Service\ServiceRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\Voucher\VoucherRepositoryInterface;
use App\Repositories\Setting\SettingRepositoryInterface;
use App\Repositories\Customer\CustomerRepositoryInterface;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

     protected $articleRepo;
     protected $productRepo;
     protected $imgRepo;
     protected $categoryRepo;
     protected $orderRepo;
     protected $orderDetailRepo;
     protected $serviceRepo;
     protected $userRepo;
     protected $voucherRepo;
     protected $settingRepo;
     protected $customerRepo;

    public function __construct(
        ArticleRepositoryInterface $articleRepo,
        ProductRepositoryInterface $productRepo,
        ImageRepositoryInterface $imgRepo,
        CategoryRepositoryInterface $categoryRepo,
        OrderRepositoryInterface $orderRepo,
        OrderDetailRepositoryInterface $orderDetailRepo,
        ServiceRepositoryInterface $serviceRepo,
        UserRepositoryInterface $userRepo,
        VoucherRepositoryInterface $voucherRepo,
        SettingRepositoryInterface $settingRepo,
        CustomerRepositoryInterface $customerRepo
    )
    {
        $this->productRepo = $productRepo;
        $this->articleRepo = $articleRepo;
        $this->imgRepo = $imgRepo;
        $this->categoryRepo = $categoryRepo;
        $this->orderRepo = $orderRepo;
        $this->orderDetailRepo = $orderDetailRepo;
        $this->serviceRepo = $serviceRepo;
        $this->userRepo = $userRepo;
        $this->voucherRepo = $voucherRepo;
        $this->settingRepo = $settingRepo;
        $this->customerRepo = $customerRepo;
    }
}
