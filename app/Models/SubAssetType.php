<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAssetType extends Model
{
    use HasFactory;
    protected $fillable =[
        'asset_type_id',
        'name',
    ];
    public function assettype()
    {
        return $this->hasOne(AssetType::class, 'id', 'asset_type_id');
    }
}

