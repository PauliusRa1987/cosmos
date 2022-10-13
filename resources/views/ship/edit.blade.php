@extends('main')
@section('content')
<div class="container">
    <form action="{{route('ship-update', $ship)}}" method="post" class="big-form" enctype="multipart/form-data">
        <div class="form-input-col">
            <div class="form-row-line centre">
                <h2 class="h2 text">Edit Ships and ADD/Remove som Pits</h2>
            </div>
        </div>
        <div class="form-input-col">
            <label class="form-label" for="shit_name">Ship Name</label>
            <input class="form-input" type="text" id="ship_name" name="ship_name" value="{{$ship->ship_name}}">
        </div>
        <div class="form-input-col">
            <label class="form-label" for="country_id">Country</label>
            <input class="form-input" name="country_id" value="{{$ship->getCountryInfo->country_name}}" readonly>
        </div>
        <div class="form-input-col">
            <label class="form-label pit" for="photo">Ship Image</label>
            <div class="form-row-line">
                <img class="form-img" src="{{$ship->photo}}" alt="ship photo">
                <input type="file" class="form-input" id="image" name="ship_image">
            </div>
        </div>
        <div class="form-input-col">
            <label class="form-label pit" for="pits">Pits</label>
            <div class="form-check-box">
            @forelse ( $pits as $key => $pit)
            <div class="form-check">
                <input type="checkbox" @if(in_array($pit->id, $ship->pits->pluck('id')->toArray())) checked @endif  class="form-check-input" value="{{$pit->id}}" name="pit[]" id="_{{$key}}">
                <label class="form-check-label" for="_{{$key}}">{{$pit->pit_name}}</label>
            </div>
            @empty
                <p>This Country don't have any pits</p>
            @endforelse
            </div>
        </div>
        <div class="form-input-col">
            <div class="form-row-line centre">
                <button type="submit" class="btn-form medium">ADD</button>
                @csrf
                @method('put')
            </div>
        </div>
    </form>
</div>
@endsection
