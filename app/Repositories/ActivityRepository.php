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
        return $this->model->orderBy('created_at', 'desc')->get();
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
        #delete old image if new image is uploaded
        
        if (isset($data['image_path'])) {
            $image_path = $register->image_path;
            $image_path = public_path('img/' . $image_path);
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }

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
