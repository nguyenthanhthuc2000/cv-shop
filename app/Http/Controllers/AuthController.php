<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;

class AuthController extends Controller
{
    public function logout(Request $request){

        $request->session()->flush();
        Auth::logout();
        return redirect()->route('auth.index');

    }

    public function index(){
        if(!Auth::check()){
            return view('shop.page.auth.auth');
        }
        return redirect()->route('home.index');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
                'email' => ['required', 'email'],
                'password' => 'required',
            ]
        );
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $ip = $this->getIp();
            if($ip){
                $array = ['last_ip_login' => $ip];
                $this->userRepo->update(Auth::id(), $array);
            }
            return redirect()->route('home.index');
        }
        else{
            return back()->with([
                'error' => 'Tài khoản hoặc mật khẩu không chính xác!',
            ]);
        }
    }

    public function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }
}
