<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class VideoController extends Controller
{
    public function createForm(){
        $data = Video::select('video', 'title')->get()->last();
        return view('uploadVideo',compact('data'));
    }



    public function uploadVideo(Request $request)
   {

   $video = new Video();
   $video->title = $request->title;
   if ($request->hasFile('video'))
   {
       $this->validate($request, [
         'title' => 'required|string|max:255',
         'video' => 'required',
        ]);
        // $path = $request->file('video')->store('videos', ['disk' => 'my_files']);
        $file= $request->video;
        $extention = $file->getClientOriginalName();
        $file->move(public_path('uploads'), $extention);

        $video->video = $extention;
        $video->save();
        return redirect()->route('createForm')
        ->with('success','Item created successfully!');
   }else {
        return back()->with('danger','No Item created!');
   }


  }

//   public function showVideo()
//   {
//       $data = Video::select('title','video')->get();
//       return view('uploadVideo', compact('data'));
//   }
}
