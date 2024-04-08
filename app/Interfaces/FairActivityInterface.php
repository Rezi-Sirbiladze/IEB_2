<?php

namespace App\Interfaces;

use App\Models\FairActivity;
use Illuminate\Support\Collection;

interface FairActivityInterface
{
    public function findAll(): Collection;
    public function findOne(int $id): FairActivity;

    public function create(array $request): FairActivity;
    public function update(array $data, int $id): FairActivity;
    public function save(FairActivity $fairActivity): bool;
    public function delete(int $id): void;
}
