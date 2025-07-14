<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Announcement extends Model
{
    protected $fillable = [
        'title',
        'publish_date',
        // Add any other fields you want to make fillable
    ];

    public function selectedStudents()
    {
        return $this->hasMany(SelectedStudent::class);
    }

    public function additionalInformation()
    {
        return $this->hasMany(AdditionalInformation::class);
    }
}
