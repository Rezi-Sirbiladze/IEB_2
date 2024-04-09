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

    public function create(FairActivity $fairActivity): Booking
    {
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
            throw new \Exception('No pots apunta\'t en la mateixa activitat.');
        }

        if ($existingBookingTime) {
            throw new \Exception('No pots apunta\'t a dues activitats al mateix temps.');
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

    public function delete(Booking $booking): void
    {
        $booking->delete();
    }

    public function confirmBookings(): Collection
    {
        $pendingBookings = auth()->user()->pendingBookings;
        if ($pendingBookings->count() == 4) {
            $pendingBookings->each(function ($booking) {
                $booking->status = 'confirmed';
                $booking->save();
            });
        } elseif ($pendingBookings->count() < 4){
            throw new \Exception('No pots confirmar menys de 4 reserves.');
        } elseif ($pendingBookings->count() > 4) {
            throw new \Exception('No pots confirmar més de 4 reserves.');
        }


        return $pendingBookings;
    }
}
