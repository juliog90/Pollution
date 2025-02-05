<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use App\Models\Temperature;
use App\Models\Humidity;
use App\Models\ElementConfiguration;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Send data to page.
        $temperatures = Temperature::all();
        $humidities = Humidity::all();
        $elements_configuration = ElementConfiguration::all();
        $title = "ACA | Dashboard";
        return view('page.dashboard._dashboard', compact('title', 'temperatures', 'humidities', 'elements_configuration'));
    }

    public function update() 
    {
        $temperatures = Temperature::latest()->first();
        $humidities = Humidity::latest()->first();
        return response()->json([
            'state' => 'updated',
            'temperatures' => $temperatures,
            'humidities' => $humidities,
        ], 200);
    }
}
