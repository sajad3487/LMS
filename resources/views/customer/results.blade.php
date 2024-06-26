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
                            Result Segments
                                <span class="d-block text-muted pt-2 font-size-sm">Quiz title : {{$quiz->title ?? ''}}</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{url("segments/$quiz->id/create")}}" class="btn btn-primary font-weight-bolder">
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
                                </svg><!--end::Svg Icon--></span> New Segments
                            </a>
                            <!--end::Button-->
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="overflow-auto">
                            <!--begin: Datatable-->
                            <table class="table table-separate table-head-custom table-checkable text-center" id="kt_datatable">
                                <thead>
                                <tr>
                                    <th>Min Score</th>
                                    <th>Max Score</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Media</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($results as $key=>$result)
                                <tr class="text-center">
                                    <td>{{$result->min_score ?? ''}}</td>
                                    <td>{{$result->max_score ?? ''}}</td>
                                    <td>{{$result->segment_title ?? ''}}</td>
                                    <td>
                                        <button type="button" class="btn btn-light-success font-weight-bold ml-2" data-toggle="modal" data-target="#body-{{$key}}">
                                            <i class="flaticon-eye"></i>View
                                        </button>

                                        <!-- Modal-->
                                        <div class="modal fade" id="body-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" style="max-width: 60%" role="document">
                                                <div class="modal-content">
{{--                                                    <div class="modal-header">--}}
{{--                                                        <h5 class="modal-title" id="exampleModalLabel">Question : {{$question['body'] ?? ''}}</h5>--}}
{{--                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                            <i aria-hidden="true" class="ki ki-close"></i>--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
                                                    <div class="modal-body">
                                                        <div data-scroll="true" data-height="300">
                                                            <div class="text-left px-10 pt-10">
                                                                {!! $result->result_body ?? '' !!}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <img src="{{$result->result_media ?? ''}}" class="w-100px h-100px" alt="">
                                    </td>
                                    <td>
                                        @if($result->status == 1)
                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">
                                                Active
                                            </span>
                                        @elseif($result->status == 0)
                                            <span class="label label-lg font-weight-bold label-light-success label-inline">
                                                Deactivated
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{url("segments/$result->id/edit")}}"><i class="flaticon-edit text-warning mr-5"></i></a>
                                        <a href="{{url("segments/$result->id/delete")}}"><i class="flaticon-delete text-danger mr-5"></i></a>
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



