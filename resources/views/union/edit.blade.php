@extends('main')
@section('content')
<div class="container">
    <form action="{{route('union-update', $union)}}" method="post" class="big-form" >
      <div class="form-input-col">
        <div class="form-row-line centre">
            <h2>Edit Union</h2>
        </div>
        </div>
        <div class="form-input-col">
            <label class="form-label" for="union_name">Union Name</label>
            <input class="form-input" type="text" id="union_name" name="union_name" value="{{$union->union_name}}">
        </div>
        <div class="form-input-col">
        <div class="form-row-line centre">
            <button type="submit" class="btn-form medium">Change</button>
            @csrf
            @method('put')
        </div>
        </div>
    </form>
</div>
@endsection