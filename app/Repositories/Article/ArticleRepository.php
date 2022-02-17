<?php
namespace App\Repositories\Article;

use App\Repositories\BaseRepository;
use App\Models\Article;

class ArticleRepository extends BaseRepository implements ArticleRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {

        return new Article();
    }

    public function getNewBvs(){

        return $this->model->where('status', 1)->orderBy('id', 'DESC')->take(5)->get();
    }
}
