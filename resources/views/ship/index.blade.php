@extends('main')
@section('content')
<div class="container">
    <table class="table">
        <caption class="caption">
            <h3>List of Ships</h3>
        </caption>
        <tr>
            <th>Ship Name</th>
            <th>Country</th>
            <th>List of Pits</th>
            <th>Photo</th>
            <th>Action</th>
        </tr>
        @forelse ( $ships as $ship )
        <tr>
            <td>{{$ship->ship_name}}</td>
            <td>{{$ship->getCountryInfo->country_name}}</td>
            <td>
                <ul class="ul">
                @forelse ( $ship->pits as $pit)
                    <li>{{$pit->pit_name}}</li>
                @empty
                    <li>List is empty</li>
                @endforelse
                </ul>
            </td>
            <td><img src="{{$ship->photo}}" alt="Ship photo"></td>
            <td>
                <div class="form-row">
                    <a class="btn-action btn-edit" href="{{route('ship-edit', $ship)}}">Edit</a>
                    <form action="{{route('ship-destroy', $ship)}}" method="post">
                        <button type="submit" class="btn-action btn-delete">Delete</button>
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
