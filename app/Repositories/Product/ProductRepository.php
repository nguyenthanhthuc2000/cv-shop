<?php
namespace App\Repositories\Product;

use App\Repositories\BaseRepository;
use App\Models\Product;

class ProductRepository extends BaseRepository implements ProductRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Product();
    }

    public function getNewProducts(){

        return $this->model->where('status', 1)->orderBy('id', 'DESC')->take(8)->get();
    }

    public function getHLProducts(){

        return $this->model->where('status', 1)->where('highlights', 1)->orderBy('id', 'DESC')->take(8)->get();
    }

    public function getProductInvolve($catID, $proID){

        return $this->model->where('status', 1)->where('category1_id', $catID)->whereNotIn('id', [$proID])->orderBy('id', 'DESC')->take(8)->get();
    }
}
