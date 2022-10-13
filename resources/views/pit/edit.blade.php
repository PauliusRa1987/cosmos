@extends('main')
@section('content')
<div class="container">
    <form action="{{route('pit-update', $pit)}}" method="post" class="big-form">
      <div class="form-input-col">
        <div class="form-row-line centre">
            <h2>Edit Pit info</h2>
        </div>
        </div>
        <div class="form-input-col">
            <label class="form-label" for="pit_name">Pit Name</label>
            <input class="form-input" type="text" id="pit_name" name="pit_name" value="{{$pit->pit_name}}">
        </div>
        <div class="form-input-col">
            <label class="form-label" for="country_id">Country</label>
            <select class="form-input select" id="country_id" name="country_id">
                @foreach ($countries as $country)
                <option value={{$country->id}} @if($country->id == $pit->getCountryInfo->id) selected @endif>{{$country->country_name}}</option>
                @endforeach
            </select>
            </div>
        <div class="form-input-col">
            <label class="form-label">DMS (degrees, minutes, seconds)</label>
            <div class="form-row-line">
                <label for="latitude" class="form-label">Latitude</label>
                <div class="form-row-line margin">
                    <div class="radio-block">
                        <div class="radio-row">
                            <input @if($pit->position_lat == 'North') checked @endif class="form-input radio" type="radio" name="position_lat" value="North">
                            <label class="form-label">N</label>
                        </div>
                        <div class="radio-row">
                            <input @if($pit->position_lat == 'South') checked @endif class="form-input radio" type="radio" name="position_lat" value="South">
                            <label class="form-label">S</label>
                        </div>
                    </div>
                    <div class="cord">
                        <input class="form-input deg" type="text" name="lat_deg" value="{{$lat_deg}}">
                        <label class="form-label">&#176;</label>
                    </div>
                    <div class="cord">
                        <input class="form-input deg" type="text" name="lat_min" value="{{$lat_min}}">
                        <label class="form-label">&#8242;</label>
                    </div>
                    <div class="cord">
                        <input class="form-input deg" type="text" name="lat_sec" value="{{$lat_sec}}">
                        <label class="form-label">&#8243;</label>
                    </div>

                </div>
            </div>
            <div class="form-row-line">
                <label for="longitude" class="form-label">Longitude</label>
                <div class="form-row-line margin">
                    <div class="radio-block">
                        <div class="radio-row">
                            <input @if($pit->position_lng == 'East') checked @endif class="form-input radio" type="radio" name="position_lng" value="East">
                            <label class="form-label">E</label>
                        </div>
                        <div class="radio-row">
                            <input @if($pit->position_lng == 'West') checked @endif class="form-input radio" type="radio" name="position_lng" value="West">
                            <label class="form-label">W</label>
                        </div>
                    </div>
                    <div class="cord">
                        <input class="form-input deg" type="text" name="lng_deg" value="{{$lng_deg}}">
                        <label class="form-label">&#176;</label>
                    </div>
                    <div class="cord">
                        <input class="form-input deg" type="text" name="lng_min" value="{{$lng_min}}">
                        <label class="form-label">&#8242;</label>
                    </div>
                    <div class="cord">
                        <input class="form-input deg" type="text" name="lng_sec" value="{{$lng_sec}}"> 
                        <label class="form-label">&#8243;</label>
                    </div>

                </div>
            </div>
        </div>
        <div class="form-input-col">
            <div class="form-row-line">
                <div class="form-row-line margin">
                    <label class="form-label pit" for="pit_capacity">Pit Capacity</label>
                    <input class="form-input deg" type="text" name="pit_capacity" value="{{$pit->capacity}}">
                    <label class="form-label kg">kg/24h</label>
                </div>
            </div>
        </div>
        <div class="form-input-col">
        <div class="form-row-line centre">
            <button type="submit" class="btn-form medium">Edit</button>
            @csrf
            @method('put')
        </div>
        </div>
    </form>
</div>
@endsection
