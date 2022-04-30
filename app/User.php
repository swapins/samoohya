<?php

namespace App;
use App\Userdetails;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','user_type','package_type','last_seen',
    ];

    /**
     * The attributes that should be hidden for arrays.
     * 
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function details()
    {
        return $this->hasOne(Userdetails::class);
    }

    public function adminlte_image()
    {
       $photo = Userdetails::where('user_id',Auth::id())->first();
       if (isset($photo)){
           $out = $photo->photo;
       }else{
           $out = 'https://picsum.photos/200/200';
       }
        return $out;
    }

    public function adminlte_desc()
    {
        return 'That\'s a nice guy';
    }

    public function adminlte_profile_url()
    {
        return 'profile';
    }

    public function pinterest(){
        return $this->hasOne('App\pinterest', 'user_id', 'id');
    }
}
