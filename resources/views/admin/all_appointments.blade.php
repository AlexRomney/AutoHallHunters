@extends('layouts.app')
@section('content')

<div class='container'>
    <div class="row justify-content-center">
        <div class="col-md-12 text-center">
            <h1> All Appointments </h1>
            <hr />

            {{ $allAppointments }}
        </div>
    </div>
</div>

@endsection
