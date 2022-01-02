<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    use HasFactory;
    protected $fillable =[
        'employee_id',
        'month',
        'payment_date',
        'basic_salary',
        'house_allowance',
        'medical_allowance',
        'conveyance_allowance',
        'other_allowance',
        'gross_salary',
        'total_advance',
        'Installment',
        'other_deduction',
        'deduction_detail',
        'totalsalary',
    ];
    protected $dates = ['month', 'payment_date'];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }
   
}
