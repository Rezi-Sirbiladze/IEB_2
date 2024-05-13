<?php

namespace App\Repositories;

use App\Interfaces\MediaLinksInterface;
use App\Models\MediaLinks;
use Illuminate\Support\Collection;

class MediaLinksRepository implements MediaLinksInterface
{
    protected MediaLinks $model;

    public function __construct(MediaLinks $model)
    {
        $this->model = $model;
    }

    public function findAll(): Collection
    {
        return $this->model->orderBy('created_at', 'desc')->get();
    }

    public function findOne(int $id): MediaLinks
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $request): MediaLinks
    {
        return $this->model->create($request);
    }

    public function update(array $data, string $mediType): MediaLinks
    {
        $register = $this->model->where('media_type', $mediType)->first();
        #delete old image if new image is uploaded

        $directory = 'img/';
        if ($register->media_type == 'indexVideo') {
            $directory = 'vid/';
        }
        $media_path = $register->media_path;
        $media_path = public_path($directory . $media_path);

        if (file_exists($media_path)) {
            unlink($media_path);
        }

        $register->update($data);
        return $register;
    }

    public function save(MediaLinks $mediaLinks): bool
    {
        return $mediaLinks->save();
    }

    public function delete(int $id): void
    {
        $register = $this->model->findOrFail($id);
        $register->delete($id);
    }
}
