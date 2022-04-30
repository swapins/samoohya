<?php

namespace App\Http\Controllers;

use App\Package;
use App\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\User;
use App\sessions;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()

    {
        //loged in users
        
        // Get time session life time from config.
        $time =  time() - (config('session.lifetime')*60); 

        // Total login users (user can be log on 2 devices will show once.)
       // $totalActiveUsers = sessions::where('last_activity','>=', $time)->
        //count(DB::raw('DISTINCT user_id'));

        // Total active sessions
        $totalActiveUsers = 1;

        $users = User::all();
        $user_count = User::count();
        //data for chart
        $today = Carbon::today();
        $date_array = array();
        $date_count = array();
        $reg_count = array();
        $fulldate_array = array();
        $text_count = array();
        $image_count=array();
        $video_count=array();

        $i = 0;
        while ($i < 7) {
            array_push( $date_array, Carbon::today()->subDays($i)->format('M-d') );
            array_push( $fulldate_array, Carbon::today()->subDays($i));
            $i++;
        }

        if(! empty( $fulldate_array ) ){
            foreach($fulldate_array as $date){
               // $reg_count = User::where( 'created_at', '>', $date )->get()->count();
               if (User::where( 'created_at', '>', $date )->get()->count() != null){
                        $ct = User::whereDate('created_at', $date )->get()->count();
                    }
               else{
                        $ct = 0;
                    }
                array_push($reg_count,$ct);
            }
        }


        if(! empty( $fulldate_array ) ){
            foreach($fulldate_array as $date){
               // $reg_count = User::where( 'created_at', '>', $date )->get()->count();
               if (Post::where('user_id',Auth::id())->where('media_type','text')->where( 'created_at', '>', $date )->get()->count() != null){
                        $cct = Post::where('user_id',Auth::id())->where('media_type','text')->whereDate('created_at', $date )->get()->count();
                    }
               else{
                        $cct = 0;
                    }
                array_push($text_count,$cct);
            }
        }

        if(! empty( $fulldate_array ) ){
            foreach($fulldate_array as $date){
               // $reg_count = User::where( 'created_at', '>', $date )->get()->count();
               if (Post::where('user_id',Auth::id())->where('media_type','image')->where( 'created_at', '>', $date )->get()->count() != null){
                        $ccct = Post::where('user_id',Auth::id())->where('media_type','image')->whereDate('created_at', $date )->get()->count();
                    }
               else{
                        $ccct = 0;
                    }
                array_push($image_count,$ccct);
            }
        }

        if(! empty( $fulldate_array ) ){
            foreach($fulldate_array as $date){
               // $reg_count = User::where( 'created_at', '>', $date )->get()->count();
               if (Post::where('user_id',Auth::id())->where('media_type','video')->where( 'created_at', '>', $date )->get()->count() != null){
                        $cccct = Post::where('user_id',Auth::id())->where('media_type','video')->whereDate('created_at', $date )->get()->count();
                    }
               else{
                        $cccct = 0;
                    }
                array_push($image_count,$ccct);
            }
        }
        
       // dd($reg_count);
       // $text_count=array(12,15,19,25,28,30,27);
        //$image_count=array(7,15,5,10,14,10,25);
        //$video_count=array(20,15,15,20,20,17,10);

        $packages = Package::all();
        $services = Service::all();

        $posts = Post::where('user_id',Auth::id())->get();
       
       // dd($reg_count,$text_count);
        return view('home',compact('users','reg_count','totalActiveUsers','user_count','date_array','text_count','image_count','video_count','packages','services','posts'));
    }

    public function getNotification(Request $request)
    {
        // For the sake of simplicity, assume we have a variable called
        // $notifications with the unread notifications. Each notification
        // have the next properties:
        // icon: An icon for the notification.
        // text: A text for the notification.
        // time: The time since notification was created on the server.
        // At next, we define a hardcoded variable with the explained format,
        // but you can assume this data comes from a database query.

       $posts = Post::where('user_id',Auth::id())->get();
    
        $notifications = [
            [
                'icon' => 'fas fa-fw fa-envelope',
                'text' => $posts->where('media_type','text')->where('created_at', '>=', Carbon::today())->count() . ' New Text Posts',
                'time' => $posts->first()->updated_at->diffForHumans(),
            ],
            [
                'icon' => 'fas fa-fw fa-image text-primary',
                'text' => $posts->where('media_type','image')->where('created_at', '>=', Carbon::today())->count() . ' New Image Posts',
                'time' => $posts->first()->updated_at->diffForHumans(),
            ],
            [
                'icon' => 'fas fa-fw fa-video text-danger',
                'text' => $posts->where('media_type','video')->where('created_at', '>=', Carbon::today())->count() . ' New Video Posts',
                'time' => $posts->first()->updated_at->diffForHumans(),
            ],
           
        ];
    
        // Now, we create the notification dropdown main content.
    
        $dropdownHtml = '';
    
        foreach ($notifications as $key => $not) {
            $icon = "<i class='mr-2 {$not['icon']}'></i>";
    
            $time = "<span class='float-right text-muted text-sm'>
                       {$not['time']}
                     </span>";
    
            $dropdownHtml .= "<a href='#' class='dropdown-item'>
                                {$icon}{$not['text']}{$time}
                              </a>";
    
            if ($key < count($notifications) - 1) {
                $dropdownHtml .= "<div class='dropdown-divider'></div>";
            }
        }
    
        // Return the new notification data.
    
        return [
            'label'       => count($notifications),
            'label_color' => 'danger',
            'icon_color'  => 'dark',
            'dropdown'    => $dropdownHtml,
        ];

    }


    public function postDemo(Request $request){
        
        $done = User::find($request->input('id'))->update(['package_type' => 6]);
        if ($done){
            return redirect()->back();
        }else{
            dd("Fatel Error !!");
        }
    }
}
