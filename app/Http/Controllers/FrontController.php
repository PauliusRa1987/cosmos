<?php

namespace App\Http\Controllers;
use App\Models\Country;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $countries = Country::all()->sortByDesc('total_capacity');
        return view('front.index',
        [
            'countries' => $countries,

        ]);
    }
}
