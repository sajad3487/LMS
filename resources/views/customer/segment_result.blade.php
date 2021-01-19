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
                            Quiz Segments
{{--                                <span class="d-block text-muted pt-2 font-size-sm">This page shows Customers info</span>--}}
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{url('/')}}" class="btn btn-primary font-weight-bolder">
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
                                </svg><!--end::Svg Icon--></span> Export
                            </a>
                            <!--end::Button-->
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="overflow-auto">
                            <!--begin: Datatable-->
                            <table class="table table-separate table-head-custom table-checkable " id="kt_datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Segment Title</th>
                                    <th>Min & Max Score</th>
                                    <th>Users</th>
                                    <th>Average Score</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($segments as $key=>$segment)
                                <tr class="">
                                    <td>{{$key + 1 ?? ''}}</td>
                                    <td>{{$segment['segment_title'] ?? ''}}</td>
                                    <td>{{$segment['min_score'] ?? ''}} - {{$segment['max_score'] ?? ''}}</td>
                                    <td>{{$segment['achieved'] ?? ''}}</td>
                                    <td>{{$segment['average_score'] ?? ''}}</td>
                                    <td>
                                        <!-- Button trigger modal-->
                                        <button type="button" class="btn btn-light-info font-weight-bold" data-toggle="modal" data-target="#users-{{$key}}">
                                            Users
                                        </button>
{{--                                        <button type="button" class="btn btn-light-success font-weight-bold" data-toggle="modal" data-target="#option-{{$key}}">--}}
{{--                                            Options--}}
{{--                                        </button>--}}

                                        <!-- Modal-->
                                        <div class="modal fade" id="users-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">User of this range : {{$segment['min_score'] ?? ''}} - {{$segment['max_score'] ?? ''}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div data-scroll="true" data-height="300">
                                                            <table class="table table-separate table-head-custom table-checkable " id="kt_datatable">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>First Name</th>
                                                                    <th>Last Name</th>
                                                                    <th>Email</th>
                                                                    <th>Score</th>
                                                                    <th>Date</th>

                                                                </tr>
                                                                </thead>

                                                                <tbody>
                                                                @foreach($segment['users'] as $users_key => $visitor)
                                                                    <tr class="">
                                                                        <td>{{$users_key +1 ?? ''}}</td>
                                                                        <td>{{$visitor['first_name'] ?? ''}}</td>
                                                                        <td>{{$visitor['last_name'] ?? ''}}</td>
                                                                        <td>{{$visitor['email'] ?? ''}}</td>
                                                                        <td>{{$visitor['score'] ?? ''}}</td>
                                                                        <td>{{ \Carbon\Carbon::parse($visitor['created_at'])->format('Y-m-d - H:i')?? ''}}</td>
                                                                    </tr>
                                                                @endforeach

                                                                </tbody>

                                                            </table>
                                                            <div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
{{--                                        <div class="modal fade" id="option-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">--}}
{{--                                            <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%" role="document">--}}
{{--                                                <div class="modal-content">--}}
{{--                                                    <div class="modal-header">--}}
{{--                                                        <h5 class="modal-title" id="exampleModalLabel">Question : {{$segment['body'] ?? ''}}</h5>--}}
{{--                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                            <i aria-hidden="true" class="ki ki-close"></i>--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="modal-body">--}}
{{--                                                        <div data-scroll="true" data-height="300">--}}
{{--                                                            <table class="table table-separate table-head-custom table-checkable " id="kt_datatable">--}}
{{--                                                                <thead>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th>#</th>--}}
{{--                                                                    <th>Option Body</th>--}}
{{--                                                                    <th>Score</th>--}}
{{--                                                                    <th>Choosed</th>--}}
{{--                                                                    <th>Average Percentage (%)</th>--}}
{{--                                                                    <th>Status</th>--}}

{{--                                                                </tr>--}}
{{--                                                                </thead>--}}

{{--                                                                <tbody>--}}
{{--                                                                @foreach($segment['option'] as $option_key => $option)--}}
{{--                                                                    <tr class="">--}}
{{--                                                                        <td>{{$option_key+1 ?? ''}}</td>--}}
{{--                                                                        <td>{{$option['body']?? ''}}</td>--}}
{{--                                                                        <td>{{$option['score'] ?? ''}}</td>--}}
{{--                                                                        <td>{{$option['choosed'] ?? ''}}</td>--}}
{{--                                                                        <td>{{$option['average_percentage'] ?? ''}} %</td>--}}
{{--                                                                        <td>{{$option['status'] ?? ''}}</td>--}}
{{--                                                                    </tr>--}}
{{--                                                                @endforeach--}}

{{--                                                                </tbody>--}}

{{--                                                            </table>--}}
{{--                                                            <div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                    </td>
                                </tr>
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



