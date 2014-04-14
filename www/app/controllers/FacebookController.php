<?php
class FacebookController extends BaseController
{
    public function anyIndex(){
        $facebook = new Facebook(Config::get('facebook'));
        $params = array(
            'redirect_uri' => url('facelogin/callback'),
            'scope' => 'email',
        );
        return Redirect::to($facebook->getLoginUrl($params));
    }
    public function anyCallback(){

        $code = Input::get('code');
        if (strlen($code) == 0) return Redirect::to('/')->with('message', 'There was an error communicating with Facebook');

        $facebook = new Facebook(Config::get('facebook'));
        $uid = $facebook->getUser();
//        var_dump($uid);
        if ($uid == 0) return Redirect::to('/')->with('message', 'There was an error');

        $me = $facebook->api('/me');
//        var_dump($me);
        $profile = Profile::whereUid($uid)->first();
//        var_dump($profile);
        if (empty($profile)) {

            $user = new User;
            $user->lafullname = $me['first_name'].' '.$me['last_name'];
            $user->laemail = $me['email'];
            $user->laphoto = 'https://graph.facebook.com/'.$me['username'].'/picture?type=square';

            $user->save();

            $profile = new Profile();
            $profile->uid = $uid;
            $profile->username = $me['username'];
            $profile = $user->profiles()->save($profile);
        }

        $profile->laaccess_token = $facebook->getAccessToken();
        $profile->save();

        $user = $profile->user;
        Auth::login($user);
        Session::put('uid',$uid);

        return Redirect::to('/');
    }
    public function anySavecomment(){
        $data = array(
//            'lafullname'=>Input::get('lafullname'),
//            'lacontent'=>Input::get('lacontent'),
            'laurl'=>Input::get('laurl'),
        );
        Facebookcomment::create($data);
//        $facebook = new Facebook(Config::get('facebook'));
//        $facebook->getAccessToken();
//        $response = $facebook->api(
//            "/".Input::get('commentid')
//        );
//        var_dump($response);
    }
}