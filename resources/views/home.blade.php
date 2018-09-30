@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 pull-left">
            <h1> Appointments </h1>
        </div>
        <div class='col-md-2'>
            <a href='/create-appointment' class='pull-right btn btn-primary'> Create </a>
        </div>
    </div>
    <hr />

    @if ($userAppointments->count())
        <div class='col-md-12'>
            @foreach ($userAppointments as $apt)
                <div style='display: flex; justify-content: space-between;'>
                    <p> <a style='color: green;' href="/appointment/{{ $apt->id }}/edit">
                        <span class="fas fa-pencil-alt"></span></a> Physician: {{ $apt->physician }} </p>
                    <p> Patient: {{ $apt->name }} </p>
                    <p> {{ $apt->appointment_date }} </p>
                    <p> {{ $apt->appointment_time }} </p>
                </div style='display: flex; justify-content: space-between;'>
            @endforeach
        </div>
    @else
        <h3 class='text-center'> No Appointments </h3>
    @endif
</div>
@endsection
