<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{ 

    public function login()
    {
        $pc_dark_layout = 'default'; // or 'true'/'false' based on your logic
        $pc_box_container = 'false'; // or 'true'
        $pc_rtl_layout = 'false'; // or 'true'
        $pc_preset_theme = ''; // or any preset theme name
        $font_name = ''; // or any font name

        return view('auth.login', compact('pc_dark_layout', 'pc_box_container', 'pc_rtl_layout', 'pc_preset_theme', 'font_name'));
    }
}
