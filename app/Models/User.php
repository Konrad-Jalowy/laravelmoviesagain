<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

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

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    public function is_admin() {
        return $this->belongsToMany(Role::class)->wherePivot('name', 'Admin');
    }

    public function is_moderator() {
        return $this->belongsToMany(Role::class)->wherePivot('name', 'Moderator');
    }

    

    public function has_role($role_id) {
        return $this->roles()->where('role_id', $role_id)->exists();
    }

    public function has_role_by_name($rolename) {
        $role = Role::where('name', '=', $rolename)->first();
        return $this->has_role($role->id);
    }
}
