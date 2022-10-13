@extends('main')
@section('content')
<div class="container">
<table class="table">
        <caption class="caption">
            <h3>Report about Countries Pits capacity</h3>
        </caption>
        <tr>
            <th>Country</th>
            <th>List of Pits</th>
            <th>List of Ships</th>
            <th>Total Capacity <i>kg/24h</i></th>
        </tr>

        @forelse ( $countries as $country)
        <tr>
            <td>{{$country->country_name}}</td>
            <td>
            @forelse($country->hasPits as $pit)
                <ul class="ul right">
                    <li>{{$pit->pit_name}}</li>
                </ul>
            @empty
                <ul class="ul">
                    <li>List is empty!</li>
                </ul>
            @endforelse
            </td>
            <td>
            @forelse($country->hasShips as $ship)
                <ul class="ul right">
                    <li>{{$ship->ship_name}}</li>
                </ul>
            @empty
                <ul class="ul">
                    <li>List is empty!</li>
                </ul>
            @endforelse
            </td>
            <td>
            @forelse($country->countCapacity as $pit)
                {{$pit->total}}
            @empty
                <ul class="ul">
                    <li>List is empty!</li>
                </ul>
            @endforelse
            </td>
            </tr>
        @empty
             <tr>
            <p>List is empty!</p>
            </tr>
        @endforelse
    </table>
</div>
@endsection
