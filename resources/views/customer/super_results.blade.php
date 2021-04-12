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
                                <span class="d-block text-muted pt-2 font-size-sm">Assessment title : {{$super_quiz->title ?? ''}}</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">

                        </div>
                    </div>

                    <div class="card-body">
                        <!--begin::Example-->
                        <div class="example">

                            <div>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home">
                                            <span class="nav-icon"><i class="flaticon-exclamation-square "></i></span>
                                            <span class="nav-text">Assessment Segments</span>
                                        </a>
                                    </li>
                                    @foreach($super_quiz->quiz as $quiz)
                                        <li class="nav-item">
                                            <a class="nav-link " id="quiz-{{$quiz->id}}-tab" data-toggle="tab" href="#quiz-{{$quiz->id}}">
                                                <span class="nav-icon"><i class="flaticon-more-v6 "></i></span>
                                                <span class="nav-text">{{$quiz->title ?? ''}}</span>
                                            </a>
                                        </li>

                                        @endforeach

                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                         aria-labelledby="home-tab">
                                        <!--begin::Button-->
                                        <div class="text-right mt-3">
                                            <a href="{{url("segments/$super_quiz->id/create")}}" class="btn btn-info font-weight-bolder">
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
                                        </div>
                                        <!--end::Button-->
                                        <div class="px-5 mt-5">
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
                                                    @foreach($super_quiz->segment as $key=>$result)
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
                                    @foreach($super_quiz->quiz as $quizKey=>$quiz)
                                        <div class="tab-pane fade" id="quiz-{{$quiz->id}}" role="tabpanel"
                                             aria-labelledby="quiz-{{$quiz->id}}-tab">
                                            <!--begin::Button-->
                                            <div class="text-right mt-3">
                                                <a href="{{url("super_segments/$quiz->id/create")}}" class="btn btn-info font-weight-bolder">
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
                                            </div>
                                            <!--end::Button-->
                                            <div class="px-5 mt-5">
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
                                                        @foreach($quiz->segment as $subQuizKey=>$subquiz_result)
                                                            <tr class="text-center">
                                                                <td>{{$subquiz_result->min_score ?? ''}}</td>
                                                                <td>{{$subquiz_result->max_score ?? ''}}</td>
                                                                <td>{{$subquiz_result->segment_title ?? ''}}</td>
                                                                <td>
                                                                    <button type="button" class="btn btn-light-success font-weight-bold ml-2" data-toggle="modal" data-target="#subquiz-{{$quizKey}}-{{$subQuizKey}}">
                                                                        <i class="flaticon-eye"></i>View
                                                                    </button>

                                                                    <!-- Modal-->
                                                                    <div class="modal fade" id="subquiz-{{$quizKey}}-{{$subQuizKey}}" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                                                        <div class="modal-dialog modal-dialog-scrollable" style="max-width: 60%" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-body">
                                                                                    <div data-scroll="true" data-height="300">
                                                                                        <div class="text-left px-10 pt-10">
                                                                                            {!! $subquiz_result->result_body ?? '' !!}
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <img src="{{$subquiz_result->result_media ?? ''}}" class="w-100px h-100px" alt="">
                                                                </td>
                                                                <td>
                                                                    @if($subquiz_result->status == 1)
                                                                        <span class="label label-lg font-weight-bold label-light-primary label-inline">
                                                                        Active
                                                                    </span>
                                                                    @elseif($subquiz_result->status == 0)
                                                                        <span class="label label-lg font-weight-bold label-light-success label-inline">
                                                                        Deactivated
                                                                    </span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a href="{{url("super_segments/$subquiz_result->id/edit")}}"><i class="flaticon-edit text-warning mr-5"></i></a>
                                                                    <a href="{{url("segments/$subquiz_result->id/delete")}}"><i class="flaticon-delete text-danger mr-5"></i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>

                                                    </table>
                                                    <!--end: Datatable-->
                                                </div>
                                            </div>
                                        </div>

                                        @endforeach

                                </div>
                            </div>

                        </div>
                        <!--end::Example-->

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



