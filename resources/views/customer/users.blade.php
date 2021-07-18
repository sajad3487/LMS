@extends('layouts.customer.master')

@section('content')


    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">


        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">


                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">
                                Users
                                {{--                                <span class="d-block text-muted pt-2 font-size-sm">This page shows Customers info</span>--}}
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a class="btn btn-primary font-weight-bolder"  data-toggle="modal" data-target="#new_company">
                                    <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <rect x="0" y="0" width="24" height="24"/>
                                        <circle fill="#000000" cx="9" cy="15" r="6"/>
                                        <path
                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"
                                            fill="#000000" opacity="0.3"/>
                                    </g>
                                </svg><!--end::Svg Icon--></span>
                                New User
                            </a>
                            <!--end::Button-->
                            <!--begin::Modal-->
                            <div class="modal fade" id="new_company" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add New Company</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>


                                        <form class="form" action="{{url("/user/store")}}" method="post">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>Name:</label>
                                                        <input type="text" name="name" class="form-control" placeholder="Enter name" />
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>Phone Number:</label>
                                                        <input type="text" name="tel" class="form-control" placeholder="Enter phone number"  />
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>Address:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="address" class="form-control" placeholder="Enter user address"  />
                                                            <div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker"></i></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>Position:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="position" class="form-control" placeholder="Enter company website"  />
                                                            <div class="input-group-append"><span class="input-group-text"><i class="flaticon2-wifi "></i></span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>Email:</label>
                                                        <div class="input-group">
                                                            <input type="email" name="email" class="form-control" placeholder="Enter user email"   />
                                                            <div class="input-group-append"><span class="input-group-text"><i class="la la-bookmark-o"></i></span></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>Password:</label>
                                                        <div class="input-group">
                                                            <input type="password" name="password" class="form-control" placeholder="Enter the password"   />
                                                            <div class="input-group-append"><span class="input-group-text"><i class="flaticon-lock "></i></span></div>
                                                        </div>
                                                    </div>
                                                    <input type="number" name="user_type" value="3" class="d-none">
                                                    <input type="text" name="business_name" value="" class="d-none">
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label class="">Company:</label>
                                                        <div class="input-group">
                                                            <select  name="company_id" class="form-control selectpicker" data-size="7" data-live-search="true">
                                                                <option value="" selected>Select</option>
                                                                @foreach($companies as $company)3
                                                                    <option value="{{$company->id}}" >{{$company->name ?? ''}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                                    </div>
                                                    <div class="col-lg-6 text-right">
                                                        <button type="submit" class="btn btn-success mr-2">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                    </div>
                                </div>
                            </div>
                            <!--end::Modal-->
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="overflow-auto">
                            <!--begin: Datatable-->
                            <table class="table table-separate table-head-custom table-checkable text-center" id="kt_datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Tel</th>
                                    <th>Address</th>
                                    <th>Position</th>
                                    <th>Company</th>
                                    <th>User Type</th>
{{--                                    <th>Average Score</th>--}}
{{--                                    <th>Average Percentage</th>--}}
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($users as $key=>$user)
                                <tr class="text-center">
                                    <td>{{$key+1 ?? ''}}</td>
                                    <td>{{$user->name ?? ''}}</td>
                                    <td>{{$user->email ?? ''}}</td>
                                    <td>{{$user->tel ?? '-'}}</td>
                                    <td>{{$user->address ?? '-'}}</td>
                                    <td>{{$user->position ?? '-'}}</td>
                                    <td>{{$user->company->name ?? '-'}}</td>
                                    <td>
                                        @if($user->user_type == 2)
                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">
                                                Coaching Executive
                                            </span>
                                            @elseif($user->user_type == 3)
                                            <span class="label label-lg font-weight-bold label-light-success label-inline">
                                                User
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="" data-toggle="modal" data-target="#add_company{{$key}}"><i class="flaticon-users text-info mr-5"></i></a>
                                        <a href="" data-toggle="modal" data-target="#edit_user{{$key}}"><i class="flaticon-edit text-warning mr-5"></i></a>
                                        <a href="" data-toggle="modal" data-target="#delete-{{$key}}"><i class="fas fa-trash-alt text-danger mr-5"></i></a>
                                    </td>
                                    <!--begin::Modal-->
                                    <div class="modal fade" id="edit_user{{$key}}" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add New Company</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>


                                                <form class="form" action="{{url("/user/$user->id/update")}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>Name:</label>
                                                                <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{$user->name ?? ''}}"/>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Phone Number:</label>
                                                                <input type="text" name="tel" class="form-control" placeholder="Enter phone number"  value="{{$user->tel ?? ''}}"/>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>Address:</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="address" class="form-control" placeholder="Enter user address"  value="{{$user->address ?? ''}}"/>
                                                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker"></i></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Email:</label>
                                                                <div class="input-group">
                                                                    <input type="email" name="email" class="form-control" placeholder="Enter company email"  value="{{$user->email ?? ''}}" disabled/>
                                                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-bookmark-o"></i></span></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>Position:</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="position" class="form-control" placeholder="Enter company website"  value="{{$user->position ?? ''}}"/>
                                                                    <div class="input-group-append"><span class="input-group-text"><i class="flaticon2-wifi "></i></span></div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label for="exampleSelect1">Example select</label>
                                                                <select class="form-control" id="exampleSelect1">
                                                                    <option @if($user->user_type == 3) selected @endif>User</option>
                                                                    <option @if($user->user_type == 2) selected @endif>Coaching Executive</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <button type="reset" class="btn btn-secondary">Cancel</button>
                                                            </div>
                                                            <div class="col-lg-6 text-right">
                                                                <button type="submit" class="btn btn-success mr-2">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Modal-->
                                    <!--begin::Modal-->
                                    <div class="modal fade" id="add_company{{$key}}" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add New Company</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>


                                                <form class="form" action="{{url("/user/$user->id/add_company")}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <label class="col-form-label text-right col-lg-2 col-sm-12">Company:</label>
                                                            <div class="col-lg-4 col-md-10 col-sm-12">
                                                                <select  name="company_id" class="form-control selectpicker" data-size="7" data-live-search="true">
                                                                    {{--                                                                        <option value="">Select</option>--}}
                                                                    @foreach($companies as $company)
                                                                        <option value="{{$company->id}}" @if($user->company != null && $user->company->id == $company->id) selected @endif >{{$company->name ?? ''}}</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="form-text text-muted">Select company for the user</span>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <button type="reset" class="btn btn-secondary">Cancel</button>
                                                            </div>
                                                            <div class="col-lg-6 text-right">
                                                                <button type="submit" class="btn btn-success mr-2">Save</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Modal-->
                                </tr>

                                <!--begin::Modal-->
                                <div class="modal fade" id="delete-{{$key}}" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Delete Quiz : {{$user->name ?? ''}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!--begin::Form-->
                                                <div class="card-body text-center">
                                                    <h3 class="mb-4">Are you sure you want to delete "{{$user->name ?? ''}}" ?</h3>
                                                    <p class="my-4">This quiz will be deleted immediately. You can't undo this action</p>
                                                    <button data-dismiss="modal" aria-label="Close" class="btn btn-light font-weight-bolder mr-5">
                                                        Cancel
                                                    </button>
                                                    <a href="{{url("/user/$user->id/delete")}}" class="btn btn-danger font-weight-bolder">
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--end::Modal-->
                                @endforeach

                                </tbody>

                            </table>
                            <!--end: Datatable-->
                        </div>
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



