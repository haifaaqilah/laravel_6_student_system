@extends('layouts.app_container')

@section('main_content')

    <div class="float-right">
        <a class="btn btn-primary" href="{{ route('level.index') }}"> Back </a>
    </div><br><br>

    <form class="form-horizontal" action="{{ route('level.update', $level->id) }}" method="POST">
        @csrf
        @method('PUT')
        <fieldset>

        <!-- Form Name -->
        <legend>Update Level</legend>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="level_name">Level Name:</label>
            <div class="col-md-4">
            <input id="level_name" name="level_name" type="text" placeholder="Level Name"
            class="form-control input-md" required="" value="{{ $level->level_name }}">

            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="level_number">Level Number</label>
            <div class="col-md-4">
            <select id="level_number" name="level_number" class="form-control">
                <option value="" disabled>Please Select Level Number</option>
                <option {{ ($level->level_number === 1 ) ? 'selected' : null }} value="1">1</option>
                <option {{ ($level->level_number === 2 ) ? 'selected' : null }} value="2">2</option>
                <option {{ ($level->level_number === 3 ) ? 'selected' : null }} value="3">3</option>
                <option {{ ($level->level_number === 4 ) ? 'selected' : null }} value="4">4</option>
                <option {{ ($level->level_number === 5 ) ? 'selected' : null }} value="5">5</option>
                <option {{ ($level->level_number === 6 ) ? 'selected' : null }} value="6">6</option>
            </select>
            </div>
        </div>

        <!-- Select Basic -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="status">Status</label>
            <div class="col-md-4">
            <select id="status" name="status" class="form-control">
                <option value="" disabled>Please Select</option>
                <option {{ ($level->status === 1 ) ? 'selected' : null }} value="1"> Active</option>
                <option {{ ($level->status === 0 ) ? 'selected' : null }} value="0"> Inactive</option>
            </select>
            </div>
        </div>

        <!-- Button (Double) -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="btn_submit"></label>
            <div class="col-md-8">
            <button id="btn_submit" name="btn_submit" class="btn btn-success">Submit</button>
            <button id="btn_cancel" name="btn_cancel" class="btn btn-danger">Cancel</button>
            </div>
        </div>

        </fieldset>
    </form>



@endsection
