<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    function weather($location){
        $locationDetails= Http::get("https://wttr.in/{$location}?format=j1")->json();
        $currentTemp=$locationDetails["current_condition"][0]["temp_C"];
        $currentCondition=$locationDetails["current_condition"][0]["weatherDesc"][0]["value"];
        $currentCity=$locationDetails["nearest_area"][0]["areaName"][0]["value"];
        $currentDate = $locationDetails["current_condition"][0]["localObsDateTime"];
        $currentspeed = $locationDetails["current_condition"][0]["windspeedKmph"];


        

        return view("weather",["city"=>$currentCity,"temp"=>$currentTemp,"condition"=>$currentCondition,"date"=>$currentDate,"speed"=>$currentspeed]);
    }
}
