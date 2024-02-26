<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    private const ELEMENTS = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'dni',
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
        'password' => 'hashed',
    ];
    /**
     * 
     * @return bool | True if the user is an Admin and False otherwise
     */
    public static function isAdmin(): bool
    {
        return Auth::user()->is_admin == 1 ? true : false;
    }
    private static function getAllUsers()
    {
        return DB::table('users')
            ->select('id', 'name', 'dni', 'email', 'phone', 'is_admin', 'created_at', 'updated_at');
    }

    public static function getInfUser($id)
    {
        return DB::table('users')->select('id', 'name', 'email', 'phone', 'is_admin')->where('id', '=', $id)->get();
    }

    public static function getAllUserIndex($numElements = self::ELEMENTS)
    {
        return self::getAllUsers()->paginate($numElements);
    }
}
