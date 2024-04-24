<?php

namespace App\Http\Controllers;


use App\Models\Review;
use Illuminate\Http\Request;
use App\Repositories\ReviewRepository;
use App\Repositories\BookingRepository;

class ReviewController extends Controller
{

    protected ReviewRepository $reviewRepository;
    protected BookingRepository $bookingRepository;

    public function __construct(ReviewRepository $reviewRepository, BookingRepository $bookingRepository)
    {
        $this->reviewRepository = $reviewRepository;
        $this->bookingRepository = $bookingRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function modalReview(Request $request)
    {
        $booking = $this->bookingRepository->findOne($request->booking_id);
        $review = $this->reviewRepository->findOneByBookingId($request->booking_id);
        return view('fair.modals.review', compact('booking', 'review'));
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
    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['user_id'] = auth()->id();
        $this->reviewRepository->updateOrCreate($data);
        return response()->json(['success' => true, 'message' => 'Review saved successfully.']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
