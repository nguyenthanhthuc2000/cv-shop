<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte;
use PHPUnit\Exception;
use File;
use Validator;
use Auth;

class ArticleController extends Controller
{

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id){
        $id = encryptDecrypt($id, 'decrypt');
        $news = $this->articleRepo->find($id);
        if($news){
            $validator = Validator::make($request->all(), [
                    'name' => ['required', 'max:200'],
                    'contents' => ['required'],
                ]
            );
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $code = $news->code;

            $data = [
                'name' => $request->name,
                'slug' => slug($request->name).'-'.$code,
                'content' => $request->contents,
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
                if (File::exists(public_path() . "/uploads/news/" . $news->photo)) {
                    File::delete(public_path() . "/uploads/news/" . $news->photo);
                }

                $photo = encryptDecrypt(randomCode()).'.'.$request->file('photo')->getClientOriginalExtension();
                $request->file('photo')->move('uploads/news/', $photo);

                $data = $data + ['photo' => $photo, 'crawl' => 0];
            }

            $query = $this->articleRepo->update($id, $data);
            if($query){

                return redirect()->route('news.manage')->with('success', 'Cập nhật bài viết thành công!');
            }

            return redirect()->route('news.manage')->with('error', 'Vui lòng thử lại sau!');

        }

        return redirect()->route('news.manage')->with('error', 'Không tìm thấy bài viết!');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function crawlCayvahoa(){
        ini_set('max_execution_time', 360);
        $crawler = \Goutte::request('GET', 'https://cafef.vn/bat-dong-san.chn');
        $crawler->filter('#LoadListNewsCat .tlitem')->each(function ($node) {
            $title = $node->filter('h3')->text();
            $url = 'https://cafef.vn'.$node->filter('h3 > a', 0)->attr('href');
            $img = $node->filter('img')->attr('src');

            $content1 = \Goutte::request('GET', $url);
            $content = '';

            $contents = $content1->filter('#form1 #mainContent')->each(function ($n1) {

                $str = '';
                try {
                    $str = $n1->filter('.link-content-footer')->html();
                } catch (\Exception $e){

                }

                return [$str, $n1->html()];
            });


            if(isset($contents)){
                if($contents[0][0] != ''){
                    $content = str_replace($contents[0][0], '', $contents[0][1]);
                }
                else{
                    $content = $contents[0][1];
                }

                $code = substr(md5(microtime()),rand(0,5), 7);
                $slug = slug($title).'-'.$code;

                $data = [
                    'name' => $title,
                    'slug' => $slug,
                    'code' => $code,
                    'photo' => $img,
                    'author' => $url,
                    'content' => $content,
                    'type' => 'chia-se',
                    'status' => 1,
                    'crawl' => 1
                ];

                $check = $this->articleRepo->findByAttributes(['name' => $title]);
                if(!$check){
                    if(!$this->articleRepo->create($data)){
                    }
                }
            }
        });

        return redirect()->back()->with('success', 'Cập nhật thành công!');
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit ($id){
        $id = encryptDecrypt($id, 'decrypt');
        $route = 'news.update';
        $news =  $this->articleRepo->find($id);
        if($news){

            return view('admin.page.news.form', compact('route', 'news'));
        }

        return redirect()->back()->with('error', 'Không tìm thấy bài viết!');
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
        $code = randomCode();

        $photo = encryptDecrypt($code).'.'.$request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->move('uploads/news/', $photo);

        $data = [
            'author' => Auth::id(),
            'name' => $request->name,
            'code' => $code,
            'slug' => slug($request->name).'-'.$code,
            'photo' => $photo,
            'content' => $request->contents,
            'type' => 'chia-se',
            'crawl' => 1
        ];

        $query = $this->articleRepo->create($data);
        if($query){

            return redirect()->route('news.manage')->with('success', 'Thêm bài viết thành công!');
        }

        return redirect()->route('news.manage')->with('error', 'Vui lòng thử lại sau!');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create(){
        $route = 'news.store';
        return view('admin.page.news.form', compact('route'));
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id){
        $id = encryptDecrypt($id, 'decrypt');
        $article = $this->articleRepo->find($id);
        $photo = $article->photo;
        if($article){
            $query = $this->articleRepo->delete($id);
            if($query){
                //xóa hình cũ
                if (File::exists(public_path() . "/uploads/news/" . $photo)) {
                    File::delete(public_path() . "/uploads/news/" . $photo);
                }
                return redirect()->back()->with('success', 'Xóa thành công!');
            }

            return redirect()->back()->with('error', 'Vui lòng thử lại sau!');
        }

        return redirect()->back()->with('error', 'Không tìm thấy bài viết!');
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
        if($this->articleRepo->update($id, $attributes)){

            return response()->json(['status' => 200]);
        }

        return response()->json(['status' => 500]);
    }


    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(){
        $attributes = [
            'type' => 'chia-se',
        ];
        $news = $this->articleRepo->getByAttributes($attributes);

        return view('admin.page.news.index', compact('news'));
    }
}
