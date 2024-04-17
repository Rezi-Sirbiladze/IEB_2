<?php

namespace App\Interfaces;

use App\Models\Review;
use Illuminate\Support\Collection;

interface ReviewInterface
{
    public function findAll(): Collection;
    public function findOne(int $id): Review;
    public function findOneByBookingId(int $id): ?Review;

    public function create(array $request): Review;
    public function update(array $data, int $id): Review;
    public function save(Review $review): bool;
    public function delete(int $id): void;
}
