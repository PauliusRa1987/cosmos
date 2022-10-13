@extends('main')
@section('content')
<div class="container">
    <form action="{{route('ship-store')}}" method="post" class="big-form" enctype="multipart/form-data">
      <div class="form-input-col">
        <div class="form-row-line centre">
            <h2>Create new Ship</h2>
        </div>
        </div>
        <div class="form-input-col">
            <label class="form-label" for="shit_name">Ship Name</label>
            <input class="form-input" type="text" id="ship_name" name="ship_name" placeholder="Enter Name">
        </div>
        <div class="form-input-col">
            <label class="form-label" for="country_id">Country</label>
            <select class="form-input select" id="country_id" name="country_id">
                <option value="0">--- Choose one ---</option>
                @foreach ($countries as $country)
                <option value={{$country->id}}>{{$country->country_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-input-col">
                    <label class="form-label pit" for="photo">Ship Image</label>
                    <input type="file" class="form-input" id="image" name="ship_image" />
        </div>
        <div class="form-input-col">
        <div class="form-row-line centre">
            <button type="submit" class="btn-form medium">ADD</button>
            @csrf
        </div>
        </div>
    </form>
</div>
@endsection