<?php
namespace App\Repositories\Article;

use App\Repositories\RepositoryInterface;

interface ArticleRepositoryInterface extends RepositoryInterface
{

    public function getNewBvs();
}
