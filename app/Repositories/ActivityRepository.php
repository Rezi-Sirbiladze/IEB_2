<?php

namespace App\Repositories;

use App\Interfaces\ActivityInterface;
use App\Models\Activity;
use Illuminate\Support\Collection;

class ActivityRepository implements ActivityInterface
{
    protected Activity $model;

    public function __construct(Activity $model)
    {
        $this->model = $model;
    }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function findOne(int $id): Activity
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $request): Activity
    {
        return $this->model->create($request);
    }

    public function update(array $data, int $id): Activity
    {
        $register = $this->model->findOrFail($id);
        $register->update($data);
        return $register;
    }

    public function save(Activity $activity): bool
    {
        return $activity->save();
    }

    public function delete(int $id): void
    {
        $register = $this->model->findOrFail($id);
        $register->delete($id);
    }
}
