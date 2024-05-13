<?php

use App\Models\MediaLinks;

if (!function_exists('mediaVideo')) {
    function mediaVideo()
    {
        return MediaLinks::where('media_type', 'indexVideo')->first();
    }
}

if (!function_exists('mediaMap')) {
    function mediaMap()
    {
        return MediaLinks::where('media_type', 'map')->first();
    }
}

if (!function_exists('mediaMapLeg')) {
    function mediaMapLeg()
    {
        return MediaLinks::where('media_type', 'mapLeg')->first();
    }
}
