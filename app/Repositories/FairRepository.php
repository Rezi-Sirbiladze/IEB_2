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
        return $this->model->orderBy('date', 'desc')->get();
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
        if(isset($request['active']))
        {
            $request['active'] = $request['active'] === 'on' ? true : false;
        }
        return $this->model->create($request);
    }

    public function update(array $data, int $id): Fair
    {
        if(isset($data['active']))
        {
            $data['active'] = $data['active'] === 'on' ? true : false;
        }
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

    public function desactiveAllFairs(): void
    {
        $this->model->where('active', true)->update(['active' => false]);
    }
}
