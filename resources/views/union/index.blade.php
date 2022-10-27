@extends('main')
@section('content')
<div class="container">
    <table class="table">
        <caption class="caption">
            <h3>List of Unions</h3>
        </caption>
        <tr>
            <th>Union Name</th>
            <th>Union members list</th>
            <th>Action</th>
        </tr>
        @forelse ( $unions as $union )
        <tr>
            <td>{{$union->union_name}}</td>
            <td>
            @forelse($union->hasCountries as $country)
                <ul class="ul right">
                    <li>{{$country->country_name}}</li>
                </ul>
            @empty
                <ul class="ul">
                    <li>List is empty!</li>
                </ul>
            @endforelse
            <td>
                <div class="form-row">
                    <a class="btn-action btn-edit" href="{{route('union-edit', $union)}}">Edit</a>
                    <form action="{{route('union-destroy', $union)}}" method="post">
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
