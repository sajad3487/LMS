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
                                Orders
{{--                                <span class="d-block text-muted pt-2 font-size-sm">This page shows Customers info</span>--}}
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <a href="{{url('/quizzes/create')}}" class="btn btn-primary font-weight-bolder">
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
                                </svg><!--end::Svg Icon--></span> New Quiz
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
                                    <th>Quiz ID</th>
                                    <th>Date Created</th>
                                    <th>Status</th>
                                    <th>Taken</th>
                                    <th>Average Score</th>
                                    <th>Average Percentage</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($quizzes as $quiz)
                                <tr class="text-center">
                                    <td>{{$quiz->id ?? ''}}</td>
                                    <td>{{$quiz->created_at ?? ''}}</td>
                                    <td>
                                        @if($quiz->status == 1)
                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">
                                                Active
                                            </span>
                                        @elseif($quiz->status == 0)
                                            <span class="label label-lg font-weight-bold label-light-success label-inline">
                                                Deactivated
                                            </span>
                                        @endif
                                    </td>
                                    <td>{{$quiz->taken ?? ''}}</td>
                                    <td>{{$quiz->average_score ?? ''}}</td>
                                    <td>{{$quiz->average_percentage ?? ''}}</td>
                                    <td>
                                        <a href="{{url("quizzes/$quiz->id/edit")}}"><i class="far fa-edit text-warning mr-5"></i></a>
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



