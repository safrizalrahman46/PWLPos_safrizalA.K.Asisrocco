<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserModel extends Authenticatable
{
    use HasFactory;


        public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'level_id',
        'username',
        'nama',
        'password',
        'created_at',
        'updated_at'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'password' => 'hashed'
    ];

    public function level():BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id','level_id');
    }

    public function getRoleName(): string
    {
        return $this->level->level_kode;
    }

    public function hasRole($role): bool
    {
        return $this->level->level_kode === $role;
    }

    public function getRole()
    {
        return $this->level->level_kode;
    }

    public function getProfilePictureUrl()
    {
        return $this->image
            ? asset($this->image)
            : asset('adminlte/dist/img/user2-160x160.jpg');
    }
}
