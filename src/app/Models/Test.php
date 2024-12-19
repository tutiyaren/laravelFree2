<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'test'
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
