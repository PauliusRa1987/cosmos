@extends('main')
@section('content')
<div class="container">
    <form action="{{route('country-update', $country)}}" method="post" class="decor">
      <div class="form-inner">
        <h1>Edit Country Info</h1>
        <input type="text" name="country_name" value="{{$country->country_name}}">
        <div class="form-row">
        <label for="Username" class="label">Number of Allowed Pits:</label>
        <input type="text" name="pit_count" value="{{$country->pit_count}}">
        </div>
        <button type="submit" class="btn-form">Update</button>
        @method('put')
        @csrf
      </div>
    </form>
</div>
@endsection