<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class testTi extends Model
{
    use HasFactory;
    protected $table = 'test_tis';
    protected $guarded = [];
    protected $fillable = [
        'ticketTitle',
        'ticketPriority',
        'ticketDescription',
        'user_email',
    ];
}
