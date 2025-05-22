<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveMaster extends Model
{
    protected $table = 'leave_masters';
    protected $primaryKey = 'id_leave_master';
    protected $fillable = [
        'id_users',
        'leave_allowance',
        'leave_taken',
        'leave_input_date',
        'leave_expiry_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }
    public function leaveList()
    {
        return $this->hasMany(LeaveList::class, 'id_users', 'id_users');
    }
}
