<?php

namespace App\Http\Controllers;

use App\Twitter as AppTwitter;
use Illuminate\Http\Request;
use Atymic\Twitter\Facade\Twitter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class TwitterController extends Controller
{
     public function twitter_login(){
        $token = Twitter::getRequestToken(route('twitter.callback'));

        if (isset($token['oauth_token_secret'])) {
            $url = Twitter::getAuthenticateUrl($token['oauth_token']);

            Session::put('oauth_state', 'start');
            Session::put('oauth_request_token', $token['oauth_token']);
            Session::put('oauth_request_token_secret', $token['oauth_token_secret']);

            return redirect($url);
        }

        return Redirect::route('twitter.error');
     }   
    
     public function twitter_callback(){
        if (Session::has('oauth_request_token')) {
            $twitter = Twitter::usingCredentials(session('oauth_request_token'), session('oauth_request_token_secret'));
            $token = $twitter->getAccessToken(request('oauth_verifier'));
    
            if (!isset($token['oauth_token_secret'])) {
                return Redirect::route('twitter.error')->with('flash_error', 'We could not log you in on Twitter.');
            }
    
            // use new tokens
            $twitter = Twitter::usingCredentials($token['oauth_token'], $token['oauth_token_secret']);
            $credentials = $twitter->getCredentials();
    
            if (is_object($credentials) && !isset($credentials->error)) {
                // $credentials contains the Twitter user object with all the info about the user.
                // Add here your own user logic, store profiles, create new users on your tables...you name it!
                // Typically you'll want to store at least, user id, name and access tokens
                // if you want to be able to call the API on behalf of your users.
    
                // This is also the moment to log in your users if you're using Laravel's Auth class
                // Auth::login($user) should do the trick.
                Session::put('access_token', $token);
                dd($token);
                
                $done = AppTwitter::updateOrCreate(
                    ['user_id' => Auth::id()],
                    [
                        'user_id' => Auth::id(),
                        "oauth_token" => $token['oauth_token'],
                        "oauth_token_secret" => $token['oauth_token_secret'],
                        "u_id" => $token['user_id'],
                        "screen_name" => $token['screen_name'],
                    ]
                );
                
               
                return Redirect::to('/connect');
            }
        }
    
        return Redirect::route('twitter.error')
                ->with('error', 'Crab! Something went wrong while signing you up!');

     }

     public function twitter_error(){
         dd("something went wrong");
     }
}
