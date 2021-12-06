<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'information',
        'account_number',
        'account_holder',
        'branch_name',
        'mobile',
        'address',
    ];
}
