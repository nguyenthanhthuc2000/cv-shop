<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use File;

class ImageController extends Controller
{

    public function edit($id){
        $id = encryptDecrypt($id, 'decrypt');
        $image = $this->imgRepo->find($id);

        if($image){
            $route = 'image.update';

            return view('admin.page.image.form', compact('route',  'image'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $id = encryptDecrypt($id, 'decrypt');
        $image = $this->imgRepo->find($id);
        $photo = $image->photo;
        if($image){
            $query = $this->imgRepo->delete($id);
            if($query){
                //xóa hình cũ
                if (File::exists(public_path() . "/uploads/image/" . $photo)) {
                    File::delete(public_path() . "/uploads/image/" . $photo);
                }
                return redirect()->back()->with('success', 'Xóa thành công!');
            }

            return redirect()->back()->with('error', 'Vui lòng thử lại sau!');
        }

        return redirect()->back()->with('error', 'Không tìm thấy hình ảnh');
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
        if($this->imgRepo->update($id, $attributes)){

            return response()->json(['status' => 200]);
        }

        return response()->json(['status' => 500]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function imageType($type){
        $attr = [
            'type' => $type
        ];
        $route = 'image.update';
        $image = $this->imgRepo->findByAttributes($attr);

        return view('admin.page.image.form', compact('image', 'route'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function update(Request $request, $id){
        $id = encryptDecrypt($id, 'decrypt');
        $image = $this->imgRepo->find($id);
        if($image){
            $data = [
                'photo_desc' => $request->photo_desc,
                'link' => $request->link,
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
                if (File::exists(public_path() . "/uploads/image/" . $image->photo)) {
                    File::delete(public_path() . "/uploads/image/" . $image->photo);
                }

                $photo = encryptDecrypt(randomCode()) .'.'.$request->file('photo')->getClientOriginalExtension();
                $request->file('photo')->move('uploads/image/', $photo);

                $data += array('photo' => $photo);
            }
            $query = $this->imgRepo->update($id, $data);
                if($query){
                    if(in_array($image->type, ['logo-header', 'logo-footer'])){
                        return redirect()->back()->with('success', 'Cập nhật thành công!');
                    }
                    else{
                        return redirect()->route('image.list', $image->type)->with('success', 'Cập nhật thành công!');

                    }
                }
                return redirect()->back()->with('error', 'Vui lòng thử lại sau!');
        }

    }

    /**
     * @param $type
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     */
    public function create($type){
        $attr = [
            'type' => $type
        ];
        $route = 'image.store';

        return view('admin.page.image.form', compact('route', 'type'));
    }

    /**
     * @param $type
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function listImage($type){
        $images = $this->imgRepo->getByAttributes(['type' => $type]);

        return view('admin.page.image.index', compact('images', 'type'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
                'photo' => ['mimes:jpg,png']
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $code = encryptDecrypt(randomCode());
        $photo = $code.'.'.$request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->move('uploads/image/', $photo);

        $data = [
            'photo_desc' => $request->photo_desc,
            'link' => $request->link,
            'type' => $request->type,
            'photo' => $photo
        ];

        $query = $this->imgRepo->create($data);

        if($query){

            return redirect()->route('image.list', $request->type)->with('success', 'Thêm mới thành công!');
        }

        return redirect()->route('image.list', $request->type)->with('error', 'Vui lòng thử lại sau!');
    }
}
