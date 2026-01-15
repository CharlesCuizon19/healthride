<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RidePackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
    ];

    public function rows()
    {
        return $this->hasMany(RidePackageRow::class);
    }
}
