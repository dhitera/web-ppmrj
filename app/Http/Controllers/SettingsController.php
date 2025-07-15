<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Services\SettingsService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    protected $settingsService;

    public function __construct(SettingsService $settingsService)
    {
        $this->settingsService = $settingsService;
        // Permission will be handled in routes
    }

    /**
     * Display the settings page
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $settings = $this->settingsService->all();
        return view('admin.settings.index', compact('settings'));
    }

    /**
     * Toggle a setting
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function toggle(Request $request)
    {
        $key = $request->input('key');
        $value = filter_var($request->input('value'), FILTER_VALIDATE_BOOLEAN);

        $setting = $this->settingsService->set($key, $value ? 'true' : 'false');

        if (!$setting) {
            return response()->json([
                'success' => false,
                'message' => 'Setting not found'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'key' => $key,
            'value' => $value
        ]);
    }
}
