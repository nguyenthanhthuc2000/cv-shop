<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;

class OrderController extends Controller
{
    public function store(Request $request){
        if(Session::has('carts') && count(Session::get('carts')) > 0){
            $validator = Validator::make($request->all(), [
                'address' => ['required'],
                'name' => ['required' , 'max:35'],
                'phone' => ['required', 'numeric', 'digits_between:1,12'],
            ]);
            if ($validator->fails()) {
                return redirect()
                    ->route('home.checkout')
                    ->withErrors($validator)
                    ->withInput();
            }

            $customer = $this->customerRepo->findByAttributes(['phone' => $request->phone]);
            if(!$customer){
                $customerData = [
                    'name' => $request->name,
                    'phone' => $request->phone
                ];

                try {
                    $customerUser = $this->customerRepo->create($customerData);
                    $customerID = $customerUser->id;
                } catch (\Exception $e){

                    return redirect()->back();
                }
            }
            else{

                $customerID = $customer->id;
            }

            $carts = Session::get('carts');
            $order_code = randomCode();
            $totalVoucher = 0;
            $totalCarts = 0;
            $voucherID = '';

            foreach ($carts as $cart){
                $price = $cart['price'];
                if($cart['price_pro'] > 0){
                    $price = $cart['price_pro'];
                }
                $totalCarts += $cart['qty'] * $price;

                $orderDetail = [
                    'order_code' => $order_code,
                    'product_id' => encryptDecrypt($cart['id'], 'decrypt') ,
                    'product_qty' => $cart['qty']
                ];
                $this->orderDetailRepo->create($orderDetail);

            }

            if(Session::has('voucher')){
                $voucher = Session::get('voucher');
                $voucherID = $voucher[0]['voucher_id'];

                if($voucher[0]['voucher_type'] == 1){
                    $totalVoucher = ($totalCarts/100) * $voucher[0]['voucher_number'];
                }
                else{
                    $totalVoucher = $voucher[0]['voucher_number'];
                }
            }

            $order = [
                'customer_id' => $customerID,
                'order_code' => $order_code,
                'address' => $request->address,
                'note' => $request->note,
                'feeship' => 0,
                'total' => $totalCarts - $totalVoucher,
                'voucher_id' => $voucherID,
                'method_checkout' => $request->method_checkout,
            ];

            try {
                $queryOrder = $this->orderRepo->create($order);

                return redirect()->back()->with('success', 'Cảm ơn đã đặt hàng, chúng tôi sẽ liên hệ đến bạn để xác nhận đơn hàng!');

            } catch (\Exception $e){

                return redirect()->back();
            }

        }

        return redirect()->back();
    }
}
