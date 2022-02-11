<?php
namespace App\Repositories\OrderDetail;

use App\Repositories\BaseRepository;
use App\Models\OrderDetail;

class OrderDetailRepository extends BaseRepository implements OrderDetailRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new OrderDetail();
    }
}
