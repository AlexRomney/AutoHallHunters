<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Repositories\AppointmentRepository;
use Auth;

class AppointmentController extends Controller
{
    protected $model;

    public function __construct(Appointment $appointment)
    {
        $this->model = new AppointmentRepository($appointment);
        $this->middleware('auth');
    }

    function index()
    {
        $userAppointments = $this->model->userAppointments(Auth::user()->id);
        return view('home', compact('userAppointments'));
    }

    function createAppointment()
    {
        return view('create_appointment');
    }

    function store(Request $request)
    {
        $this->model->create($request->all());
        return redirect('home');
    }

    function show($id)
    {
        $edit = $this->model->show($id);
        return view('edit_appointment', compact('edit'));
    }

    function update(Request $request, $id)
    {
        $this->model->update($request->all(), $id);
        return redirect('home');
    }

    function destroy($id)
    {
        return $this->model->delete($id);
    }
}
