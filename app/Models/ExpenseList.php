<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Office;

class ExpenseList extends Model
{
    use HasFactory;
    protected $fillable = [
        'amount',
        'expense_id',
        'voucher_no',
        'payment_system_id',
        'office_id',
        'author_id',
        'bank_id',
        'phone',
        'transaction',
        'date',
        'description',
        'remarks'
    ];
    protected $dates = ['date'];

    public function office()
    {
        return $this->hasOne(Office::class, 'id', 'office_id');
    }
    public function expencetype()
    {
        return $this->hasOne(Expense::class, 'id', 'expense_id');
    }
    public function paymentsystem()
    {
        return $this->hasOne(PaymentSystem::class, 'id', 'payment_system_id');
    }
    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
    public function bank()
    {
        return $this->hasOne(User::class, 'id', 'bank_id');
    }


}
