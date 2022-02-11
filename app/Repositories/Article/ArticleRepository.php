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
}
