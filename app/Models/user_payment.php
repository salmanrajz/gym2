<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'userid','amount','payment_date','month'
    ];
}
