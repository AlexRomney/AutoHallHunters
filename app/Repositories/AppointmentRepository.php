<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Auth;

class AppointmentRepository implements AppointmentInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function userAppointments($id)
    {
        return $this->model->where('user_id', $id)->get();
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(Array $data)
    {
        return $this->model->create([
            'user_id' => Auth::user()->id,
            'name' => $data['name'],
            'physician' => $data['physician'],
            'appointment_date' => $data['appointment_date'],
            'appointment_time' => $data['appointment_time'] . ' ' . $data['time_of_day']
        ]);
    }

    public function update(array $data, $id)
    {
        $appointment = $this->model->find($id);
        return $appointment->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function getModel()
    {
        return $this->model;
    }
}
