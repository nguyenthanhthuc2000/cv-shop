<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Models\Order;

class OrderController extends Controller
{

    public function viewOrder(Request $request){

        $id = encryptDecrypt($request->id, 'decrypt');
        $order =  $this->orderRepo->find($id);
        $order_details = $this->orderDetailRepo->getByAttributesAll(['order_code' => $order->order_code]);
        $output = view('shop.page.cart.component.view_order', compact('order', 'order_details'))->render();

        return response()->json(['output' => $output, 'status' => 200]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function checkOrder(Request $request){
        if($request->phone){
            $orders = [];
            $customer = $this->customerRepo->findByAttributes(['phone' => $request->phone]);
            if($customer){

                $orders =  Order::User($customer->id)->orderBy('id','DESC')->get();
            }

            return view('shop.page.cart.check_order', compact('orders'));
        }
        else{

            return view('shop.page.cart.check_order');
        }

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateStatus(Request $request){
        $id = encryptDecrypt($request->id, 'decrypt');
        $attributes = [
            'status' => $request->status
        ];
        if($this->orderRepo->update($id, $attributes)){

            return response()->json(['status' => 200]);
        }

        return response()->json(['status' => 500]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updatePaymentStatus(Request $request){
        $id = encryptDecrypt($request->id, 'decrypt');
        $attributes = [
            'payment_status' => $request->status
        ];
        $query =  $this->orderRepo->update($id, $attributes);

        if($query){

            return response()->json(['status' => 200]);
        }

        return response()->json(['status' => 500]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $orders = $this->orderRepo->getAll();

        return view('admin.page.order.index', compact('orders'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function detail($id){
        $id = encryptDecrypt($id, 'decrypt');

        $order =  $this->orderRepo->find($id);
        if($order){

            $order_details = $this->orderDetailRepo->getByAttributesAll(['order_code' => $order->order_code]);

            return view('admin.page.order.order_detail', compact('order_details','order'));
        }

        return redirect()->route('order.index')->with('error', 'Không tìm thấy hóa đơn');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
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

                    return redirect()->back()->with('error', 'Lỗi');
                }
            }
            else{

                $customerID = $customer->id;
            }

            $carts = Session::get('carts');
            $order_code = randomCode();
            $totalVoucher = 0;
            $totalCarts = 0;
            $voucherID = null;

            foreach ($carts as $cart){
                $price = $cart['price'];
                if($cart['price_pro'] > 0){
                    $price = $cart['price_pro'];
                }
                $totalCarts += $cart['qty'] * $price;

                $orderDetail = [
                    'order_code' => $order_code,
                    'product_id' => encryptDecrypt($cart['id'], 'decrypt') ,
                    'product_qty' => $cart['qty'],
                    'price' => $cart['price'],
                    'price_pro' => $cart['price_pro']
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
                'method_checkout' => $request->method_checkout
            ];
//            dd($order);

            try {
                $queryOrder = $this->orderRepo->create($order);
                Session::forget('carts');
                Session::forget('voucher');

                return redirect()->back()->with('successOrder', "Cảm ơn đã đặt hàng, chúng tôi sẽ liên hệ đến bạn để xác nhận đơn hàng! Kiểm tra đơn hàng");

            } catch (\Exception $e){

                return redirect()->back()->with('error', 'Lỗi');
            }

        }

        return redirect()->back();
    }
}
