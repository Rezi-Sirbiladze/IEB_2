<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Repositories\ActivityRepository;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    protected ActivityRepository $activityRepository;

    public function __construct(ActivityRepository $activityRepository)
    {
        $this->activityRepository = $activityRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = $this->activityRepository->findAll();
        return view('fair.admin.activitiesCRUD.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fair.admin.activitiesCRUD.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $image = $request->file('image_path');
        $directory = 'img';
        $filename = uniqid() . '_' . $image->getClientOriginalName();
        $path = $image->move(public_path($directory), $filename);
        
        $data['image_path'] = $filename;
        $this->activityRepository->create($data);

        return redirect()->route('admin.activities.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Activity $activity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Activity $activity)
    {
        return view('fair.admin.activitiesCRUD.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $data = $request->all();
        $image = $request->file('image_path');
        $directory = 'img';
        $filename = uniqid() . '_' . $image->getClientOriginalName();
        $path = $image->move(public_path($directory), $filename);

        $data['image_path'] = $filename;
        $this->activityRepository->update($data, $activity->id);

        return redirect()->route('admin.activities.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Activity $activity)
    {
        //
    }
}
