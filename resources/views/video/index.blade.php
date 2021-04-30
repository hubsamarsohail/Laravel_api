@extends('layouts.app')

@section('content')



<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Videos
                        <small></small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Videos</li></a>
                    <li class="breadcrumb-item active">Video list</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->

<div class="card">
    <div class="row">
        <div class="col-6">
        </div>
        <div class="col-3">
        </div>
        <div class="col-3">
            <a href="{{route('upload/index')}}" class="btn btn-primary pull-right " style="margin-top: 4%; margin-right:4%">Upload video</a>
        </div>
    </div>
    <div class="card-header">



    </div>
    <div class="card-body">

        <table class="table" id="basic-1">

            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Duration</th>
                    <th>Video</th>
                </tr>
            </thead>
            <tbody>
                @foreach($videos as $video )
                <tr>
                    <td>{{$video->id}}</td>
                    <td>{{$video->title}}</td>
                    <td>{{$video->description}} </td>
                    <td>{{$video->duration}} </td>
                    <td>  <video width="250" controls>
                        <source src="{{URL::asset('/uploads/videos/'.$video->video_path)}}" type="video/mp4">
                    </video></td>
                   
                </tr>
                @endforeach

            </tbody>
        </table>

    </div>
</div>

@endsection