<?php

namespace App\Http\Controllers;
use App\Models\Country;
use App\Models\Union;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $countries = Country::all()->where('union_id', NULL)->sortByDesc('total_capacity');
        $unions = Union::all()->sortByDesc('union_total_capacity');
        return view('front.index',
        [
            'countries' => $countries,
            'unions' => $unions
        ]);
    }
}
