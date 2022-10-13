@extends('main')
@section('content')
<div class="container">
    <table class="table">
        <caption class="caption">
            <h3>List of Countries</h3>
        </caption>
        <tr>
            <th>Country</th>
            <th>Allowed Amount of Pits</th>
            <th>Action</th>
        </tr>
        @forelse ( $countries as $country )
        <tr>
            <td>{{$country->country_name}}</td>
            <td>{{$country->pit_count}}</td>
            <td>
                <div class="form-row">
                    <a class="btn-action btn-edit" href="{{route('country-edit', $country)}}">Edit</a>
                    <form action="{{route('country-destroy', $country)}}" method="post">
                        <button type="submit" class="btn-action btn-delete" href="#">Delete</button>
                        @method('delete')
                        @csrf
                    </form>
                </div>
            </td>
        </tr>
        @empty
        <tr>
            <td>
                List is Empty!
            </td>
        </tr>
        @endforelse
    </table>
</div>
@endsection
