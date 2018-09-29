<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

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
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $appointment = $this->find($id);
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
