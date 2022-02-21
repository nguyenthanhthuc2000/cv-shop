<?php
namespace App\Repositories\Customer;

use App\Repositories\BaseRepository;
use App\Models\Customer;

class CustomerRepository extends BaseRepository implements CustomerRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Customer();
    }
}
