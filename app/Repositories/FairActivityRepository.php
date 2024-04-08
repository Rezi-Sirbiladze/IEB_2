<?php

namespace App\Repositories;

use App\Interfaces\FairActivityInterface;
use App\Models\FairActivity;
use Illuminate\Support\Collection;

class FairActivityRepository implements FairActivityInterface
{
    protected FairActivity $model;

    public function __construct(FairActivity $model)
    {
        $this->model = $model;
    }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function findOne(int $id): FairActivity
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $request): FairActivity
    {
        return $this->model->create($request);
    }

    public function update(array $data, int $id): FairActivity
    {
        $register = $this->model->findOrFail($id);
        $register->update($data);
        return $register;
    }

    public function save(FairActivity $fairActivity): bool
    {
        return $fairActivity->save();
    }

    public function delete(int $id): void
    {
        $register = $this->model->findOrFail($id);
        $register->delete($id);
    }
}
