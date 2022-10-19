<?php

namespace App\Http\Controllers;

use App\Models\Pit;
use Illuminate\Http\Request;
use App\Models\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pits = Pit::all();
        return view('pit.index', ['pits' => $pits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $countries = Country::all();
        return view('pit.create', ['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePitRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pitCount = Pit::all()->where('country_id', $request->country_id);
        $country_pit_count = DB::table('countries')->where('id', $request->country_id)->value('pit_count');
        $validator = Validator::make(
            $request->all(),
            [
                'pit_name' => ['required', 'min:3', 'max:64', 'unique:pits,pit_name'],
                'country_id' => ['required', 'numeric', 'min:1'],
                'position_lat' => ['required'],
                'position_lng' => ['required'],
                'lat_deg' => ['required', 'numeric', 'min:0', 'max:90'],
                'lng_deg' => ['required', 'numeric', 'min:0', 'max:90'],
                'lat_min' => ['required', 'numeric', 'min:0', 'max:59'],
                'lat_sec' => ['required', 'numeric', 'min:0', 'max:59'],
                'lng_min' => ['required', 'numeric', 'min:0', 'max:59'],
                'lng_sec' => ['required', 'numeric', 'min:0', 'max:59'],
                'pit_capacity' => ['required', 'numeric', 'min:0', 'max:9'],
            ],
            [
                'country_id.min' => 'Please select a country!',
                'position_lat' => 'Please select direction of latitude',
                'position_lng' => 'Please select direction of longitude',
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        if($pitCount->count() >= $country_pit_count){
            $request->flash();
            return redirect()->back()->withErrors('This country has reached the maximum amount of pits');
        };

        $pit = new Pit;
        $pit->lat = $request->lat_deg + (($request->lat_min)/60) + (($request->lat_sec)/3600);
        $pit->position_lat = $request->position_lat;
        $pit->lng = $request->lng_deg + (($request->lng_min)/60) + (($request->lng_sec)/3600);
        $pit->position_lng = $request->position_lng;
        $pit->pit_name = $request->pit_name;
        $pit->country_id = $request->country_id;
        $pit->capacity = $request->pit_capacity;
        $country = Country::where('id', '=', $request->country_id)->first();
        $country->total_capacity += $request->pit_capacity;
        $country->save();
        $pit->save();
        
        return redirect()->route('pit-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pit  $pit
     * @return \Illuminate\Http\Response
     */
    public function show(Pit $pit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pit  $pit
     * @return \Illuminate\Http\Response
     */
    public function edit(Pit $pit)
    {
        $lat_deg = floor(abs($pit->lat));
        $lat_min = floor(($pit->lat - $lat_deg)*60);
        $lat_sec = round((($pit->lat - $lat_deg)*60 - $lat_min)*60);

        $lng_deg = floor(abs($pit->lng));
        $lng_min = floor(($pit->lng - $lng_deg)*60);
        $lng_sec = round((($pit->lng - $lng_deg)*60 - $lng_min)*60);
        $countries = Country::all();

        return view('pit.edit', 
        ['pit' => $pit, 
        'countries' => $countries,
        'lat_deg' => $lat_deg,
        'lat_min' => $lat_min,
        'lat_sec' => $lat_sec,
        'lng_deg' => $lng_deg,
        'lng_min' => $lng_min,
        'lng_sec' => $lng_sec,
    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePitRequest  $request
     * @param  \App\Models\Pit  $pit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pit $pit)
    {
        $country = Country::where('id', '=', $request->country_id)->first();
        $country->total_capacity -= $pit->capacity;
        $pit->lat = $request->lat_deg + (($request->lat_min)/60) + (($request->lat_sec)/3600);
        $pit->position_lat = $request->position_lat;
        $pit->lng = $request->lng_deg + (($request->lng_min)/60) + (($request->lng_sec)/3600);
        $pit->position_lng = $request->position_lng;
        $pit->pit_name = $request->pit_name;
        $pit->country_id = $request->country_id;
        $pit->capacity = $request->pit_capacity;
        $country->total_capacity += $request->pit_capacity;
        $country->save();
        $pit->save();
        return redirect()->route('pit-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pit  $pit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pit $pit)
    {
        $country = Country::where('id', '=', $pit->country_id)->first();
        $country->total_capacity -= $pit->capacity;
        $country->save();
        $pit->delete();
        return redirect()->back();
    }
}
