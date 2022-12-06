@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">


            <div class="col-8">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{route('store.profile')}}" enctype="multipart/form-data">

                            @csrf

                            <h4 class="card-title">Home Slider Page</h4> <br> <br>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input value="{{ $homeSlide->title }}" class="form-control" name="title" type="text" placeholder="Artisanal kale" id="example-text-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Discription</label>
                                <div class="col-sm-10">
                                    <input value="{{ $homeSlide->short_disc }}" class="form-control" name="short_disc" type="text" placeholder="Artisanal kale" id="example-text-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Video Url</label>
                                <div class="col-sm-10">
                                    <input value="{{ $homeSlide->video_url }}" class="form-control" name="video_url" type="text" placeholder="Artisanal kale" id="example-text-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="slider_image" type="file" placeholder="Artisanal kale" id="image">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Slider Image</label>
                                <div class="col-sm-10">
                                    <img id="showimage" class="card-img-top img-fluid img-thumbnail" src="{{(!empty($homeSlide->slider_image)) ? url('upload/home_slider/'.$homeSlide->slider_image) : url('upload/nophoto.jpg')}}" alt="Card image cap" style="width:200px">
                                </div>
                            </div>
                            <!-- end row -->

                            <input type="submit" value="Update Slide" class="btn btn-success" name="" id="">
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showimage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>

@endsection
