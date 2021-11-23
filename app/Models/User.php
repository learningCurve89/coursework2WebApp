<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        // Ensure expiry is cast to a Carbon date object.
        'expiry' => 'datetime',
        'administrator' => 'boolean',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     * A user can be given explicit access to use a door.
     * A user can have access to many explicit doors. A door can have many users.
     *
     */
    public function doors(){
        return $this->belongsToMany('App\Models\Door');
    }

    public function zones(){
        return $this->belongsToMany('App\Models\Zone');
    }


    /**
     * @param Door $door
     *
     * Your user model must also have a method. This method returns true, if and only if, the user has access to a door
     * (directly, or via a zone); or if they are an administrator.
     *
     * Finally users must have an expiry date. After the expiry date has passed, they no longer have access to any
     * doors, even if they are an administrator.
     *
     */
    public function hasAccessToDoor(Door $door){
        //check expired
        if($this->expiry < Carbon::now()){
            return false;
        }
        //check door access
        if($this->doors->contains($door)){
            return true;
        }
        //check admin
        if($this->administrator){
            return true;
        }
        //check door access via zones
        if($this->zones->contains($door->zone_id)){
            return true;
        }
        return false;
    }


}
