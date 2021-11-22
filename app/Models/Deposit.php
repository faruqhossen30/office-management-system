<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $fillable =[
        'amount',
        'amount_type',
        'author_id',
        'office_id',
        'date'
    ];
}
