<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;
    protected $fillable = [
            'name',
            'assettype_id',
            'price',
            'buy_date',
            'expiry_date',
            'warranty_date',
            'serial',
            'additional_information',
            'remarks',
            'author_id',
    ];
    protected $dates = ['date'];

    public function assettype()
    {
        return $this->hasOne(AssetType::class, 'id', 'assettype_id');
    }
    

}
