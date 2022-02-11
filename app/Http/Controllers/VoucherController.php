<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function update(Request $request, $id){
        $id = encryptDecrypt($id, 'decrypt');
        $voucher = $this->voucherRepo->find($id);
        if($voucher) {
            $this->validate($request,
                [
                    'name' => ['required', 'max:254'],
                    'code' => ['required', 'max:15'],
                    'type' => ['required'],
                    'number' => ['required'],
                ],
                [
                    '*.required' => 'Không được bỏ trống',
                    'name.max' => 'Giới hạn 254 kí tự',
                    'code.max' => 'Giới hạn 15 kí tự',
                    'code.unique' => 'Mã giảm giá đã tồn tại',
                ],
            );
            $data = [
                'name' => $request->name,
                'code' => strtolower($request->code),
                'type' => $request->type,
                'number' => $request->number
            ];

            //CHECK NAME
            $codes = $this->voucherRepo->getItemCheckUnique($id)->pluck('code')->toArray();
            if(in_array(strtolower($request->code), $codes)){
                return Redirect()->back()->with('errorcode', 'Mã giảm giá đã tồn tại')->withInput();
            }
            $query = $this->voucherRepo->update($id, $data);
            if($query){
                return redirect()->route('voucher.index')->with('success', 'Cập nhật mã giảm giá thành công!');
            }
            return redirect()->route('voucher.index')->with('error', 'Vui lòng thử lại sau!');

        }
        return redirect()->route('voucher.index')->with('error', 'Không tìm thấy mã giảm giá!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id){
        $id = encryptDecrypt($id, 'decrypt');
        $voucher = $this->voucherRepo->find($id);
        $route = 'voucher.update';

        return view('admin.page.voucher.form', compact('voucher', 'route'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $id = encryptDecrypt($id, 'decrypt');
        $voucher = $this->voucherRepo->find($id);
        if($voucher) {
            $query = $this->voucherRepo->delete($id);
            if($query){

                return redirect()->back()->with('success', 'Xóa mã giảm giá thành công!');
            }

            return redirect()->back()->with('error', 'Vui lòng thử lại sau!');
        }

        return redirect()->back()->with('error', 'Vui lòng thử lại sau!');
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
        if($this->voucherRepo->update($id, $attributes)){

            return response()->json(['status' => 200]);
        }

        return response()->json(['status' => 500]);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store (Request $request){
        $this->validate($request,
            [
                'name' => ['required', 'max:254'],
                'code' => ['required', 'max:15', 'unique:App\Models\Voucher,code'],
                'type' => ['required'],
                'number' => ['required'],
            ],
            [
                '*.required' => 'Không được bỏ trống',
                'name.max' => 'Giới hạn 254 kí tự',
                'code.max' => 'Giới hạn 15 kí tự',
                'code.unique' => 'Mã giảm giá đã tồn tại',
            ],
        );
        $data = [
            'name' => $request->name,
            'code' => strtolower($request->code),
            'type' => $request->type,
            'number' => $request->number
        ];
        $query = $this->voucherRepo->create($data);
        if($query){

            return redirect()->route('voucher.index')->with('success', 'Thêm mới mã giảm giá thành công!');
        }

        return redirect()->route('voucher.index')->with('error', 'Vui lòng thử lại sau!');
    }

    public function create (){
        $route = 'voucher.store';
        return view('admin.page.voucher.form', compact('route'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $vouchers = $this->voucherRepo->getAll();

        return view('admin.page.voucher.index', compact('vouchers'));
    }
}
