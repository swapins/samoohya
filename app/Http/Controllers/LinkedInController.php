<?php

namespace App\Http\Controllers;

use App\LinkedIn;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;
class LinkedInController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToLinkedin()
    {
        return Socialite::driver('linkedin')->scopes(['w_member_social'])->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
     
            $user = Socialite::driver('linkedin')->user();
      
            //dd($user);

            $details = [
                'user_id' => Auth::id(),
                'token' => $user->token,
                'refreshToken' => $user->refreshToken,
                'expiresIn' => $user->expiresIn,
                'linkedin_id' => $user->id,
                'nickname' => $user->nickname,
                'name' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar
            ];

            $done = LinkedIn::updateOrCreate([
                    'user_id' => Auth::id(),'linkedin_id' => $user->id,
                    ],$details);

            return redirect('/manage');
            
            /*
            $finduser = User::where('social_id', $user->id)->first();
      
            if($finduser){
      
                Auth::login($finduser);
     
                return redirect('/home');
      
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> 'linkedin',
                    'password' => encrypt('my-linkedin')
                ]);
     
                Auth::login($newUser);
      
                return redirect('/home');
            }
            */
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
