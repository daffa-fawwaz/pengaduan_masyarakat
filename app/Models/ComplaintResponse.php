<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComplaintResponse extends Model
{
    protected $fillable = [
        'complaint_id',
        'user_id',
        'response',
        'sent_to_email'
    ];

    public function complaint() {
        return $this->belongsTo(Complaint::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
