@extends('main')
@section('content')
<div class="container">
    <form action="{{route('union-store')}}" method="post" class="big-form">
      <div class="form-input-col">
        <div class="form-row-line centre">
            <h2>Create new Union</h2>
        </div>
        </div>
        <div class="form-input-col">
            <label class="form-label" for="union_name">Union Name</label>
            <input class="form-input" type="text" id="union_name" name="union_name" placeholder="Enter Name">
        </div>
        {{-- <div class="form-input-col">
            <label class="form-label" for="country_id">Pick countries to union:</label>
            <div class="form-check-box">
            @forelse ( $countries as $key => $country)
            <div class="form-check">
                <input type="checkbox" class="form-check-input" value="{{$country->id}}" name="country[]" id="_{{$key}}">
                <label class="form-check-label" for="_{{$key}}">{{$country->country_name}}</label>
            </div>
            @empty
                <p>Country list is empty</p>
            @endforelse
            </div>
        </div> --}}
        <div class="form-input-col">
        <div class="form-row-line centre">
            <button type="submit" class="btn-form medium">Create</button>
            @csrf
        </div>
        </div>
    </form>
</div>
@endsection