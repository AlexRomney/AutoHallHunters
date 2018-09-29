@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1> Create Appointment </h1>
                <hr />
            </div>
        </div>

        <div class='col-md-12'>
            <form type='POST' action='/create-appointment'>
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name='name' value="{{ old('name') }}" class="form-control" id="name" placeholder='John Doe' required>
                </div>
                @if ($errors->has('name'))
                     <div class="alert alert-danger">
                     <div class="fa fa-angle-up"></div>
                     <strong>{{ $errors->first('name') }}</strong>
                     </div>
                 @endif

                 <div class="form-group">
                    <label for="physician">Physician</label>
                    <select class="form-control" id="physician" name='physician' >
                        <option value=""> Select A Physician </option>
                        <option value="Dr. Tyler"> Dr. Tyler </option>
                        <option value="Dr. Tim"> Dr. Tim </option>
                    </select>
                </div>
                @if ($errors->has('physician'))
                     <div class="alert alert-danger">
                     <div class="fa fa-angle-up"></div>
                     <strong>{{ $errors->first('physician') }}</strong>
                     </div>
                @endif

                <button type='submit' class='btn btn-primary'> Submit </button>
            </form>
        </div>
    </div>
@endsection
