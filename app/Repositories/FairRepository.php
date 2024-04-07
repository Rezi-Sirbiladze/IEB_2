<?php

namespace App\Repositories;

use App\Interfaces\FairInterface;
use App\Models\Fair;
use Illuminate\Support\Collection;

class FairRepository implements FairInterface
{
    protected Fair $model;

    public function __construct(Fair $model)
    {
        $this->model = $model;
    }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function findOne(int $id): Fair
    {
        return $this->model->findOrFail($id);
    }

    public function findOneByActived(): Fair
    {
        return $this->model->where('active', true)->with('fairActivities')->first();
    }

    public function create(array $request): Fair
    {
        return $this->model->create($request);
    }

    public function update(array $data, int $id): Fair
    {
        $register = $this->model->findOrFail($id);
        $register->update($data);
        return $register;
    }

    public function save(Fair $fair): bool
    {
        return $fair->save();
    }

    public function delete(int $id): void
    {
        $register = $this->model->findOrFail($id);
        $register->delete($id);
    }
}
