<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubExpenseType extends Model
{
    use HasFactory;
    protected $fillable =[
        'sub_expense_type_id',
        'name',
    ];
    public function expensetype()
    {
        return $this->hasOne(Expense::class, 'id', 'sub_expense_type_id');
    }
}
