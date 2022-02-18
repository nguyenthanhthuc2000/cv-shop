<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function checkout(){

        return view('shop.page.cart.checkout');
    }


    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function loadCartTotalAjax(){
        $output = view('shop.page.cart.component.load_page_total_cart_ajax')->render();

        return response()->json(['output' => $output, 'status' => 200]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function addVoucher(Request $request){
        if(Session::has('carts')){

            $voucher = $this->voucherRepo->findByAttributes(['code' => $request->voucher, 'status' => 1]);
            if($voucher == null){
                return Response()->json(['status' => 501, 'message' => 'Mã giảm giá không tồn tại!']);
            }
            $voucher_code_session[] = array(
                'voucher_id' =>  $voucher->id,
                'voucher_code' =>  $voucher->code,
                'voucher_type' =>  $voucher->type,
                'voucher_number' =>  $voucher->number,
            );
            Session::put('voucher', $voucher_code_session);
            return Response()->json(['status' => 200, 'message' => 'Dùng mã giảm giá thành công!']);

        }
        return Response()->json(['status' => 501, 'message' => 'Lỗi!']);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateQtyProduct(Request $request){
        if($request->qty < 1){
            return Response()->json(['status' => 501]); //
        }
        $product = $this->productRepo->find(encryptDecrypt($request->id, 'decrypt'));
        if($product){
            if($request->qty > $product->quantily){
                return Response()->json(['status' => 501]); // số lượng trong kho k đủ
            }

            $carts = Session::get('carts');

            if($carts == true) {
                foreach ($carts as $key => $cart) {
                    if ($cart['id'] == $request->id) {
                        $carts[$key]['qty'] = $request->qty;
                    }
                }
                Session::put('carts',$carts);
                return Response()->json(['status' => 200]);
            }
            return Response()->json(['status' => 501]);
        }
        return Response()->json(['status' => 501]); // k thấy sp
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function cartDeleteProduct(Request $request){

        $carts = Session::get('carts');
        if($carts == true){
            foreach($carts as $key => $cart) {
                if($request->id == $cart['id']){
                    unset($carts[$key]);
                }
            }
            Session::put('carts',$carts);
            if(count(Session::get('carts')) < 1){
                Session::forget('voucher');
            }
            return Response()->json(['status' => 200]);
        }
        else{
            return Response()->json(['status' => 501]);
        }
    }


    /**
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function loadCartTableAjax(){
        $carts = Session::get('carts');
        $output = view('shop.page.cart.component.load_page_cart_ajax', compact('carts'))->render();

        return response()->json(['output' => $output, 'status' => 200]);
    }
    /**
     * @return \Illuminate\Http\JsonResponse|void
     */
    public function loadCartAjax(){

        $carts = Session::get('carts');
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
                        $newQty = round(abs($data['qty']) + $cart['qty']);
                        if($newQty > $product->quantily){
                            return response()->json(['status' => 503]); //sp hết hàng
                        }
                        $is_avaiable++;
                        $carts[$key] = array(
                            'id' => encryptDecrypt($product->id),
                            'slug' => $product->slug,
                            'name' => $product->name,
                            'price' => $product->price,
                            'price_pro' => $product->price_pro,
                            'qty' => $newQty,
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
