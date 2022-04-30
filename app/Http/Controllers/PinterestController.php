<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use DirkGroenen\Pinterest\Pinterest;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Pinterest;

class PinterestController extends Controller
{
    // Code called for each new Person we createprotected $pinterest;
    

    public function redirectToPinterestProvider(){
        return Socialite::with('pinterest')->scopes([
            'ads:read',
            'boards:read',
            'boards:read_secret',
            'boards:write',
            'boards:write_secret',
            'pins:read',
            'pins:read_secret',
            'pins:write',
            'pins:write_secret',
            'user_accounts:read',
        ])->redirect();
    }
 
    public function handlePinterestProviderCallback(){
        $user = Socialite::driver('pinterest')->user();
        //dd($user);
        $details = [
            "token" => $user->token,
            "user_id" => Auth::id(),
            "Pinterest_id" => $user->id,
            "profile_image" => $user->avatar
        ];

        Pinterest::updateOrCreate(
            ["user_id" => Auth::id(),"Pinterest_id" => $user->id],
            $details
        );

        return redirect('/connect');
    }

    
}

