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
        'city',
        'zip_code',
        'gender',
        'nid_no',
        'date_of_birth',
        'covid_vaccine',
        'join_date',
        'photo',
        'department',
        'description',
        'position_id',
        'office_id',
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

}
