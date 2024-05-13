<?php

namespace App\Http\Controllers;

use App\Models\MediaLinks;
use Illuminate\Http\Request;
use App\Repositories\MediaLinksRepository;


class MediaLinksController extends Controller
{

    protected MediaLinksRepository $mediaLinksRepository;

    public function __construct(MediaLinksRepository $mediaLinksRepository)
    {
        $this->mediaLinksRepository = $mediaLinksRepository;
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
    public function show(MediaLinks $mediaLinks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MediaLinks $mediaLinks)
    {
        return view('fair.admin.mediaLinksCRUD.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MediaLinks $mediaLinks)
    {
        $data = $request->all();
        $media = $request->file('media_path');
        $directory = 'img';
        if ($data['media_type'] == 'indexVideo') {
            $directory = 'vid';
        }
        $filename = uniqid() . '_' . $media->getClientOriginalName();
        $path = $media->move(public_path($directory), $filename);

        $data['media_path'] = $filename;
        $this->mediaLinksRepository->update($data, $data['media_type']);

        return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MediaLinks $mediaLinks)
    {
        //
    }
}
