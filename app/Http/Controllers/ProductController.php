<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use File;

class ProductController extends Controller
{
    //SHOP
    public function getDetailProduct($slug){
        $product = $this->productRepo->getItemsBySlug($slug);
        if($product){
            $products =  $this->productRepo->getProductInvolve($product->category1_id, $product->id);

            return view('shop.page.product.detail', compact('product', 'products'));
        }

    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function getProductByCat($slug){
        $cat = $this->categoryRepo->getItemsBySlug($slug);
        if($cat){
            $titlePage = $cat->name;
            if($cat->level == 1){
                $attributes = [
                    'category1_id' => $cat->id
                ];
            }
            else{
                $attributes = [
                    'category2_id' => $cat->id
                ];
            }
            $products = $this->productRepo->getByAttributes($attributes);

            return view('shop.page.product.list', compact('products', 'titlePage'));
        }

    }

    //ADMIN
    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $id = encryptDecrypt($id, 'decrypt');
        $product = $this->productRepo->find($id);
        $photo = $product->photo;
        if($product){
            $query = $this->productRepo->delete($id);
            if($query){
                //xóa hình cũ
                if (File::exists(public_path() . "/uploads/product/" . $photo)) {
                    File::delete(public_path() . "/uploads/product/" . $photo);
                }
                return redirect()->back()->with('success', 'Xóa thành công!');
            }

            return redirect()->back()->with('error', 'Vui lòng thử lại sau!');
        }

        return redirect()->back()->with('error', 'Không tìm thấy sản phẩm!');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id){
        $id = encryptDecrypt($id, 'decrypt');
        $product = $this->productRepo->find($id);
        if($product){
            $validator = Validator::make($request->all(), [
                    'name' => ['required', 'max:100'],
                    'contents' => ['required'],
                    'price' => ['required', 'numeric', 'digits_between:1,12'],
                    'price_pro' => ['required', 'numeric',  'digits_between:1,12'],
                    'quantily' => ['required', 'numeric', 'digits_between:1,12'],
                    'quantily_sold' => ['required', 'numeric',  'digits_between:1,12'],
                    'made_in' => ['required', 'max:30'],
                    'category1_id' => 'required',
                ]
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $code = $product->code;

            $data = [
                'user_id' => Auth::id(),
                'name' => $request->name,
                'code' => $code,
                'slug' => slug($request->name).'-'.$code,
                'content' => $request->contents,
                'price' => $request->price,
                'price_pro' => $request->price_pro,
                'quantily' => $request->quantily,
                'quantily_sold' => $request->quantily_sold,
                'mass' => $request->mass,
                'made_in' => $request->made_in,
                'seo_title' => $request->made_in,
                'seo_keywords' => $request->made_in,
                'seo_description' => $request->made_in,
                'category1_id' => encryptDecrypt($request->category1_id, 'decrypt'),
                'category2_id' => encryptDecrypt($request->category2_id, 'decrypt'),
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
                if (File::exists(public_path() . "/uploads/product/" . $product->photo)) {
                    File::delete(public_path() . "/uploads/product/" . $product->photo);
                }

                $photo = $code.'.'.$request->file('photo')->getClientOriginalExtension();
                $request->file('photo')->move('uploads/product/', $photo);

                $data = $data + array('photo' => $photo);
            }

            $query = $this->productRepo->update($id, $data);
            if($query){

                return redirect()->route('product.index')->with('success', 'Cập nhật sản phẩm thành công!');
            }

            return redirect()->route('product.index')->with('error', 'Vui lòng thử lại sau!');
        }

        return redirect()->route('product.index')->with('error', 'Không tìm thấy sản phẩm');
    }

    public  function edit($id){
        $id = encryptDecrypt($id, 'decrypt');
        $product = $this->productRepo->find($id);
        if($product){
            $attributes = [
                'level' => 1,
                'status' => 1
            ];
            $attributes2 = [
                'level' => 2,
                'status' => 1,
                'parent_id' => $product->category1_id,
            ];
            $category1 = $this->categoryRepo->getByAttributesAll($attributes);
            $category2 = $this->categoryRepo->getByAttributesAll($attributes2);
            $route = 'product.update';

            return view('admin.page.product.form', compact('category1','category2',  'route', 'product'));
        }

        return redirect()->back()->with('error', 'Không tìm thấy sản phẩm!');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateHighLights(Request $request){
        $id = encryptDecrypt($request->id, 'decrypt');
        $attributes = [
            'highlights' => $request->highlights
        ];
        if($this->productRepo->update($id, $attributes)){

            return response()->json(['status' => 200]);
        }

        return response()->json(['status' => 500]);
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
        if($this->productRepo->update($id, $attributes)){

            return response()->json(['status' => 200]);
        }

        return response()->json(['status' => 500]);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $products = $this->productRepo->getAll();
        return view('admin.page.product.index', compact('products'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create (){
        $attributes = [
            'level' => 1,
            'status' => 1
        ];
        $category1 = $this->categoryRepo->getByAttributesAll($attributes);
        $route = 'product.store';

        return view('admin.page.product.form', compact('category1', 'route'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        $validator = Validator::make($request->all(), [
                'name' => ['required', 'max:100'],
                'contents' => ['required'],
                'price' => ['required', 'numeric', 'digits_between:1,12'],
                'price_pro' => ['required', 'numeric',  'digits_between:1,12'],
                'quantily' => ['required', 'numeric', 'digits_between:1,12'],
                'quantily_sold' => ['required', 'numeric',  'digits_between:1,12'],
                'photo' => ['required', 'mimes:jpg,png'],
                'made_in' => ['required', 'max:30'],
                'category1_id' => 'required',
            ]
        );
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $code = randomCode();

        $photo = encryptDecrypt($code).'.'.$request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->move('uploads/product/', $photo);

        $data = [
            'user_id' => Auth::id(),
            'name' => $request->name,
            'code' => $code,
            'slug' => slug($request->name).'-'.$code,
            'photo' => $photo,
            'content' => $request->contents,
            'price' => $request->price,
            'price_pro' => $request->price_pro,
            'quantily' => $request->quantily,
            'quantily_sold' => $request->quantily_sold,
            'mass' => $request->mass,
            'made_in' => $request->made_in,
            'seo_title' => $request->made_in,
            'seo_keywords' => $request->made_in,
            'seo_description' => $request->made_in,
            'category1_id' => encryptDecrypt($request->category1_id, 'decrypt'),
            'category2_id' => encryptDecrypt($request->category2_id, 'decrypt'),
        ];

        $query = $this->productRepo->create($data);
        if($query){

            return redirect()->route('product.index')->with('success', 'Thêm sản phẩm thành công!');
        }

        return redirect()->route('product.index')->with('error', 'Vui lòng thử lại sau!');
    }

    //SHOP
    public function listProduct($catID){

        return view('shop.page.product.list');
    }

}
