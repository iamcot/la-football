<?php
class FootballController extends BaseController
{
    public function index(){
        $data['title'] = 'Home';
        return View::make('football/start',$data);
    }
    public function admin(){
        $data['title'] = 'Admin';
        return View::make('football/admin',$data);
    }
    public function adminGiai(){
        $data['title'] = '';
        return View::make("football/admingiai",$data);
    }
}