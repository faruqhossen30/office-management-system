<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    use HasFactory;
    protected $fillable =[
        'amount',
        'payment_system_id',
        'author_id',
        'office_id',
        'date',
        'bank_id',
        'phone',
        'transaction',
        'source',
        'remarks',
    ];

    protected $dates = ['date'];

    public function office()
    {
        return $this->hasOne(Office::class, 'id', 'office_id');
    }
    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
    public function paymentsystem()
    {
        return $this->hasOne(PaymentSystem::class, 'id', 'payment_system_id');
    }
}
