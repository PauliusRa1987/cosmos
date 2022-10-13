<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return view('country.index', ['countries' =>  $countries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCountryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'country_name' => ['required', 'min:3', 'max:64', 'unique:countries,country_name'],
                'pit_count' => ['required', 'numeric', 'max:9'],
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $country = new Country;
        $country->country_name = $request->country_name;
        $country->pit_count = $request->pit_count;
        $country->save();
        return redirect()->route('country-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('country.edit', ['country' => $country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCountryRequest  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'country_name' => ['required', 'min:3', 'max:64'],
                'pit_count' => ['required', 'numeric', 'max:9'],
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $country->country_name = $request->country_name;
        $country->pit_count = $request->pit_count;
        $country->save();
        return redirect()->route('country-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Country $country)
    {
        if ($country->hasPits->count()) {
            $request->flash();
            return redirect()->back()->withErrors('Deleting is prohibited! This country still has a working pits.');
        }
        if ($country->hasShips->count()) {
            $request->flash();
            return redirect()->back()->withErrors('Deleting is prohibited! This country still has a spaceship.');
        }

        $country->delete();
        return redirect()->back();
    }
}
