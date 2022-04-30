<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logic\Providers\FacebookRepository;
use App\Facebook;
use App\FacebookID;
use Illuminate\Support\Facades\Auth;
use App\Post;

class FacebookController extends Controller
{
    protected $facebook;

    public function __construct()
    {
        $this->facebook = new FacebookRepository();
    }

   
    public function fb_connect (Request $request){
        $d = FacebookID::where('user_id',Auth::id())->first()->fb_token;
        $page = $this->facebook->getPages($d);
        dd($page[0]);
        return $page;
    }



    public function fb_post(Request $request){
        $d = FacebookID::where('user_id',Auth::id())->first()->fb_token;

        //check if short url is checked
        if ($request->input('shorturl') == "on"){$shortUrl = true;} else {$shortUrl = false;}

        //check if file is uploded
        if ($request->hasFile('file')){$hasFile = true;} else{$hasFile = false;}

        if ($hasFile){

            $file = time().'.'.$request->file->getClientOriginalExtension();
            $path = './post_img/'.$file;
            $request->file->move('./post_img/', $file);
            $media_t="image";
            
        }
        else {
            $path = "";
            $media_t = "text";
        }

        //cerate url

       // $media ="https://picsum.photos/200/300";



        //remove html tags
        $post = strip_tags($request->input('teConfig'));

        $img = array('$path');

        $a = $this->facebook->post($accountId = "103425908793194", $d, $post, $img);

        Post::create([
            "post" => $post,
            "user_id" => Auth::id(),
            'response' => "blah",
            'schedule' => false,
            'file' => $path,
            'shorten' => false,
            'media_url' => $img,
            'media_type' => $media_t
        ]);

        if ($a)
            {

                $request->session()->flash('message', 'Posted Sucessfully');
                $request->session()->flash('type', 'success');
                $request->session()->flash('icon', 'check');
                return redirect()->back();
            }
        else{
                try{
                        $msg = json_decode($response)->errors[0]->message;
                    }
                catch (\Exception $e)
                    {
                        $msg = "Unknown API Error!";
                    }
            
                $request->session()->flash('message', $msg);
                $request->session()->flash('type', 'danger');
                $request->session()->flash('icon', 'ban');
                return redirect()->back();
            }
    }
    
    
}
