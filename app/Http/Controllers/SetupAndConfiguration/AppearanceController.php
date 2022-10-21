<?php

namespace App\Http\Controllers\SetupAndConfiguration;

use App\Http\Controllers\Controller;
use App\Models\BusinessSetting;
use Illuminate\Http\Request;

class AppearanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $themes = \App\Models\BusinessSetting::whereIn('type', [
            'base_primary_color',  'event_primary_color', 'box_shadow_primary_color',
            'base_secondary_color',  'event_secondary_color', 'box_shadow_secondary_color',
            'base_success_color',  'event_success_color', 'box_shadow_success_color',
            'base_info_color',  'event_info_color', 'box_shadow_info_color',
            'base_warning_color',  'event_warning_color', 'box_shadow_warning_color',
            'base_danger_color',  'event_danger_color', 'box_shadow_danger_color',
            'base_light_color',  'event_light_color', 'box_shadow_light_color',
            'base_dark_color',  'event_dark_color', 'box_shadow_dark_color',
        ])->get(['type', 'value']);

        return view('pages.setup_and_configuration.appearance.index', compact('themes'));
    }

    /**
     * updateTheme resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateTheme(Request $request)
    {
        if ($request->hasAny(['base', 'event', 'box_shadow'])) {
            $theme = $request->input('theme');

            BusinessSetting::upsert([
                ['type' => "base_{$theme}_color", 'value' => $request->input('base')],
                ['type' => "event_{$theme}_color", 'value' => $request->input('event')],
                ['type' => "box_shadow_{$theme}_color", 'value' => $request->input('box_shadow')]
            ], ['type']);

            return response()->json([
                'success' => true,
                'message' => 'Warna '. $theme . ' berhasil diperbarui'
            ], 200);
        }
    }
}
