<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RidePackageRow extends Model
{
    use HasFactory;

    protected $fillable = [
        'ride_package_id',
        'label',
        'price',
        'suffix',
    ];

    public function ridePackage()
    {
        return $this->belongsTo(RidePackage::class);
    }
}
