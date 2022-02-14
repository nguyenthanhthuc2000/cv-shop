<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategory(Request $request){
        $id = encryptDecrypt($request->id, 'decrypt');
        $attributes = [
            'parent_id' => $id,
            'status' => 1
        ];
        $category2 = $this->categoryRepo->getByAttributesAll($attributes);
        if($category2){
            $output = view('admin.page.product.component.category2', compact('category2'));

            return $output;
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
        if($this->categoryRepo->update($id, $attributes)){

            return response()->json(['status' => 200]);
        }

        return response()->json(['status' => 500]);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $id = encryptDecrypt($id, 'decrypt');
        $category = $this->categoryRepo->find($id);
        if($category) {
            $level = $category->level;
            $query = $this->categoryRepo->delete($id);

            if($query){

                return redirect()->back()->with('success', 'Xóa danh mục thành công!');
            }

            return redirect()->back()->with('error', 'Vui lòng thử lại sau!');
        }

        return redirect()->back()->with('error', 'Vui lòng thử lại sau!');
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id){
        $id = encryptDecrypt($id, 'decrypt');
        $category = $this->categoryRepo->find($id);
        if($category){
            $this->validate($request,
                [
                    'name' => ['required', 'max:50'],
                    'parent_id' => ['required'],
                ],
                [
                    '*.required' => 'Không được bỏ trống',
                    'name.max' => 'Giới hạn 50 kí tự',
                ],
            );

            $data = [
                'name' => $request->name,
                'slug' => slug($request->name),
                'parent_id' => $request->parent_id
            ];

            if($request->seo_title){
                $this->validate($request,
                    [
                        'seo_title' => ['required', 'max:254'],
                    ],
                    [
                        '*.required' => 'Không được bỏ trống',
                        'seo_title.max' => 'Giới hạn 254 kí tự',
                    ],
                );
                $data += array('seo_title' => $request->seo_title);
            }
            if($request->seo_keywords){
                $this->validate($request,
                    [
                        'seo_keywords' => ['required', 'max:254'],
                    ],
                    [
                        '*.required' => 'Không được bỏ trống',
                        'seo_keywords.max' => 'Giới hạn 254 kí tự',
                    ],
                );
                $data += array('seo_keywords' => $request->seo_keywords);
            }
            if($request->seo_description){
                $this->validate($request,
                    [
                        'seo_description' => ['required', 'max:254'],
                    ],
                    [
                        '*.required' => 'Không được bỏ trống',
                        'seo_description.max' => 'Giới hạn 254 kí tự',
                    ],
                );
                $data += array('seo_description' => $request->seo_description);
            }

            //CHECK NAME
            $slugs = $this->categoryRepo->getItemCheckUnique($id)->pluck('slug')->toArray();
            if(in_array(slug($request->name), $slugs)){

                return Redirect()->back()->with('name', 'Tên danh mục đã tồn tại')->withInput();
            }

            $query = $this->categoryRepo->update($id, $data);
            if($query){
                if($request->level == 1){

                    return redirect()->route('category1.index')->with('success', 'Cập nhật danh mục thành công!');
                }

                return redirect()->route('category2.index')->with('success', 'Cập nhật danh mục thành công!');
            }
        }
        if($request->level == 1){

            return redirect()->route('category1.index')->with('error', 'Vui lòng thử lại sau!');
        }

        return redirect()->route('category2.index')->with('error', 'Vui lòng thử lại sau!');

    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id){
        $id = encryptDecrypt($id, 'decrypt');

        $cat = $this->categoryRepo->find($id);
        if($cat){
            $level = $cat->level;
            if($level == 1){
                $attributes = [
                    'level' => 0
                ];
            }
            elseif($level == 2){
                $attributes = [
                    'level' => 1
                ];
            }
            $route = 'category.update';
            $categorys = $this->categoryRepo->getByAttributes($attributes);

            return view('admin.page.category.form', compact('level','categorys', 'route', 'cat'));
        }

        return back();

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request){
        $this->validate($request,
            [
                'name' => ['required', 'max:50', 'unique:App\Models\Category,name'],
                'parent_id' => ['required'],
            ],
            [
                '*.required' => 'Không được bỏ trống',
                'name.max' => 'Giới hạn 50 kí tự',
                'name.unique' => 'Tên danh mục đã tồn tại',
            ],
        );

        $data = [
            'name' => $request->name,
            'slug' => slug($request->name),
            'level' => $request->level,
            'parent_id' => $request->parent_id
        ];

        if($request->seo_title){
            $this->validate($request,
                [
                    'seo_title' => ['required', 'max:254'],
                ],
                [
                    '*.required' => 'Không được bỏ trống',
                    'seo_title.max' => 'Giới hạn 254 kí tự',
                ],
            );
            $data += array('seo_title' => $request->seo_title);
        }
        if($request->seo_keywords){
            $this->validate($request,
                [
                    'seo_keywords' => ['required', 'max:254'],
                ],
                [
                    '*.required' => 'Không được bỏ trống',
                    'seo_keywords.max' => 'Giới hạn 254 kí tự',
                ],
            );
            $data += array('seo_keywords' => $request->seo_keywords);
        }
        if($request->seo_description){
            $this->validate($request,
                [
                    'seo_description' => ['required', 'max:254'],
                ],
                [
                    '*.required' => 'Không được bỏ trống',
                    'seo_description.max' => 'Giới hạn 254 kí tự',
                ],
            );
            $data += array('seo_description' => $request->seo_description);
        }

        $query = $this->categoryRepo->create($data);
        if($query){
            if($request->level == 1){
                return redirect()->route('category1.index')->with('success', 'Thêm mới danh mục thành công!');
            }
            return redirect()->route('category2.index')->with('success', 'Thêm mới danh mục thành công!');
        }
        if($request->level == 1){
            return redirect()->route('category1.index')->with('error', 'Vui lòng thử lại sau!');
        }
        return redirect()->route('category2.index')->with('error', 'Vui lòng thử lại sau!');
    }

    /**
     * @param $level
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create($level){
        $level = encryptDecrypt($level, 'decrypt');
        if($level == 1){
            $attributes = [
                'level' => 0
            ];
        }
        elseif($level == 2){
            $attributes = [
                'level' => 1
            ];
        }
        $route = 'category.store';
        $categorys = $this->categoryRepo->getByAttributesAll($attributes);

        return view('admin.page.category.form', compact('level','categorys', 'route'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function indexCategory1(){
        $level = 1;
        $attributes = [
            'level' => $level
        ];
        $categorys = $this->categoryRepo->getByAttributes($attributes);

        return view('admin.page.category.index', compact('categorys', 'level'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function indexCategory2(){
        $level = 2;
        $attributes = [
            'level' => $level
        ];
        $categorys = $this->categoryRepo->getByAttributes($attributes);

        return view('admin.page.category.index', compact('categorys', 'level'));
    }
}
