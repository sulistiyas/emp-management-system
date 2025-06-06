<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable,HasRoles;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'id_division',
        'name',
        'email',
        'password',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    public function division()
    {
        return $this->belongsTo(Division::class, 'id_division', 'id_division');
    }
    
    public function leaveMaster()
    {
        return $this->hasOne(LeaveMaster::class, 'id_users', 'id');
    }

    public function leaveList()
    {
        return $this->hasMany(LeaveList::class, 'id_users', 'id');
    }

    public function leaveApprovalBy()
    {
        return $this->hasMany(LeaveList::class, 'leave_approval_by', 'id');
    }
}
