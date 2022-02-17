<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        $productsNew = $this->productRepo->getNewProducts();
        $productsHL = $this->productRepo->getHLProducts();
        $baiviets = $this->articleRepo->getNewBvs();
        $albums = $this->imgRepo->getNewAlbums();
        $sliders = $this->imgRepo->getNewSliders();

        return view('shop.page.index', compact('productsNew', 'productsHL', 'baiviets', 'albums', 'sliders'));
    }
}
