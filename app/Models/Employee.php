<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'email',
        'phone',
        'phone_alt',
        'address',
        'country',
        'city',
        'zip_code',
        'gender',
        'nid_no',
        'date_of_birth',
        'covid_vaccine',
        'join_date',
        'photo',
        'department_id',
        'marital_status',
        'description',
        'position_id',
        'office_id',
        'basic_salary',
        'house_allowance',
        'medical_allowance',
        'conveyance_allowance',
        'other_allowance',
        'gross_salary'
    ];
    protected $dates = ['date'];


    public function position()
    {
        return $this->hasOne(Position::class,'id','position_id');
    }

    public function office()
    {
        return $this->hasOne(Office::class, 'id', 'office_id');
    }
    public function department()
    {
        return $this->hasOne(Department::class, 'id', 'department_id');
    }

}
