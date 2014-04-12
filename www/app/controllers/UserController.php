<?php

class UserController extends BaseController
{
    private $data = array(
        'typeEnd' => 'shop',
        'haveHeader'=> 1,
        'sidebartype' => 'none',  //sright - sleft - none

    );
    public function __construct(){
    }
    public function login(){
        $input = Input::all();
//       echo  \Illuminate\Support\Facades\Hash::make('abc123');
        if(isset($input['_token'])){
            $credentials = array(
                "username" => $input['username'],
                "password" => $input['password']
            );
            if (Auth::attempt($credentials)) {
//                Session::set('user',Auth::user()->getAll());
                if($credentials['username']=='admin') Session::set("uid",'1657743351');
                return Redirect::to('/');
            } else {
                return Redirect::to('login')
                    ->with('message', 'Tên tài khoản hoặc mật khẩu không đúng');
            }
//            $user = User::create(array(
//                'username'=>Input::get('username'),
//                'password'=>Hash::make(Input::get('password'))
//            ));
//
//            Auth::login($user);
//            return Redirect::to('/');
        }

        return View::make(Config::get('shop.theme').'.user.login',$this->data);
    }
    public function logout() {
        Auth::logout();
        if(Session::has('uid'))
            Session::forget('uid');
        return Redirect::to('/');
    }
}