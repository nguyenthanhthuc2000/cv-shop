<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use File;

class ServiceController extends Controller
{
    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id){
        $id = encryptDecrypt($id, 'decrypt');
        $service = $this->serviceRepo->find($id);
        if($service){
            $validator = Validator::make($request->all(), [
                    'name' => ['required', 'max:200'],
                    'contents' => ['required'],
                ]
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $check = $this->serviceRepo->checkSlug($id, slug($request->name));
            if($check !== null){

                return redirect()->back()->with('slug', 'Tên dịch vụ đã tồn tại');
            }


            $data = [
                'name' => $request->name,
                'slug' => slug($request->name),
                'content' => $request->contents,
                'seo_keywords' => $request->seo_keywords,
                'seo_description' => $request->seo_description,
                'seo_title' => $request->seo_title
            ];

            if($request->file('photo')){
                $validator = Validator::make($request->all(), [
                        'photo' => ['mimes:jpg,png']
                    ]
                );
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                //xóa hình cũ
                if (File::exists(public_path() . "/uploads/news/" . $service->photo)) {
                    File::delete(public_path() . "/uploads/news/" . $service->photo);
                }

                $photo = encryptDecrypt(randomCode()).'.'.$request->file('photo')->getClientOriginalExtension();
                $request->file('photo')->move('uploads/news/', $photo);

                $data = $data + ['photo' => $photo];
            }

            $query = $this->serviceRepo->update($id, $data);
            if($query){

                return redirect()->route('service.manage')->with('success', 'Cập nhật dịch vụ thành công!');
            }

            return redirect()->route('service.manage')->with('error', 'Vui lòng thử lại sau!');

        }

        return redirect()->route('service.manage')->with('error', 'Không tìm thấy dịch vụ!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit ($id){
        $id = encryptDecrypt($id, 'decrypt');
        $route = 'service.update';
        $service =  $this->serviceRepo->find($id);
        if($service){

            return view('admin.page.service.form', compact('route', 'service'));
        }

        return redirect()->back()->with('error', 'Không tìm thấy dịch vụ!');
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $id = encryptDecrypt($id, 'decrypt');
        $service = $this->serviceRepo->find($id);
        $photo = $service->photo;
        if($service){
            $query = $this->serviceRepo->delete($id);
            if($query){
                //xóa hình cũ
                if (File::exists(public_path() . "/uploads/news/" . $photo)) {
                    File::delete(public_path() . "/uploads/news/" . $photo);
                }
                return redirect()->back()->with('success', 'Xóa thành công!');
            }

            return redirect()->back()->with('error', 'Vui lòng thử lại sau!');
        }

        return redirect()->back()->with('error', 'Không tìm thấy dịch vụ!');
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
        if($this->serviceRepo->update($id, $attributes)){

            return response()->json(['status' => 200]);
        }

        return response()->json(['status' => 500]);
    }



    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
                'name' => ['required', 'max:200'],
                'contents' => ['required'],
                'photo' => ['required', 'mimes:jpg,png'],
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $service = $this->serviceRepo->getItemsBySlug( slug($request->name));
        if($service !== null){

            return redirect()->back()->with('slug', 'Tên dịch vụ đã tồn tại');
        }

        $photo = encryptDecrypt(randomCode()).'.'.$request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->move('uploads/news/', $photo);

        $data = [
            'name' => $request->name,
            'slug' => slug($request->name),
            'photo' => $photo,
            'content' => $request->contents,
            'seo_keywords' => $request->seo_keywords,
            'seo_description' => $request->seo_description,
            'seo_title' => $request->seo_title
        ];

        $query = $this->serviceRepo->create($data);
        if($query){

            return redirect()->route('service.manage')->with('success', 'Dịch vụ viết thành công!');
        }
        return redirect()->route('service.manage')->with('error', 'Vui lòng thử lại sau!');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(){
        $route = 'service.store';
        return view('admin.page.service.form', compact('route'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $services = $this->serviceRepo->getAll();

        return view('admin.page.service.index', compact('services'));
    }
}
