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
                                Companies
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
                                New Company
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


                                        <form class="form" action="{{url('/company/store')}}" method="post">
                                            @csrf
                                            <div class="card-body">
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>Company Name:</label>
                                                        <input type="text" name="name" class="form-control" placeholder="Enter company name"/>
                                                        <span class="form-text text-muted">Please enter the company name</span>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>Phone Number:</label>
                                                        <input type="text" name="phone" class="form-control" placeholder="Enter phone number"/>
                                                        <span class="form-text text-muted">Please enter the phone number</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>Address:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="address" class="form-control" placeholder="Enter company address"/>
                                                            <div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker"></i></span></div>
                                                        </div>
                                                        <span class="form-text text-muted">Please enter company address</span>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label>Email:</label>
                                                        <div class="input-group">
                                                            <input type="email" name="email" class="form-control" placeholder="Enter company email"/>
                                                            <div class="input-group-append"><span class="input-group-text"><i class="la la-bookmark-o"></i></span></div>
                                                        </div>
                                                        <span class="form-text text-muted">Please enter company email</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-lg-6">
                                                        <label>Website:</label>
                                                        <div class="input-group">
                                                            <input type="text" name="website" class="form-control" placeholder="Enter company website"/>
                                                            <div class="input-group-append"><span class="input-group-text"><i class="flaticon2-wifi "></i></span></div>
                                                        </div>
                                                        <span class="form-text text-muted">Please enter company website</span>
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
                                    <th>Company Name</th>
                                    <th>Tel</th>
                                    <th>Address</th>
                                    <th>Website</th>
                                    <th>Email</th>
{{--                                    <th>Average Score</th>--}}
{{--                                    <th>Average Percentage</th>--}}
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($companies as $key=>$company)
                                <tr class="text-center">
                                    <td>{{$key+1 ?? ''}}</td>
                                    <td>{{$company->name ?? ''}}</td>
                                    <td>{{$company->phone ?? ''}}</td>
                                    <td>{{$company->address ?? ''}}</td>
                                    <td>{{$company->website ?? ''}}</td>
                                    <td>{{$company->email ?? ''}}</td>
                                    <td>
                                        <a  data-toggle="modal" data-target="#edit_company{{$key}}"><i class="flaticon-edit text-warning mr-5"></i></a>
                                        <a href="" data-toggle="modal" data-target="#delete-{{$key}}"><i class="fas fa-trash-alt text-danger mr-5"></i></a>
                                    </td>
                                    <!--begin::Modal-->
                                    <div class="modal fade" id="edit_company{{$key}}" role="dialog"  aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Add New Company</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                    </button>
                                                </div>


                                                <form class="form" action="{{url("/company/$company->id/update")}}" method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="card-body">
                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>Company Name:</label>
                                                                <input type="text" name="name" class="form-control" placeholder="Enter company name" value="{{$company->name ?? ''}}"/>
                                                                <span class="form-text text-muted">Please enter the company name</span>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Phone Number:</label>
                                                                <input type="text" name="phone" class="form-control" placeholder="Enter phone number"  value="{{$company->phone ?? ''}}"/>
                                                                <span class="form-text text-muted">Please enter the phone number</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>Address:</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="address" class="form-control" placeholder="Enter company address"  value="{{$company->address ?? ''}}"/>
                                                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-map-marker"></i></span></div>
                                                                </div>
                                                                <span class="form-text text-muted">Please enter company address</span>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <label>Email:</label>
                                                                <div class="input-group">
                                                                    <input type="email" name="email" class="form-control" placeholder="Enter company email"  value="{{$company->email ?? ''}}"/>
                                                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-bookmark-o"></i></span></div>
                                                                </div>
                                                                <span class="form-text text-muted">Please enter company email</span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <div class="col-lg-6">
                                                                <label>Website:</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="website" class="form-control" placeholder="Enter company website"  value="{{$company->website ?? ''}}"/>
                                                                    <div class="input-group-append"><span class="input-group-text"><i class="flaticon2-wifi "></i></span></div>
                                                                </div>
                                                                <span class="form-text text-muted">Please enter company website</span>
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
                                                <h5 class="modal-title">Delete Quiz : {{$company->name ?? ''}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!--begin::Form-->
                                                <div class="card-body text-center">
                                                    <h3 class="mb-4">Are you sure you want to delete "{{$company->name ?? ''}}" ?</h3>
                                                    <p class="my-4">This quiz will be deleted immediately. You can't undo this action</p>
                                                    <button data-dismiss="modal" aria-label="Close" class="btn btn-light font-weight-bolder mr-5">
                                                        Cancel
                                                    </button>
                                                    <a href="{{url("/company/$company->id/delete")}}" class="btn btn-danger font-weight-bolder">
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



