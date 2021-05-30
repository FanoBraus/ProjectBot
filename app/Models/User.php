<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        //'password',
    ];

    public $timestamps = false;


    // связь
    public function phone() {
        return $this->hasOne(related: Phone::class, foreignKey: 'user_id', localKey: 'id');
    }

    public function team() {
        return $this->belongsToMany(related: Team::class, table: 'users_teams', foreignPivotKey: 'user_id', relatedPivotKey: 'team_id');
    }



    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
