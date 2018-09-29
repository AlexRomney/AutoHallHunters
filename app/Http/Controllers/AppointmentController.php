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
    }

    public function index()
    {
        $userAppointments = $this->model->userAppointments(Auth::user()->id);
        return view('home', compact('userAppointments'));
    }

    public function createAppointment()
    {
        return view('create_appointment');
    }

    public function store(Request $request)
    {
        return $this->model->create($request->only($this->model->getModel()->fillable()));
    }

    public function show($id)
    {
        return $this->model->show($id);
    }

    public function update(Request $request, $id)
    {
        $this->model->update($request->only($this->model->getModel()->fillable()), $id);
        return $this->model->find($id);
    }

    public function destroy($id)
    {
        return $this->model->delete($id);
    }
}
