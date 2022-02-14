<?php
namespace App\Repositories\Image;

use App\Repositories\BaseRepository;
use App\Models\Image;

class ImageRepository extends BaseRepository implements ImageRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return new Image();
    }

    public function getNewAlbums(){

        return $this->model->where('status', 1)->where('type', 'album')->orderBy('id', 'DESC')->take(4)->get();
    }

    public function getNewSliders(){

        return $this->model->where('status', 1)->where('type', 'slider')->orderBy('id', 'DESC')->take(4)->get();
    }
}
