<?php

namespace App\Http\Controllers;

use App\Models\Booking;
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
    public function store($fairActivity)
    {
        $fairActivity = $this->fairActivityRepository->findOne($fairActivity);
        try {
            $result = $this->bookingRepository->create($fairActivity);
            if ($result) {
                $capacityPercentage  = $fairActivity->capacityPercentage();
                return response()->json([
                    'fairActivity' => $fairActivity,
                    'percentageBooked' => $capacityPercentage
                ]);
            } else {
                return Response::json(['success' => false, 'message' => 'Booking failed'], 500);
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
        //
    }
}
