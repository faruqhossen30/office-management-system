<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lone extends Model
{
    use HasFactory;
    protected $fillable =[
        'employee_id',
        'permitted_by',
        'loan_details',
        'approve_date',
        'apply_date',
        'repayment_from',
        'installment_period',
        'amount',
        'Installment',
    ];
    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }
}
