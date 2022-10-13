@extends('main')
@section('content')
<div class="container">
    <form action="{{route('country-store')}}" method="post" class="decor">
      <div class="form-inner">
        <h1>Add New Country</h1>
        <input type="text" name="country_name" placeholder="Country" value="{{old('country_name')}}">
        <div class="form-row">
        <label for="Username" class="label">Number of Allowed Pits:</label>
        <input type="text" name="pit_count" value="{{old('pit_count')}}">
        </div>
        <button type="submit" class="btn-form" >ADD</button>
        @csrf
      </div>
    </form>
</div>
@endsection