<?php

namespace App\Http\Controllers;

use App\Models\History;
use App\Models\Property;
use App\Models\Sales;
use Illuminate\Http\Request;

class PropertyController extends Controller{
    public function landingPage(Request $request, Sales $sales, Property $property){
        
        History::create([
            'ip_address' => $request->ip(),
            'property_id' => $property->id,
            'user_id' => $sales->id,
            'type' => 'click'
        ]);
        $view_file = "landing." . $property->slug;
        $form_link = "https://dashboard.salesajaib.com/form/".$sales->id."/".$property->id;
        // dd($view_file);
        return response()
            ->view($view_file, ['sales' => $sales, 'property' => $property, 'form_link' => $form_link])
            ->cookie('sales_id', $sales->id, 5);
        // return view('landing.dmashome');
    }
}
