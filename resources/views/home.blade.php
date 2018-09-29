@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10" style='display: flex; justify-content: space-between;'>
            <h1> Appointments </h1>
        </div>
        <div class='col-md-2'>
            <a href='/create-appointment' class='pull-right btn btn-primary'> Create </a>
        </div>
    </div>
    <hr />

    <div class='row'>
        <div class='col-md-12'>
            @foreach ($userAppointments as $apt)
                <h4>
                    {{ $apt->physician }} - {{ $apt->appointment_date }} {{ $apt->appointment_time}}
                </h4>
            @endforeach
        </div>
    </div>
</div>
@endsection
