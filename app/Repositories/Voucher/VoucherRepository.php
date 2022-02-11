<?php
namespace App\Repositories\Voucher;

use App\Repositories\BaseRepository;
use App\Models\Voucher;

class VoucherRepository extends BaseRepository implements VoucherRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Voucher();
    }
}
