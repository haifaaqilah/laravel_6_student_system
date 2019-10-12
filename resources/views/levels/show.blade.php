@extends('layouts.app_container')

@section('main_content')

    <div class="float-right">
        <a class="btn btn-primary" href="{{ route('level.index') }}"> Back </a>
    </div><br><br>

    <table class="table table-hover table-bordered table-striped">
        <tr>
            <th>ID</th>
            <td>{{$level->id }}</td>
        </tr>

        <tr>
            <th>Level Name</th>
            <td>{{$level->level_name}}</td>
        </tr>

        <tr>
            <th>Level Number</th>
            <td>{{$level->level_number }}</td>
        </tr>

        <tr>
            <th>Status</th>
            <td>{{$level->status }}</td>
        </tr>

        <tr>
            <th>Created At</th>
            <td>{{$level->created_at }}</td>
        </tr>

        <tr>
            <th>Update At</td>
            <td>{{$level->updated_at }}</td>
        </tr>
    </table>



@endsection
