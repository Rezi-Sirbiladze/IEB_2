<?php

namespace App\Http\Controllers;

use App\Models\FairActivity;
use Illuminate\Http\Request;
use App\Repositories\FairActivityRepository;
use App\Repositories\FairRepository;
use App\Repositories\ActivityRepository;
use App\Models\Fair;

class FairActivityController extends Controller
{

    protected $fairActivityRepository;
    protected $fairRepository;
    protected $activityRepository;

    public function __construct(FairActivityRepository $fairActivityRepository, FairRepository $fairRepository, ActivityRepository $activityRepository)
    {
        $this->fairActivityRepository = $fairActivityRepository;
        $this->fairRepository = $fairRepository;
        $this->activityRepository = $activityRepository;
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($fair_id)
    {
        $fair = $this->fairRepository->findOne($fair_id);
        $activities = $this->activityRepository->findAll();
        return view('fair.admin.fairActivitiesCRUD.create', compact('fair', 'activities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $create = $this->fairActivityRepository->create($request->all());
        $fair = $this->fairRepository->findOne($create->fair_id)->load('fairActivities');
        return view('fair.admin.fairActivities', compact('fair'));
    }

    /**
     * Display the specified resource.
     */
    public function show(FairActivity $fairActivity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($fair, $fairActivity)
    {
        $activities = $this->activityRepository->findAll();
        $fair = $this->fairRepository->findOne($fair);
        $fairActivity = $this->fairActivityRepository->findOne($fairActivity);
        return view('fair.admin.fairActivitiesCRUD.edit', compact('fair', 'fairActivity', 'activities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FairActivity $fairActivity)
    {
        $update = $this->fairActivityRepository->update($request->all(), $fairActivity->id);
        $fair = $this->fairRepository->findOne($fairActivity->fair_id)->load('fairActivities');
        return view('fair.admin.fairActivities', compact('fair'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FairActivity $fairActivity)
    {
        $destroy = $this->fairActivityRepository->delete($fairActivity->id);
        $fair = $this->fairRepository->findOne($fairActivity->fair_id)->load('fairActivities');
        return view('fair.admin.fairActivities', compact('fair'));
    }
}
