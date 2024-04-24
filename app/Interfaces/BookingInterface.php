<?php

namespace App\Interfaces;

use App\Models\Booking;
use App\Models\FairActivity;
use App\Models\Fair;
use Illuminate\Support\Collection;

interface BookingInterface
{
    public function findAll(): Collection;
    public function findOne(int $id): Booking;

    public function create(FairActivity $fairActivity): Booking;
    public function update(array $data, int $id): Booking;
    public function save(Booking $booking): bool;
    public function delete(Booking $booking): void;
    public function deleteFairUserBookings(Fair $fair): void;
}
