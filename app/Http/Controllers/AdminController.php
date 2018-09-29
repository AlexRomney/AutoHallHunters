<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Repositories\AppointmentRepository;

class AdminController extends Controller
{
    protected $model;

    public function __construct(Appointment $appointment)
    {
        $this->model = new AppointmentRepository($appointment);
    }

    function allAppointments()
    {
        $allAppointments = $this->model->all();
        return view('admin.all_appointments', compact('allAppointments'));
    }
}
