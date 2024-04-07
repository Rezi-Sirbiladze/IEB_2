<?php

namespace App\Interfaces;

use App\Models\Fair;
use Illuminate\Support\Collection;

interface FairInterface
{
    public function findAll(): Collection;
    public function findOne(int $id): Fair;
    public function findOneByActived(): Fair;

    public function create(array $request): Fair;
    public function update(array $data, int $id): Fair;
    public function save(Fair $fair): bool;
    public function delete(int $id): void;
}
