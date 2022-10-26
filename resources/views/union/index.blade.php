@extends('main')
@section('content')
<div class="container">
    <table class="table">
        <caption class="caption">
            <h3>List of Unions</h3>
        </caption>
        <tr>
            <th>Union Name</th>
            
            <th>Action</th>
        </tr>
        @forelse ( $unions as $union )
        <tr>
            <td>{{$union->union_name}}</td>
            
            <td>
                <div class="form-row">
                    <a class="btn-action btn-edit" href="">Edit</a>
                    <form action="" method="post">
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