<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Permissions\HasPermissionsTrait;

class User extends Authenticatable
{
    use Notifiable, HasPermissionsTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tendoanvien', 'username', 'password', 'ngaysinh', 'gioitinh',
        'quequan', 'ngayvaodoan', 'noivaodoan', 'chucvu', 'dangvien',
        'hinhanh'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin() {
        return $this->hasRole('admin');
    }
    public function isManager() {
        return $this->hasRole('manager');
    }
    public function isStudent() {
        return $this->hasRole('student');
    }
}
