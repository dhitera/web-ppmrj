<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class About extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'description',
        'vision',
        'mission',
        'galleryTitle',
        'galleryDescription',
    ];
}
