<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function allAppointments()
    {
        return view('admin.all_appointments');
    }
}
