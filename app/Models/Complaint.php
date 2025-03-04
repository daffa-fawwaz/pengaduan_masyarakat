<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{ use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'status',
        'image',
        'user_id',
        'guest_name',
        'guest_email',
        'guest_telp',
    ];

    protected $with = ['user', 'response'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function response() {
        return $this->hasMany(ComplaintResponse::class, 'complaint_id');
    }
}
