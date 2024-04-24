<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\FairRepository;
use App\Repositories\FairActivityRepository;
use App\Repositories\BookingRepository;

class AdminController extends Controller
{
    protected $fairRepository;
    protected $fairActivityRepository;
    protected $bookingRepository;

    public function __construct(
        FairRepository $fairRepository,
        FairActivityRepository $fairActivityRepository,
        BookingRepository $bookingRepository
    ) {
        $this->fairRepository = $fairRepository;
        $this->fairActivityRepository = $fairActivityRepository;
        $this->bookingRepository = $bookingRepository;
    }

    public function dashboard()
    {
        $fairs = $this->fairRepository->findAll();
        return view('fair.admin.dashboard', compact('fairs'));
    }

    public function fairActivities($fair_id)
    {
        $fair = $this->fairRepository->findOne($fair_id)->load('fairActivities');
        return view('fair.admin.fairActivities', compact('fair'));
    }

    public function fairActivityBookings($fairActivity_id)
    {
        $fairActivity = $this->fairActivityRepository->findOne($fairActivity_id);
        $bookings = $this->bookingRepository->findAllByActivityId($fairActivity_id)->where('status', 'confirmed');
        return view('fair.admin.fairActivityBookings', compact('bookings', 'fairActivity'));
    }

    public function updatePresentedStatus(Request $request)
    {
        $booking = $this->bookingRepository->findOne($request->booking_id);
        $booking->update(['presented' => $request->presented]);
        return response()->json(['success' => true]);
    }
}
