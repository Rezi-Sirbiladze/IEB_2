<?php

namespace App\Interfaces;

use App\Models\Activity;
use Illuminate\Support\Collection;

interface ActivityInterface
{
    public function findAll(): Collection;
    public function findOne(int $id): Activity;

    public function create(array $request): Activity;
    public function update(array $data, int $id): Activity;
    public function save(Activity $activity): bool;
    public function delete(int $id): void;
}
