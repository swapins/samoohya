<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Softon\Indipay\Facades\Indipay;
use App\User;
use Illuminate\Auth\Events\Failed;
use Illuminate\Support\Facades\Auth;

class payController extends Controller
{
    public function buy(Request $request){
        //dd($request);
        $name = User::find($request->input('uid'))->name;
        $pkg = $request->input('pkg');
        $email = User::find($request->input('uid'))->email;
        $price =$request->input('price');
        $uid = $request->input('uid');

        $parameters = [
            'transaction_no' => rand(0000000,9999999),
            'amount' => $price,
            'name' => $name."-".$pkg."-".$uid,
            'email' => $email
          ];
          
          $order = Indipay::prepare($parameters);
          return Indipay::process($order);
    }

    public function response(Request $request)
    
    {
        // For default Gateway
        $response = Indipay::response($request);
        
        
        //dd($response['name'] ,explode('-',$response['name']) );
        // For Otherthan Default Gateway
        // $response = Indipay::gateway('NameOfGatewayUsedDuringRequest')->response($request);
        if ($response['transaction_status'] == "success"){
            $done = User::find(explode('-',$response['name'])[2])->update(['package_type' => explode('-',$response['name'])[1]]);
            if ($done){
                return redirect('home');
            }else{
                dd("Fatel Error !!");
            }
        }elseif ($response['transaction_status'] == "failed"){
            dd('Failed');
        }else{
            dd('Pending');
        }
        
    }  
}




