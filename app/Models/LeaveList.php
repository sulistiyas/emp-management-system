<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveList extends Model
{
    protected $table = 'leave_lists';
    protected $primaryKey = 'id_leave_list';
    protected $fillable = [
        'id_users',
        'total_leave_taken',
        'leave_start_date',
        'leave_end_date',
        'leave_reason',
        'leave_status',
        'leave_approval_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_users');
    }

    public function leaveMaster()
    {
        return $this->belongsTo(LeaveMaster::class, 'id_users', 'id_users');
    }
    public function leaveApproval()
    {
        return $this->belongsTo(User::class, 'leave_approval_by');
    }
}
