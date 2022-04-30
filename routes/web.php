<?php

use App\Http\Controllers\FacebookController;
use App\Http\Controllers\testController;
use App\Http\Controllers\TwitterController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Auth;
use Atymic\Twitter\Facade\Twitter;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Twitter as AppTwitter;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/privacypolicy',function(){
    return view('privacypolicy');
});

Route::get('/tandc',function(){
    return view('tandc');
});

Route::get('/profile','profileController@profile');
Route::post('/profile_update','profileController@profile_update');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/getNotifications','HomeController@getNotification');

Route::post('/continue_demo','HomeController@postDemo');

Route::get('/gateway_config','GatewayController@index');

Route::get('/package_config', 'PackageController@index');
Route::post('/add_package','PackageController@add');
//Route::post('/mod_save/{id}','PackageController@mod');
Route::post('/edit_package','PackageController@edit_service');
Route::post('/package_del','PackageController@delete_service');

Route::get('/service_config', 'ServiceController@index');
Route::post('/add_service','ServiceController@add');
Route::post('/mod_save/{id}','ServiceController@mod');

Route::post('/edit_service','ServiceController@edit_service');
Route::post('/service_del','ServiceController@delete_service');

Route::get('/connect','AccountsController@connect_account');
Route::get('/manage','AccountsController@manage_account');

Route::post('/t', 'testController@fb');
Route::get('/fb', 'testController@index');

Route::get('/package_buy','payController@buy');
Route::post('/indipay/response','payController@response');

Route::get('/connect/{id}','AyrshareController@connect');

Route::get('/create_posts', 'PostController@index');

Route::post('/dd', 'PostController@post');

Route::post('/tt', 'PostController@test');
Route::post('/fbp_del', 'PostController@delete_post');









//twitter
/*
Route::get('twitter/login','TwitterController@twitter_login')->name('twitter.login');
Route::get('twitter/callback','TwitterController@twitter_login')->name('twitter.callback');
Route::get('twitter/error','TwitterController@twitter_error')->name('twitter.error');
*/

Route::get('twitter/login', ['as' => 'twitter.login', static function () {
    $token = Twitter::getRequestToken(route('twitter.callback'));

    if (isset($token['oauth_token_secret'])) {
        $url = Twitter::getAuthenticateUrl($token['oauth_token']);

        Session::put('oauth_state', 'start');
        Session::put('oauth_request_token', $token['oauth_token']);
        Session::put('oauth_request_token_secret', $token['oauth_token_secret']);

        return Redirect::to($url);
    }

    return Redirect::route('twitter.error');
}]);

Route::get('twitter/callback', ['as' => 'twitter.callback', static function () {
    // You should set this route on your Twitter Application settings as the callback
    // https://apps.twitter.com/app/YOUR-APP-ID/settings
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

            $done = AppTwitter::updateOrCreate(
                ['user_id' => Auth::id(),"u_id" => $token['user_id']],
                [
                    'user_id' => Auth::id(),
                    "oauth_token" => $token['oauth_token'],
                    "oauth_token_secret" => $token['oauth_token_secret'],
                    "u_id" => $token['user_id'],
                    "screen_name" => $token['screen_name'],
                    "avatar" => $credentials->profile_image_url_https
                ]
            );

            //9810711235;

            Session::put('access_token', $token);

            return Redirect::to('/connect')->with('notice', 'Congrats! You\'ve successfully signed in!');
        }
    }

    return Redirect::route('twitter.error')
            ->with('error', 'Crab! Something went wrong while signing you up!');
}]);

Route::get('twitter/error', ['as' => 'twitter.error', function () {
    // Something went wrong, add your own error handling here
}]);

Route::get('twitter/logout', ['as' => 'twitter.logout', function () {
    Session::forget('access_token');
    return Redirect::to('/')->with('notice', 'You\'ve successfully logged out!');
}]);

Route::post('/connect_twitter','AccountsController@connect_twitter');

//instagram
Route::group(['prefix' => 'auth/facebook', 'middleware' => 'auth'], function () {
    Route::get('/', [\App\Http\Controllers\SocialController::class, 'redirectToProvider']);
    Route::get('/callback', [\App\Http\Controllers\SocialController::class, 'handleProviderCallback']);
});

Route::get('/fb_name', 'FacebookController@fb_connect');


Route::get('/create_account_fb','AccountsController@create_account_fb');
Route::post('/save_account', 'AccountsController@save_account');
Route::get('/fbp_refresh','SocialController@fbp_refresh');
Route::get('/image_editor' , 'PostController@image_editor');

Route::get('/fb_pages/get', 'AccountsController@fb_pages');
Route::get('/fb_groups/get', 'AccountsController@fb_groups');
Route::get('/fb_page/get', 'AccountsController@fb_page');
Route::get('/fb_group/get', 'AccountsController@fb_group');
Route::post('/instagram_account','AccountsController@instagram_account');
Route::get('/instagram_connect','SocialController@instagram_connect');

//Pinterest
Route::get('/login/pinterest', 'PinterestController@redirectToPinterestProvider');
Route::get('/login/pinterest/callback', 'PinterestController@handlePinterestProviderCallback');
Route::get('/pinterestuser', 'PinterestController@getAuthUser');
Route::post('/connect_pinterest','AccountsController@connect_pinterest');


//linked in

Route::get('auth/linkedin', 'LinkedInController@redirectToLinkedin');
Route::get('callback/linkedin', 'LinkedInController@handleCallback');
Route::post('/connect_linkedin','AccountsController@connect_linkedin');

Route::get('/database','AccountsController@dbdump');