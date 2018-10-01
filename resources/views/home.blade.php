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

    <div class='row'>
        <div class='col-md-12'>
            @if ($userAppointments->count())
                <table class='table table-hover'>
                    <thead>
                        <tr>
                            <th scope='col'> Physician </th>
                            <th scope='col'> Patient </th>
                            <th scope='col'> Date </th>
                            <th scope='col'> Time </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userAppointments as $apt)
                            <tr>
                                <td> <a style='color: green;' href="/appointment/{{ $apt->id }}/edit">
                                     <span class="fas fa-pencil-alt"></span></a> {{ $apt->physician }} </td>
                                <td> {{ $apt->name }} </td>
                                <td> {{ $apt->appointment_date }} </td>
                                <td>
                                    <form method='POST' action='/appointment/delete/{{ $apt->id }}'>
                                        {{ csrf_field() }}
                                        {{ $apt->appointment_time }}
                                        <button style='border: none; background: none; color: red; cursor: pointer;' type='submit' class="fas fa-trash-alt"></button>
                                    </form>
                                 </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h3 class='text-center'> No Appointments </h3>
            @endif
        </div>
    </div>
</div>
@endsection
