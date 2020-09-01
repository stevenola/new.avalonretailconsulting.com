<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Symfony\Component\CssSelector\Node\FunctionNode;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'avatar', 'email', 'password', 'remember_token',
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
    // This is a mutator to encrypt passwords
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getAvatarAttribute($value)
    {
        return asset('storage/' . $value);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function permissions()
    {

        return $this->belongsToMany(Permission::class);
    }

    public function roles()
    {

        return $this->belongsToMany(Role::class);
    }

    // checks to see what role user has.
    public function userHasRole($rolename)
    {

        foreach ($this->roles as $role) {
            if ($rolename == $role->name)
                return true;
        }
    }
}
