<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSystem extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'description',
        'author_id',
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
