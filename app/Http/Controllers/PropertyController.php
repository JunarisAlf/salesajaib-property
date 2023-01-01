<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PropertyController extends Controller{
    public function landingPage(){
        return view('landing.dmashome');
    }
}
