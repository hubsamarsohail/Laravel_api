<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use Image;
use Validator;
use getID3;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class VidoeController extends Controller
{
    public function index()
    {
        $videos = Video::get();
        return view('video.index', compact('videos'));
    }

    public function create_index()
    {
        return view('video.create');
    }

    public function upload_video(Request  $request)
    {
        $this->validate($request,[
            'title' => 'Required',
            'description' => 'Required',
            'video_path' => 'required|file|max:20000',
        ]);
       
     
        $requestdata = $request->all();
        $requestdata = request()->except(['_token']);
        $video = $requestdata['video_path'];
        $getID3 = new getID3;
        $file = $getID3->analyze($video);
        $duration = date('H:i:s.v', $file['playtime_seconds']);
        
        
        $input = time() . $video->getClientOriginalExtension();
        $destinationPath = 'uploads/videos';
        $video->move($destinationPath, $input);
        $requestdata['video_path']  = $input;
        $requestdata['duration']  = $duration;
        $video = Video::create($requestdata);
        Session::flash('success', 'Video Uploaded Successfully!');
        return redirect()->back();
    }


    public function store(Request $request){
       

        $validator = Validator::make($request->all(), [
            'title' => 'Required',
            'description' => 'Required',
            'video_path' => 'required|file|max:20000',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
       
     
        $requestdata = $request->all();
        $requestdata = request()->except(['_token']);
        $video = $requestdata['video_path'];
        $getID3 = new getID3;
        $file = $getID3->analyze($video);
        $duration = date('H:i:s.v', $file['playtime_seconds']);
        
        
        $input = time() . $video->getClientOriginalExtension();
        $destinationPath = 'uploads/videos';
        $video->move($destinationPath, $input);
        $requestdata['video_path']  = $input;
        $requestdata['duration']  = $duration;
        $data = Video::create($requestdata);

        $response['status'] = !empty($data) ? 200 : 204;
         return json_encode($response);
    }

    public function show(){
     $videos =     Video::paginate(10);

     foreach ($videos as $key) {
       $key->video_path = 'uploads/videos/'.$key->video_path;
     }

     $response['status'] = !empty($videos) ? 200 : 204;
     $response['data'] =    $videos;
     return json_encode($response);
    }
}
