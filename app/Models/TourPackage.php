<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourPackage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function tour_package_images()
    {
        return $this->hasMany(TourPackageImage::class);
    }
}
