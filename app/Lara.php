<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lara extends Model
{
    protected $casts = [
        'expiration_date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
