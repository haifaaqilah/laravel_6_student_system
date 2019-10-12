@extends('layouts.app_container')

@section('main_content')

    <div class="float-right">
        <a class="btn btn-success" href="{{ route('level.create') }}"> Create New Level </a>

    </div><br><br>

    <table class="table table-hover table-bordered table-striped">
        <tr>
            <th>No.</th>
            <th>Level Name</th>
            <th>Level Number</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($levels as $level)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $level->level_name }}</td>
                <td>{{ $level->level_number }}</td>
                <td>{{ $level->status }}</td>
                <td>
                    <form action="{{ route('level.destroy', $level->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="{{ route('level.show', $level->id) }}"> Show </a>
                        <a class="btn btn-warning" href="{{ route('level.edit', $level->id) }}"> Edit </a>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </table>

    {!! $levels->links() !!}

@endsection
