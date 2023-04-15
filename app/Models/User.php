<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Permission;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    
     public function permissions()
    {
        return $this->hasMany(Permission::class,'role_id','role_id');
    }
    
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    
    public static function get_permissions()
    {
       $role_permissions = Permission::where('role_id',Auth::user()->role_id)->first();
       if(!empty($role_permissions)){
           return json_decode($role_permissions->permissions,true);
       }
       return [];
        
    }
    
}
