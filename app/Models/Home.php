<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class Home extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $fillable = [
        'header',
        'subheader',
        'description',
        'guruCount',
        'studentCount',
        'alumniCount',
    ];
}
