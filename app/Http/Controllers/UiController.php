<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Routing\Controller as BaseController;

class UiController extends BaseController
{    // Page Specific
    public function homeController() {
        return view('home');
    }
    public function aboutController() {
        return view('ui.about');
}
}