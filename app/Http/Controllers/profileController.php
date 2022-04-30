<?php

namespace App\Http\Controllers;

use App\Userdetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class profileController extends Controller
{
    public function profile(){
        return view('profile.profile');
    }

    public function profile_update(Request $request){

        if ($request->hasFile('photo')){
            $photo = time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(public_path('/img/profile_picture'), $photo);
        }
        $done = Userdetails::updateOrCreate(
                    ['user_id'=>Auth::id()],
                    ['photo'=>'./img/profile_picture/'.$photo,
                      'disc'=>$request->input('disc')]);
        if ($done){
            Session::flash('message', 'Profile Updated!'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect()->back();
        }else{
            Session::flash('message', 'Something went wrong!'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect()->back();
        }
    }
}
