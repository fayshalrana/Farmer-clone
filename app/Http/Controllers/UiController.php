<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Routing\Controller as BaseController;

class UiController extends BaseController
{
    public function welcomePage() {
        return view('welcome');
    }

    // Page Specific
    public function homeController() {
        return view('ui.home');
    }
    public function aboutController() {
        return view('ui.about');
}
}