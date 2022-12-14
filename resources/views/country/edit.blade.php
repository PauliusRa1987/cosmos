@extends('main')
@section('content')
<div class="container">
    <form action="{{route('country-update', $country)}}" method="post" class="big-form">
        <div class="form-input-col">
            <div class="form-row-line centre">
                <h2>Edit Country Info</h2>
            </div>
        </div>
        <div class="form-input-col">
            <label class="form-label" for="country_name">Country</label>
            <input class="form-input" type="text" id="country_name" name="country_name" value="{{$country->country_name}}">
        </div>
        <div class="form-input-col">
            <label class="form-label" for="pit_count">Number of Allowed Pits:</label>
            <input class="form-input" type="text" id="pit_count" name="pit_count" value="{{$country->pit_count}}">
        </div>

        <div class="form-input-col">
            <label class="form-label" for="country_id">Union</label>
            <select class="form-input select" id="union_id" name="union_id">
                <option value=''>-- Leave the union --</option>
                @foreach ( $unions as $union )
                
                <option value="{{$union->id}}" @if($country->getUnionInfo && ($union->id == $country->getUnionInfo->id)) selected @endif>{{$union->union_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-input-col">
            <div class="form-row-line centre">
                <button type="submit" class="btn-form">Update</button>
                @method('put')
                @csrf
            </div>
        </div>
    </form>
</div>
@endsection
