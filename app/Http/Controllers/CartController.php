<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function loadCartTableAjax(){
        $carts = Session::get('carts');
        if($carts){
            $output = view('shop.page.cart.component.load_page_cart_ajax', compact('carts'))->render();

            return response()->json(['output' => $output, 'status' => 200]);
        }
    }
    /**
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function loadCartAjax(){

        $carts = Session::get('carts');
        if($carts){
            $output = view('shop.page.cart.component.load_table_cart_ajax', compact('carts'))->render();
            $totalItem = count($carts);
            $totalCart = 0;

            foreach ($carts as $cart){
                $price = $cart['price'];
                if($cart['price_pro'] > 0){
                    $price = $cart['price_pro'];
                }
                $totalCart += $cart['qty'] * $price;
            }
            return response()->json(['output' => $output, 'status' => 200, 'totalItem' => $totalItem, 'totalCart' =>numberFormat($totalCart)]);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeCart(Request $request){
        $id = encryptDecrypt($request->id, 'decrypt');
        $product = $this->productRepo->find($id);
        if($product && $product->quantily > 0 && $product->quantily < $request->qty){
            return response()->json(['status' => 503]); //sp k đủ sl đặt hàng
        }
        else if($product && $product->quantily > 0){

            $data = $request->all();
            $carts = Session::get('carts');

            if($carts){
                $is_avaiable = 0;
                foreach ($carts as $key => $cart) {
                    if($cart['id'] == encryptDecrypt($product->id)){
                        $is_avaiable++;
                        $carts[$key] = array(
                            'id' => encryptDecrypt($product->id),
                            'slug' => $product->slug,
                            'name' => $product->name,
                            'price' => $product->price,
                            'price_pro' => $product->price_pro,
                            'qty' => round(abs($data['qty']) + $cart['qty']),
                            'photo' => $product->photo,
                        );
                        Session::put('carts', $carts);

                        return response()->json(['status' => 200]);
                    }
                }
                if($is_avaiable == 0){
                    $carts[] = array(
                        'id' => encryptDecrypt($product->id),
                        'slug' => $product->slug,
                        'name' => $product->name,
                        'price' => $product->price,
                        'price_pro' => $product->price_pro,
                        'qty' => round(abs($data['qty'])),
                        'photo' => $product->photo,
                    );
                    Session::put('carts', $carts);

                    return response()->json(['status' => 200]);
                }
            }
            else{
                $carts[] = array(
                    'id' => encryptDecrypt($product->id),
                    'slug' => $product->slug,
                    'name' => $product->name,
                    'price' => $product->price,
                    'price_pro' => $product->price_pro,
                    'qty' => round(abs($data['qty'])),
                    'photo' => $product->photo,
                );
                Session::put('carts', $carts);

                return response()->json(['status' => 200]);
            }
        }
        else if($product &&  $product->quantily  == 0 ){

            return response()->json(['status' => 501]); //sp hết hàng
        }

        return response()->json(['status' => 502]); // không tìm thấy sp
    }
}
