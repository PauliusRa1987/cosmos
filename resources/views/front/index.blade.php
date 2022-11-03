@extends('main')
@section('content')
<div class="container">
    <table class="table">
        <caption class="caption">
            <h3>Report about Countries Pits capacity</h3>
        </caption>
        <tr>
            <th>Union</th>
            <th>Country</th>
            <th>List of Pits</th>
            <th>List of Ships</th>
            <th>Total Capacity <i>kg/24h</i></th>
        </tr>
        <tr>
            @forelse ($unions as $union)
            <td>{{$union->union_name}}</td>
            <td>
                @forelse($union->hasCountries as $country)
                <ul class="ul right">
                    <li>{{$country->country_name}}</li>
                </ul>
                @empty
                <ul class="ul">
                    <li>List is empty!</li>
                </ul>
                @endforelse
            </td>
            <td>
                @forelse($union->hasCountries as $country)
                @foreach ($country->hasPits as $pit)
                <ul class="ul right">
                    <li>{{$pit->pit_name}}</li>
                </ul>
                @endforeach
                @empty
                <ul class="ul">
                    <li>List is empty!</li>
                </ul>
                @endforelse
            </td>
            <td>
                @forelse($union->hasCountries as $country)
                @foreach ($country->hasShips as $ship)
                <ul class="ul right">
                    <li>{{$ship->ship_name}}</li>
                </ul>
                @endforeach
                @empty
                <ul class="ul">
                    <li>List is empty!</li>
                </ul>
                @endforelse
            </td>
            <td>{{$union->union_total_capacity}}</td>
            @empty
        <tr>
            <p>List is empty!</p>
        </tr>
        @endforelse
        </tr>
        @forelse ( $countries as $country)
        <tr>
        
            <td>{{$country->getUnionInfo->union_name?? 'Dont have union'}}</td>
        <td>{{$country->country_name}}
        </td>
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
            @if($country->total_capacity)
            <ul class="ul">
                <li>{{$country->total_capacity}}</li>
            </ul>
            @else
            <ul class="ul">
                <li>List is empty!</li>
            </ul>
            @endif
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
