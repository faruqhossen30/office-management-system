<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'address',
        'manager_name',
        'mobile',
        'telephone',
        'email',
        'author_id',
    ];
    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}

