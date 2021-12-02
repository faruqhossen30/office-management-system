<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Office;

class ExpenseList extends Model
{
    use HasFactory;
    protected $fillable =[
        'date',
        'expense_type',
        'description',
        'voucher_no',
        'amount',
        'payment_type',
        'remarks',
        'office_id',
    ];

    public function office()
    {
        return $this->hasOne(Office::class, 'id', 'office_id');
    }

}
