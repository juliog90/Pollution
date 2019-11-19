<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use App\Models\Temperature;
use App\Models\Humidity;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Send to page data.
        $temperatures = Temperature::all();
        $humidities = Humidity::all();
        //$data->temperatures = $temp;
        //$data->humidities = $hum;
        $title = "Home | Dashboard";
        return view('page.dashboard._dashboard', compact('title', 'temperatures', 'humidities'));
    }

    public function update() 
    {
        $temperatures = Temperature::all();
        $humidities = Humidity::all();
        return response()->json([
            'state' => 'updated',
            'temperatures' => $temperatures,
            'humidities' => $humidities,
        ], 200);
    }
}
