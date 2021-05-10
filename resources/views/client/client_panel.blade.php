@extends('layouts.client.master')
@section('content')
    <!--begin::Profile Email Settings-->
    <div class="d-flex flex-row">
        @include('layouts.client.sidebar')

        <!--begin::Content-->
        <div class="flex-row-fluid ml-lg-8">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">Profile</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Change your profile information</span>
                    </div>

                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form class="form" action="{{url("/admin/users/updateProfile")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body row">
                        <div class="col-lg-12">
                            @include('fragment.error')

                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label text-right">Name :</label>
                                <div class="col-lg-3">
                                    <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{$customer->name  ?? ''}}" required/>
                                </div>
                                <label class="col-lg-2 col-form-label text-right">Name :</label>
                                <div class="col-lg-3">
                                    <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{$customer->name  ?? ''}}" required/>
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label text-right">Email :</label>
                                <div class="col-lg-3">
                                    <input type="text" name="email" class="form-control" placeholder="Enter your email" value="{{$customer->email  ?? ''}}" disabled/>
                                </div>
                                <label class="col-lg-2 col-form-label text-right">Company :</label>
                                <div class="col-lg-3">
                                    <input type="text" name="business_name" class="form-control" placeholder="Enter your business name" value="{{$customer->business_name  ?? ''}}" required/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label text-right">Position :</label>
                                <div class="col-lg-3">
                                    <input type="text" name="business_name" class="form-control" placeholder="Enter your business name" value="{{$customer->business_name  ?? ''}}" required/>
                                </div>
                                <label class="col-lg-2 col-form-label text-right">Profile Picture :</label>
                                <div class="col-lg-3">
                                    <div class="input-group">
                                        <input type="file" name="file" class="custom-file-input" id="customFile"/>
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-5"></div>
                            <div class="col-lg-7">
                                <a href="{{url('/admin/users')}}" type="reset" class="btn btn-secondary col-md-2 mr-2">Back</a>
                                <button type="submit" class="btn btn-success col-md-2">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Profile Email Settings-->



@endsection
