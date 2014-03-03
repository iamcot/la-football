<?php
class UserController extends Controller
{
    public function loginAction(){
        return View::make('user/login');
    }
}