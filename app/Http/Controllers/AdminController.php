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
        $this->middleware('auth');
    }

    function allAppointments()
    {
        $allAppointments = $this->model->all();
        return view('admin.all_appointments', compact('allAppointments'));
    }

    function edit($id)
    {
        $edit = $this->model->edit($id);
        return view('admin.edit_appointment', compact('edit'));
    }

    function update(Request $request, $id)
    {
        $update = $this->model->update($request->all(), $id);
        flash("APPOINTMENT #$id HAS BEEN UPDATED")->success();
        return redirect('admin/appointments');
    }

    function destroy($id)
    {
        $this->model->delete($id);
        flash("APPOINTMENT #$id HAS BEEN CANCELLED")->error();
        return redirect('admin/appointments');
    }
}
