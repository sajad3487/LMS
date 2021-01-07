@extends('layouts.admin.master')
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
                                    Admin
                                </h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" action="
                                @if(!isset($admin))
                                    {{url("/admin/store")}}
                                @else
                                    {{url("/admin/$admin->id/update")}}
                                @endif
                                " method="post" enctype="multipart/form-data">
                                @csrf
                                @if(isset($admin))
                                    @method('PUT')
                                @endif
                                <div class="card-body row">
                                    <div class="col-lg-9">
                                        @include('fragment.error')

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-right">Full Name :</label>
                                            <div class="col-lg-3">
                                                <input type="text" name="name" class="form-control" placeholder="Enter your name" value="{{$admin->name  ?? ''}}" required/>
                                            </div>
                                            <label class="col-lg-2 col-form-label text-right">Phone Number :</label>
                                            <div class="col-lg-3">
                                                <input type="text" name="tel" class="form-control" placeholder="Enter phone number" value="{{$admin->tel  ?? ''}}"/>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-right">Email :</label>
                                            <div class="col-lg-3">
                                                <input type="text" name="email" class="form-control" placeholder="Enter your email" value="{{$admin->email  ?? ''}}" @if(isset($admin)) disabled @else required @endif/>
                                            </div>
                                        </div>
                                        @if(!isset($admin))
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-right">Password :</label>
                                            <div class="col-lg-3">
                                                <input type="password" name="password" class="form-control" placeholder="Enter your pasword"/>
                                            </div>
                                        </div>
                                            @endif
                                    </div>
                                    <div class="col-lg-3">
                                        <img src="@if(isset($admin)){{asset($admin->profile_picture)}}@endif" alt="" style="width: 100%">
                                    </div>

                                </div>

                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-5"></div>
                                        <div class="col-lg-7">
                                            <a href="{{url('/admin/show')}}" type="reset" class="btn btn-secondary col-md-2 mr-2">Back</a>
                                            <button type="submit" class="btn btn-success col-md-2">Save</button>
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
