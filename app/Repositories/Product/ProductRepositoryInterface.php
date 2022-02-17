<?php
namespace App\Repositories\Product;

use App\Repositories\RepositoryInterface;

interface ProductRepositoryInterface extends RepositoryInterface
{
    public function getNewProducts();

    public function getHLProducts();

    public function getProductInvolve($catID, $proID);
}
