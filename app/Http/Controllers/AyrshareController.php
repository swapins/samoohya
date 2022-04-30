<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ayrshare;
use App\Service;
use Illuminate\Support\Facades\Auth;

class AyrshareController extends Controller
{
    public function connect($id){
        $api = Service::find($id)->api_key;
        $bearer = 'Authorization: Bearer '.$api;
       //check if db contain entry
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://app.ayrshare.com/api/user',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                $bearer,
                'Content-Type: application/json'
            ),
            ));

            $response = curl_exec($curl);
            $info = curl_getinfo($curl);
           // dd($response,$info['http_code']);
            curl_close($curl);

            if ($info['http_code'] == 200)
            
                        {
                            $refID = json_decode($response)->refId;
            
                            ayrshare::create([
                                'user_id' => Auth::id() ,
                                'refId' => $refID,
                                'response' => $response
                            ]);

                            return redirect()->back();
                        }
            
            else    {
                
                        dd($response);

                    }
            
    }
}
