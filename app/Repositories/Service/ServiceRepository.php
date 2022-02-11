<?php
namespace App\Repositories\Service;

use App\Repositories\BaseRepository;
use App\Models\Service;

class ServiceRepository extends BaseRepository implements ServiceRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Service();
    }
}
