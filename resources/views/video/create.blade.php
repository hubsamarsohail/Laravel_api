@extends('layouts.app')

@section('content')



<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-lg-6">
                <div class="page-header-left">
                    <h3>Upload Video
                        <small></small>
                    </h3>
                </div>
            </div>
            <div class="col-lg-6">
                <ol class="breadcrumb pull-right">
                    <li class="breadcrumb-item"><a href=""><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"> <a href="">Upload Video </a></li>
                    <li class="breadcrumb-item active">Upload Video</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->

<!-- Container-fluid starts-->

<div class="card">


    <div class="card-header">



    </div>
    <div class="card-body">

        <div class="card-body">
            <div class="tab-content">
                <form action="{{route('upload/video')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-6 col-md-6">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" value="{{old('title')}}" class="form-control required  @error('title') is-invalid @enderror" id="" name="title" placeholder="Enter Title">
                            </div>
                            @error('title')
                            <div class="alert" style="color:red">Please Enter Title</div>
                            @enderror
                        </div>
                        <div class="col-6 col-md-6">
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" value="{{old('description')}}" class="form-control required  @error('description') is-invalid @enderror" id="" name="description" placeholder="Enter Description">
                            </div>
                            @error('description')
                            <div class="alert" style="color:red">Please Enter Description</div>
                            @enderror
                        </div>

                    </div>

                    <div class="row">


                        <div class="col-6 col-md-6">
                            <div class="form-group">
                                <label>Upload Video</label>
                                <input type="file"   class="form-control required  @error('video_path') is-invalid @enderror" id="" name="video_path">
                            </div>
                            @error('video_path')
                            <div class="alert" style="color:red">Please Upload Video Minimum 20 mb</div>
                            @enderror
                        </div>

                        <!-- 
                        <div class="col-6 col-md-6">
                            <div class="form-group">
                                <label>Address </label>
                                <input type="text" value="" class="form-control required  @error('address') is-invalid @enderror" id="" name="address" placeholder="Enter Address">
                            </div>
                        </div> -->



                    </div>


                    <div>
                        <button type="submit" class="btn btn-success pull-right">Publish</button>
                    </div>
                </form>
            </div>

        </div>

    </div>

</div>


@endsection