<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class UserModel extends Authenticatable implements JWTSubject
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
        'image' //tambahkan
    ];


    //KODE FAKKK
    // public function image(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn($image) => asset('storage/posts/' . $image),
    //     );
    // }

    
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
    if ($this->image) {
        // Check if image exists in public/uploads/profile
        if (file_exists(public_path($this->image))) {
            return asset($this->image);
        }

        // Check if image exists in storage (if you want to support both)
        if (file_exists(storage_path('app/public/' . $this->image))) {
            return asset('storage/' . $this->image);
        }
    }

    // Default image
    return asset('adminlte/dist/img/user2-160x160.jpg');
}

}
