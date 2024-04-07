<?php

namespace App\Interfaces;

use App\Models\Booking;
use Illuminate\Support\Collection;

interface BookingInterface
{
    public function findAll(): Collection;
    public function findOne(int $id): Booking;

    public function create(int $fairActivity): Booking;
    public function update(array $data, int $id): Booking;
    public function save(Booking $booking): bool;
    public function delete(int $id): void;
}
