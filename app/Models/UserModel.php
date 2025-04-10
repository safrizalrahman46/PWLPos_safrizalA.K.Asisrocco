<?php

namespace App\Models;

use Illuminate\Auth\Middleware\Authorize;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\m_barang;


class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'level_id',
        'username',
        'nama',
        'password'
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

    public function user()
{
    return $this->belongsTo(UserModel::class, 'user_id', 'user_id');
}


    // public function stok():BelongsTo
    // {
    //     return $this->belongsTo(LevelModel::class, 'level_id','level_id');
    // }

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
}
