<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = ['key', 'value', 'display_name', 'description'];

    /**
     * Get the setting value as a boolean
     *
     * @return bool
     */
    public function getBoolValue()
    {
        return filter_var($this->value, FILTER_VALIDATE_BOOLEAN);
    }
}
