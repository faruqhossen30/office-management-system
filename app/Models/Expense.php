<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $fillable =[
        'author_id',
        'name'
    ];
    
    public function author()
    {
        return $this->hasOne(User::class, 'id', 'author_id');
    }
}
