@extends('admin.admin_master')
@section('admin')



<div class="page-content">
    <div class="container-fluid">

        <div class="row">


            <div class="col-8">
                <div class="card">
                    <div class="card-body">

                        <form method="POST" action="{{route('update.password')}}">

                            @csrf

                            <h4 class="card-title">Change Password</h4> <br> <br>

                            @if (count($errors))

                                @foreach ($errors->all() as $error)
                                    <p class="alert alert-danger">
                                        {{$error}}
                                    </p>
                                @endforeach

                            @endif

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input value="" class="form-control" name="old_password" type="password" placeholder="Artisanal kale" id="example-text-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input value="" class="form-control" name="new_password" type="password" placeholder="Artisanal kale" id="example-text-input">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input value="" class="form-control" name="confiram_password" type="password" placeholder="Artisanal kale" id="example-text-input">
                                </div>
                            </div>


                            <input type="submit" value="Change Password" class="btn btn-success" name="" id="">
                        </form>

                    </div>
                </div>
            </div>


        </div>
    </div>
</div>




@endsection
