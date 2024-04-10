<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\FairActivity;
use App\Models\Fair;
use Illuminate\Http\Request;
use App\Repositories\BookingRepository;
use Illuminate\Support\Facades\Response;
use App\Repositories\FairActivityRepository;

class BookingController extends Controller
{

    protected BookingRepository $bookingRepository;
    protected FairActivityRepository $fairActivityRepository;

    public function __construct(BookingRepository $bookingRepository, FairActivityRepository $fairActivityRepository)
    {
        $this->bookingRepository = $bookingRepository;
        $this->fairActivityRepository = $fairActivityRepository;
    }

    public function index()
    {
        //
    }

    public function confirm()
    {
        try {
            $result = $this->bookingRepository->confirmBookings();
            return redirect()->route('dashboard')->with('success', 'Reserves confirmades correctament');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function destroyFairUserBookings(Fair $fair)
    {
        try {
            $this->bookingRepository->deleteFairUserBookings($fair);
            return redirect()->back()->with('success', 'Reserves eliminades correctament');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FairActivity $fairActivity)
    {
        try {
            $booking = $this->bookingRepository->create($fairActivity);
            if ($booking) {
                $capacityPercentage  = $fairActivity->capacityPercentage();
                return response()->json([
                    'booking' => $booking,
                    'percentageBooked' => $capacityPercentage,
                    'fairActivity' => $fairActivity,
                    'activity' => $fairActivity->activity,
                ]);
            } else {
                return Response::json(['success' => false, 'message' => 'La reserva ha fallat'], 500);
            }
        } catch (\Exception $e) {
            return Response::json(['success' => false, 'message' => $e->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $this->bookingRepository->delete($booking);
        return redirect()->back()->with('success', 'Reserva eliminada correctament');
    }
}
