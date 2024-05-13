<?php

namespace App\Interfaces;

use App\Models\MediaLinks;
use Illuminate\Support\Collection;

interface MediaLinksInterface
{
    public function findAll(): Collection;
    public function findOne(int $id): MediaLinks;

    public function create(array $request): MediaLinks;
    public function update(array $data, string $mediaType): MediaLinks;
    public function save(MediaLinks $mediaLinks): bool;
    public function delete(int $id): void;
}
