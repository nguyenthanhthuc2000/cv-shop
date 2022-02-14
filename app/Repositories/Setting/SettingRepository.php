<?php
namespace App\Repositories\Setting;

use App\Repositories\BaseRepository;
use App\Models\Setting;

class SettingRepository extends BaseRepository implements SettingRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Setting();
    }
}
