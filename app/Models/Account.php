<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = [
        'user_id',
        'service_name',
        'username',
        'password',
        'phone',
        'url',
        'type',
        'note',
    ];
    protected $casts = [
        'password' => 'encrypted', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
