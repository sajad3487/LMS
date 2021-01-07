@extends('layouts.admin.master')

@section('content')


    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">


        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::Notice-->

                <!--end::Notice-->

                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">
                                Customers
                                <span class="d-block text-muted pt-2 font-size-sm">This page shows Customers info</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">

                        </div>
                    </div>

                    <div class="card-body">
                        <!--begin: Datatable-->
                        <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                            <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Profile Pic</th>
                                <th>Actions</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td>{{$customer->id}}</td>
                                <td>{{$customer->name}}</td>
                                <td>{{$customer->email}}</td>
                                <td>{{$customer->tel}}</td>
                                <td>
{{--                                    {{$customer->profile_picture}}--}}


                                    <div class="image-input image-input-outline"  id="kt_image_1">
                                        <a href="{{asset($customer->profile_picture)}}" target="_blank"><div class="image-input-wrapper" style="background-image: url({{asset($customer->profile_picture)}}); width: 50px;height: 50px"></div></a>



                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                        <i class="ki ki-bold-close icon-xs text-muted"></i>
                                    </span>
                                    </div>


                                </td>
                                <td>
                                    <a href="{{url("admin/users/$customer->id/orders")}}"><i class="fas fa-shopping-basket text-success mr-5"></i></a>
                                    <a href="{{url("admin/users/address/$customer->id")}}"><i class="fas fa-address-book text-primary mr-5"></i></a>
                                    <a href="{{url("admin/users/$customer->id/edit")}}"><i class="far fa-edit text-warning mr-5"></i></a>
{{--                                    <a href="{{url("admin/users/$customer->id/delete")}}"><i class="fas fa-trash-alt text-danger mr-5"></i></a>--}}
                                </td>
                            </tr>
                            @endforeach

                            </tbody>

                        </table>
                        <!--end: Datatable-->
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->


@endsection



