@extends('main')
@section('content')
<div class="container">
    <form action="{{route('country-save', $country)}}" method="post" class="big-form">
        <div class="form-input-col">
            <div class="form-row-line centre">
                <h2>Join the Union</h2>
            </div>
        </div>
        <div class="form-input-col">
            <label class="form-label" for="country_name">Country</label>
            <input class="form-input" type="text" id="country_name" name="country_name" value="{{$country->country_name}}" readonly>
        </div>
        <div class="form-input-col">
            <label class="form-label" for="country_id">Union</label>
            <select class="form-input select" id="union_id" name="union_id" required>
                <option value=''>-- Join the union --</option>
                @foreach ( $unions as $union )
                <option value="{{$union->id}}">{{$union->union_name}}</option>
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
