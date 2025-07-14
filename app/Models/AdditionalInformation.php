<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdditionalInformation extends Model
{
    protected $fillable = [
        'announcement_id',
        'info',
    ];

    /**
     * Get the announcement that owns this additional information.
     */
    public function announcement()
    {
        return $this->belongsTo(Announcement::class);
    }
}
