<?php

namespace App\Repositories;

use App\Interfaces\BookingInterface;
use App\Models\Booking;
use App\Models\FairActivity;
use Illuminate\Support\Collection;

class BookingRepository implements BookingInterface
{
    protected Booking $model;

    public function __construct(Booking $model)
    {
        $this->model = $model;
    }

    public function findAll(): Collection
    {
        return $this->model->all();
    }

    public function findOne(int $id): Booking
    {
        return $this->model->findOrFail($id);
    }

    public function create(int $fairActivity): Booking
    {

        $fairActivity = FairActivity::findOrFail($fairActivity);


        $existingBookingActivity = $this->model
            ->where('user_id', auth()->id())
            ->whereHas('fairActivity', function ($query) use ($fairActivity) {
                $query->where('activity_id', $fairActivity->activity_id)
                    ->where('fair_id', $fairActivity->fair_id);
            })
            ->with('fairActivity')
            ->first();

        $existingBookingTime = $this->model
            ->where('user_id', auth()->id())
            ->whereHas('fairActivity', function ($query) use ($fairActivity) {
                $query->where('fair_id', $fairActivity->fair_id)
                    ->where('start_time', $fairActivity->start_time);
            })
            ->with('fairActivity')
            ->first();

        if ($existingBookingActivity) {
            throw new \Exception('Sorry, you cannot book this activity as you already have a booking for it.');
        }

        if ($existingBookingTime) {
            throw new \Exception('Sorry, you cannot book at this time due to a time conflict.');
        }

        $bookingData = [
            'fair_activity_id' => $fairActivity->id,
            'user_id' => auth()->id(),
            'status' => 'pending',
        ];
        return $this->model->create($bookingData);

        // No lo borro porque me parece util es: wher x = x and (y = y or z = z) dentro de un whereHas
        // $existingBookingBoth = $this->model
        //     ->where('user_id', auth()->id())
        //     ->whereHas('fairActivity', function ($query) use ($fairActivity) {
        //         $query->where('fair_id', $fairActivity->fair_id)
        //             ->where(function ($query) use ($fairActivity) {
        //                 $query->where('start_time', $fairActivity->start_time)
        //                     ->orWhere('activity_id', $fairActivity->activity_id);
        //             });
        //     })
        //     ->with('fairActivity')
        //     ->first();
    }

    public function update(array $data, int $id): Booking
    {
        $register = $this->model->findOrFail($id);
        $register->update($data);
        return $register;
    }

    public function save(Booking $booking): bool
    {
        return $booking->save();
    }

    public function delete(int $id): void
    {
        $register = $this->model->findOrFail($id);
        $register->delete($id);
    }
}
