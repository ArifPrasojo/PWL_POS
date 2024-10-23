<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user';
    protected $primaryKey = 'user_id';

    protected $fillable = ['level_id', 'profile_image', 'username', 'nama', 'password'];

    protected $hidden = ['password'];
    
    protected $casts = [
        'password' => 'hashed'
    ];

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    }
    public function geRoleName(): string {
        return $this->level->level_nama;
    }
    public function hasRole($role): bool {
        return $this->level->level_kode == $role;
    }
    public function getRole() {
        return $this->level->level_kode;
    }
}