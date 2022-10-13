@extends('main')
@section('content')
<div class="container">
    <table class="table">
        <caption class="caption">
            <h3>List of Pits</h3>
        </caption>
        <tr>
            <th>Pit Name</th>
            <th>Country</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Capacity <i>kg/24h</i></th>
            <th>Action</th>
        </tr>
        @forelse ( $pits as $pit )
        <tr>
            <td>{{$pit->pit_name}}</td>
            <td>{{$pit->getCountryInfo->country_name}}</td>
            <td>{{$pit->lat}} <i>{{$pit->position_lat}}</i></td>
            <td>{{$pit->lng}} <i>{{$pit->position_lng}}</i></td>
            <td>{{$pit->capacity}}</td>
            <td>
                <div class="form-row">
                    <a class="btn-action btn-edit" href="{{route('pit-edit', $pit)}}">Edit</a>
                    <form action="{{route('pit-destroy', $pit)}}" method="post">
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
