<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectedStudent extends Model
{
    protected $fillable = [
        'announcement_id',
        'student_name',
        'student_city',
        'gelombang',
    ];

    /**
     * Get the announcement that owns this selected student.
     */
    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }
}
