<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdvanceSalary extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'amount',
        'payment_date',
        'deduct_month',
        'cause',
        'remarks',
    ];
    protected $dates = ['payment_date', 'deduct_month'];

    public function employeename()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }
}
