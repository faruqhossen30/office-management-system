<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalarySetUp extends Model
{
    use HasFactory;
    protected $fillable =[
        'employee_id',
        'position_id',
        'department_id',
        'office_id',
        'basic',
        'grow_salary',
        'Payment_date',
    ];

    public function employee()
    {
        return $this->hasOne(Employee::class, 'id', 'employee_id');
    }
    public function position()
    {
        return $this->hasOne(Position::class, 'id', 'position_id');
    }
    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }
    public function offices()
    {
        return $this->hasOne(Office::class, 'id', 'office_id');
    }
    
}
