<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role', 'info'
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

    /**
     * Role names.
     *
     * @var array
     */
    private $roleNames = [
        0 => 'banned',
        1 => 'user',
        // 2 => 'prime',
        3 => 'moderator',
        // 4 => 'super',
        5 => 'admin',
    ];

    /**
     * Get articles by this user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    /**
     * Get comments by this user.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Get user's role.
     * 
     * return string
     */
    public function getRoleAttribute()
    {
        $role = $this->attributes['role'];
        return empty($this->roleNames[$role]) ? 'role_'.$role : $this->roleNames[$role];
    }

    /**
     * Set user's role.
     * 
     * @param  string  $value
     * @return void
     */
    public function setRoleAttribute($value)
    {
        $role = array_search($value, $this->roleNames);
        if($role !== FALSE) {
            $this->attributes['role'] = $role;
        }
        // TODO: Perhaps it would be better to throw an exception
    }

    /**
     * Determine whether the user is admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->attributes['role'] >= 5;
    }

    /**
     * Determine whether the user is moderator.
     *
     * @return bool
     */
    public function isModerator()
    {
        return $this->attributes['role'] >= 3;
    }

    /**
     * Determine whether the user is banned.
     *
     * @return bool
     */
    public function isBanned()
    {
        return $this->attributes['role'] < 1;
    }
}
