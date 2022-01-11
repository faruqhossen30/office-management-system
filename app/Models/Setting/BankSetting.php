<?php

namespace App\Models\Setting;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'paymentsystem_id'
    ];
}
