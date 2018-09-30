@extends('layouts.app')
@section('content')

<div class='container'>
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h1> All Appointments </h1>
            <hr />

            @if ($allAppointments->count())
                <div class='col-md-12'>
                    @foreach ($allAppointments as $apt)
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
    </div>
</div>

@endsection
