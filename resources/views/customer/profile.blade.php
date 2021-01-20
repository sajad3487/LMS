@extends('layouts.customer.master')
@section('content')
    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Profile
                                </h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" action="{{url("/profile/update")}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body row">
                                    <div class="col-lg-12">
                                        @include('fragment.error')

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-right">Full Name :</label>
                                            <div class="col-lg-3">
                                                <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{$user->name  ?? ''}}" required/>
                                            </div>
                                            <label class="col-lg-2 col-form-label text-right">Business Name :</label>
                                            <div class="col-lg-3">
                                                <input type="text" name="business_name" class="form-control" placeholder="Enter your business name" value="{{$user->business_name  ?? ''}}" required/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-right">Email :</label>
                                            <div class="col-lg-3">
                                                <input type="text" name="email" class="form-control" placeholder="Enter your email" value="{{$user->email  ?? ''}}" disabled/>
                                            </div>
                                            <label class="col-lg-2 col-form-label text-right">Phone Number :</label>
                                            <div class="col-lg-3">
                                                <input type="text" name="tel" class="form-control" placeholder="Enter phone number" value="{{$user->tel  ?? ''}}"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-right">Address :</label>
                                            <div class="col-lg-8">
                                                <input type="text" name="address" class="form-control" placeholder="Enter your address" value="{{$user->address  ?? ''}}" />
                                            </div>
                                        </div>


                                    </div>


                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-5"></div>
                                        <div class="col-lg-7">
                                            <button type="submit" class="btn btn-success col-md-2 w-100px">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card-->

                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

    @endsection
