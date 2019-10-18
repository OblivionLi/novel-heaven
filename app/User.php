<?php

namespace App;

use DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
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

    public function isAuthorized($object, $operation)
    {
        return DB::table('role_permissions')
            ->where('object', $object)
            ->where('operation', $operation)
            ->join('user_roles', 'user_roles.role_id', '=', 'role_permissions.role_id')
            ->where('user_roles.user_id', $this->id)
            ->exists();
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function novels()
    {
        return $this->hasMany(Novel::class);
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles');
    }

    public function likeables()
    {
        return $this->morphToMany(Likeable::class, 'likeable');
    }

    public function isAdmin()
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->name == 'administrator') {
                return true;
            }
        }

        return false;
    }

    
    public function isModerator()
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->name == 'moderator') {
                return true;
            }
        }

        return false;
    }

    public function isStaff()
    {
        foreach ($this->roles()->get() as $role) {
            if ($role->name == 'administrator' || $role->name == 'moderator' || $role->name == 'editor') {
                return true;
            }
        }

        return false;
    }
}
