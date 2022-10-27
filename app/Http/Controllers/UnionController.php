<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Union;
use Illuminate\Http\Request;

class UnionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unions = Union::all();
        $countries = Country::all();
        return view('union.index', [
            'unions' => $unions,
            'countries' => $countries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('union.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUnionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $union = new Union;
        $union->union_name = $request->union_name;
        $union->save();
        return redirect()->route('union-index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Union  $union
     * @return \Illuminate\Http\Response
     */
    public function show(Union $union)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Union  $union
     * @return \Illuminate\Http\Response
     */
    public function edit(Union $union)
    {
        return view('union.edit', ['union' => $union]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateUnionRequest  $request
     * @param  \App\Models\Union  $union
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Union $union)
    {
        $union->union_name = $request->union_name;
        $union->save();
        return redirect()->route('union-index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Union  $union
     * @return \Illuminate\Http\Response
     */
    public function destroy(Union $union)
    {
        $union->delete();
        return redirect()->back();
    }
}
