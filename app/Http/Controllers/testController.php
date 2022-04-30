<?php

namespace App\Http\Controllers;

use Facebook\Facebook;
use Illuminate\Http\Request;

class testController extends Controller
{
    public function index(){
        return view('test');
    }
    
    public function fb (Facebook $fb , Request $request){
        
        // retrieve form input parameters
        $uid = $request->input('uid');
        $access_token = $request->input('access_token');
        $permissions = $request->input('permissions');

        // assuming we have a User model already set up for our database
        // and assuming facebook_id field to exist in users table in database
        //$user = User::firstOrCreate(['facebook_id' => $uid]); 

        // get long term access token for future use
        $oAuth2Client = $fb->getOAuth2Client();

        // assuming access_token field to exist in users table in database
        $user = $oAuth2Client->getLongLivedAccessToken($access_token)->getValue();
       

        // set default access token for all future requests to Facebook API            
        $fb->setDefaultAccessToken($user);

        
        // call api to retrieve person's public_profile details
        $fields = "id,cover,name,first_name,last_name,age_range,link,gender,locale,picture,timezone,updated_time,verified";
       // $fb_user = $fb->get('/me?fields='.$fields)->getGraphUser();
        //$test = $fb->get('/me?fields='.$fields)->getGraphUser();
        $linkData = [
            'link' => 'http://www.example.com',
            'message' => 'User provided message',
            ];

        $page_id =$fb->get('/me?fields='.$fields)->getGraphPage()->getId();


       
        dd($page_id,$user);
    }


}
