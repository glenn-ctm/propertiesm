<?php

namespace App\Http\Controllers\Panels;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\VideosRecordingsPictures;
use App\Models\User;

class VidRecPicController extends Controller
{
    // public function __construct()
    // {
    //     $this->authorizeResource(VideosRecordingsPictures::class, 'video_recording_picture');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(! auth()->user()->hasPermissionTo('read videos_recordings_pictures') ) abort(401);

        $query = VideosRecordingsPictures::query()->with('media')->orderBy('id', 'DESC');
        $page_title = 'Videos/Recordings/Pictures';

        if (auth()->user()->is_property_owner()) {
            $query->where('user_id', auth()->user()->id);
        }

        if (auth()->user()->can('create videos_recordings_pictures') && $search = $request->input('search')) {
            $query->search($search);
        }

        return view('panel.pages.vid-rec-pic.index', [
            'vrps' => $query->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(! auth()->user()->hasPermissionTo('create videos_recordings_pictures') ) abort(401);

        return view('panel.pages.vid-rec-pic.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(! auth()->user()->hasPermissionTo('create videos_recordings_pictures') ) abort(401);

        $request->validate([
            'pin'=>'required|exists:users,pin',
            'date'=>'required',
            'address'=>'required',
            'description'=>'required'
        ]);

        $user = User::wherePin($request->get('pin'))->first();

        $vids_recs_pic = VideosRecordingsPictures::create([
            'user_id' => $user->id,
            'date' => $request->get('date'),
            'address' => $request->get('address'),
            'description' => $request->get('description')
        ]);

        if($image_ids = $request->input('media')){
            $vids_recs_pic->updateMediaUploads($image_ids);
        }

        session()->flash('alertSuccess', 'Videos/Recordings/Pictures created!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  VideosRecordingsPictures $vids_recs_pic
     * @return \Illuminate\Http\Response
     */
    public function show(VideosRecordingsPictures $vids_recs_pic)
    {
        return view('panel.pages.vid-rec-pic.show', compact('vids_recs_pic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  VideosRecordingsPictures $vids_recs_pic
     * @return \Illuminate\Http\Response
     */
    public function edit(VideosRecordingsPictures $vids_recs_pic)
    {
        if(! auth()->user()->hasPermissionTo('update videos_recordings_pictures') ) abort(401);

        return view('panel.pages.vid-rec-pic.form', compact('vids_recs_pic'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  VideosRecordingsPictures $vids_recs_pic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VideosRecordingsPictures $vids_recs_pic)
    {
        if(! auth()->user()->hasPermissionTo('update videos_recordings_pictures') ) abort(401);

        $request->validate([
            'pin'=>'required|exists:users,pin',
            'date'=>'required',
            'address'=>'required',
            'description'=>'required'
        ]);

        $user = User::wherePin($request->get('pin'))->first();

        $vids_recs_pic->update([
            'user_id' => $user->id,
            'date' => $request->get('date'),
            'address' => $request->get('address'),
            'description' => $request->get('description')
        ]);

        if($image_ids = $request->input('media')){
            $vids_recs_pic->updateMediaUploads($image_ids);
        }

        session()->flash('alertSuccess', 'Videos/Recordings/Pictures updated!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  VideosRecordingsPictures $vids_recs_pic
     * @return \Illuminate\Http\Response
     */
    public function destroy(VideosRecordingsPictures $vids_recs_pic)
    {
        if(! auth()->user()->hasPermissionTo('delete videos_recordings_pictures') ) abort(401);

        $vids_recs_pic->delete();

        session()->flash('alertSuccess', 'Videos/Recordings/Pictures deleted!');

        return redirect()->back();
    }
}
