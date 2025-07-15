<?php

namespace App\Services;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    /**
     * Get a setting by key with optional default
     *
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function get($key, $default = null)
    {
        // Try to get from cache first for performance
        return Cache::remember('setting_' . $key, now()->addHour(), function () use ($key, $default) {
            $setting = Setting::where('key', $key)->first();
            return $setting ? $setting->value : $default;
        });
    }

    /**
     * Get a setting as boolean
     *
     * @param string $key
     * @param bool $default
     * @return bool
     */
    public function getBool($key, $default = false)
    {
        return filter_var($this->get($key, $default), FILTER_VALIDATE_BOOLEAN);
    }

    /**
     * Update a setting
     *
     * @param string $key
     * @param mixed $value
     * @return Setting
     */
    public function set($key, $value)
    {
        $setting = Setting::where('key', $key)->first();

        if ($setting) {
            $setting->update(['value' => $value]);

            // Update cache
            Cache::put('setting_' . $key, $value, now()->addHour());
        }

        return $setting;
    }

    /**
     * Get all settings
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Setting::all();
    }
}
