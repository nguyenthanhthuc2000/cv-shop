<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;


class AdminController extends Controller
{
    public function index(){

        return view('admin.page.index');
    }

    public function setting(){

        $setting = $this->settingRepo->find(1);
        return view('admin.page.setting.setting', compact('setting'));
    }

    public function settingUpdate(Request $request){
//        $this->validate($request,
//            [
//                'email' => ['required', 'email' , 'max:64'],
//                'address' => ['required'],
//                'domain' => ['required', 'max:64'],
//                'name' => ['required' , 'max:254'],
//                'open_time' => ['required', 'max:30'],
//                'zalo' => ['required', 'max:15'],
//                'hotline_1' => ['required', 'max:15'],
//                'hotline_2' => ['required', 'max:15'],
//                'slogan' => ['required', 'max:254'],
//                'link_fanpage' => ['required'],
//            ],
//            [
//                '*.required' => 'Không được bỏ trống',
//                'email.email' => 'Sai định dạng email',
//                'code.max' => 'Giới hạn kí tự',
//            ],
//        );

        $validator = Validator::make($request->all(), [
                'email' => ['required', 'email' , 'max:64'],
                'address' => ['required'],
                'domain' => ['required', 'max:64'],
                'name' => ['required' , 'max:254'],
                'open_time' => ['required', 'max:30'],
                'zalo' => ['required', 'max:15'],
                'hotline_1' => ['required', 'max:15'],
                'hotline_2' => ['required', 'max:15'],
                'slogan' => ['required', 'max:254'],
                'link_facebook' => ['required'],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->route('admin.setting')
                ->withErrors($validator)
                ->withInput();
        }
        $query = $this->settingRepo->update(1, $request->all());
        if($query){
            return redirect()->back()->with('success', 'Cập nhật thành công!');
        }
        return redirect()->back()->with('error', 'Vui lòng thử lại sau!');
    }
}
