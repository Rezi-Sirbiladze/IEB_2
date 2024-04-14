<?php

namespace App\Http\Controllers;

use App\Models\Fair;
use Illuminate\Http\Request;
use App\Repositories\FairRepository;
use App\Repositories\ActivityRepository;

class FairController extends Controller
{
    protected ActivityRepository $activityRepository;
    protected FairRepository $fairRepository;

    public function __construct(ActivityRepository $activityRepository, FairRepository $fairRepository)
    {
        $this->activityRepository = $activityRepository;
        $this->fairRepository = $fairRepository;
    }

    public function index()
    {
        $fair = $this->fairRepository->findOneByActived();
        $startTimes = $fair->fairActivities->groupBy('start_time')->keys();
        $activities = $fair->fairActivities()->with('activity')->get()->pluck('activity')->unique();
        $bookedActivities = [];
        if (auth()->user()) {
            foreach (auth()->user()->pendingBookings as $booking) {
                $bookedActivities[] = $booking->fairActivity->id;
            }
        }
        return view('fair.index', compact('activities', 'fair', 'startTimes', 'bookedActivities'));
    }

    public function activities()
    {
        $fair = $this->fairRepository->findOneByActived();
        $activities = $fair->fairActivities()->with('activity')->get()->pluck('activity')->unique();
        return view('fair.activities', compact('activities'));
    }

    public function location()
    {
        return view('fair.location');
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Fair $fair)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fair $fair)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Fair $fair)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fair $fair)
    {
        //
    }
}
