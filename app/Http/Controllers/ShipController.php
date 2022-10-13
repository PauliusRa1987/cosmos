<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Pit;
use App\Models\Ship;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ShipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ships = Ship::all();
        return view('ship.index', ['ships' => $ships]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        return view('ship.create', ['countries' => $countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreShipRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'ship_name' => ['required', 'min:3', 'max:64', 'unique:ships,ship_name'],
                'country_id' => ['required', 'numeric', 'min:1'],
            ],
            [
                'country_id.min' => 'Please select a country!',
            ]
        );

        if ($validator->fails()) {
            $request->flash();
            return redirect()->back()->withErrors($validator);
        }
        $ship = new Ship;
        if ($request->file('ship_image')) {
            $photo = $request->file('ship_image');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $img = Image::make($photo)->resize(50, 50);
            $img->save(public_path().'/img/'.$file);
            $ship->photo = asset('/img') . '/' . $file;
        }

        $ship->ship_name = $request->ship_name;
        $ship->country_id = $request->country_id;
        $ship->save();
        return redirect()->route('ship-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ship  $ship
     * @return \Illuminate\Http\Response
     */
    public function show(Ship $ship)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ship  $ship
     * @return \Illuminate\Http\Response
     */
    public function edit(Ship $ship)
    {
        
        $pitsAll = Pit::all();
        $pits = $pitsAll->where('country_id', $ship->country_id);
        
        return view('ship.edit', ['ship' => $ship, 'pits' => $pits]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateShipRequest  $request
     * @param  \App\Models\Ship  $ship
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ship $ship)
    {
        if ($request->file('ship_image')) {
            if ($ship->photo) {
                $name = pathinfo($ship->photo, PATHINFO_FILENAME);
                $ext = pathinfo($ship->photo, PATHINFO_EXTENSION);
                $path = public_path('/img') . '/' . $name . '.' . $ext;
                if ($path) {
                    unlink($path);
                }
            }
            $photo = $request->file('ship_image');
            $ext = $photo->getClientOriginalExtension();
            $name = pathinfo($photo->getClientOriginalName(), PATHINFO_FILENAME);
            $file = $name . '-' . rand(100000, 999999) . '.' . $ext;
            $img = Image::make($photo)->resize(50, 50);
            $img->save(public_path().'/img/'.$file);
            $ship->photo = asset('/img') . '/' . $file;
        }
        $ship->pits()->detach();
        $ship->pits()->attach($request->pit);
        $ship->ship_name = $request->ship_name;
        $ship->save();
        return redirect()->route('ship-index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ship  $ship
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ship $ship)
    {
        if ($ship->photo) {
            $name = pathinfo($ship->photo, PATHINFO_FILENAME);
            $ext = pathinfo($ship->photo, PATHINFO_EXTENSION);
            $path = public_path('/img') . '/' . $name . '.' . $ext;
            if ($path) {
                unlink($path);
            }
        }
        $ship->delete();
        return redirect()->back();
    }
}
