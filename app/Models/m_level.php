<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use App\Models\UserModel;
use Illuminate\Database\Eloquent\Relations\HasMany;

class m_level extends Model
{

    use HasFactory;
    protected $table = 'm_level';
    protected $primaryKey = 'level_id';
    public function users(): HasMany
    {
        return $this->hasMany(UserModel::class);
    }

    protected $fillable = [
        'level_kode',
        'level_nama'
    ];
}
