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
        flash('YOUR APPOINTMENT HAS BEEN CREATED')->success();
        return redirect('home');
    }

    function edit($id)
    {
        $edit = $this->model->edit($id);
        return view('edit_appointment', compact('edit'));
    }

    function update(Request $request, $id)
    {
        $this->model->update($request->all(), $id);
        flash('YOUR APPOINTMENT HAS BEEN UPDATED')->success();
        return redirect('home');
    }

    function destroy($id)
    {
        $this->model->delete($id);
        flash('YOUR APPOINTMENT HAS BEEN DELETED')->error();
        return redirect('home');
    }
}
