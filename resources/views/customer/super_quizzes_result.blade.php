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
                            Quizzes Results
{{--                                <span class="d-block text-muted pt-2 font-size-sm">This page shows Customers info</span>--}}
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
{{--                            <a href="{{url('/quizzes/create')}}" class="btn btn-primary font-weight-bolder">--}}
{{--                                    <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg--}}
{{--                                            xmlns="http://www.w3.org/2000/svg"--}}
{{--                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                            viewBox="0 0 24 24" version="1.1">--}}
{{--                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                        <rect x="0" y="0" width="24" height="24"/>--}}
{{--                                        <circle fill="#000000" cx="9" cy="15" r="6"/>--}}
{{--                                        <path--}}
{{--                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"--}}
{{--                                            fill="#000000" opacity="0.3"/>--}}
{{--                                    </g>--}}
{{--                                </svg><!--end::Svg Icon--></span> New Quiz--}}
{{--                            </a>--}}
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
                                    <th>Title</th>
                                    <th>Date Created</th>
{{--                                    <th>Status</th>--}}
                                    <th>Taken</th>
                                    <th>Average Score</th>
                                    <th>Average Percentage</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($super_quizzes as $key=>$super_quiz)
                                <tr class="text-center">
                                    <td>{{$key+1 ?? ''}}</td>
                                    <td>{{$super_quiz->title ?? ''}}</td>
                                    <td>{{\Carbon\Carbon::parse($super_quiz->created_at)->format('Y-m-d - H:i') ?? ''}}</td>
{{--                                    <td>--}}
{{--                                        @if($super_quiz->status == 1)--}}
{{--                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">--}}
{{--                                                Active--}}
{{--                                            </span>--}}
{{--                                        @elseif($super_quiz->status == 0)--}}
{{--                                            <span class="label label-lg font-weight-bold label-light-success label-inline">--}}
{{--                                                Deactivated--}}
{{--                                            </span>--}}
{{--                                        @endif--}}
{{--                                    </td>--}}
                                    <td>{{$super_quiz->taken ?? ''}}</td>
                                    <td>{{$super_quiz->average_score ?? ''}}</td>
                                    <td>{{$super_quiz->average_percentage ?? ''}}</td>
                                    <td>
{{--                                        <a href="{{url("quizzes/$super_quiz->id/edit")}}"><i class="flaticon-edit text-warning mr-5"></i></a>--}}
{{--                                        <a href="{{url("segments/$super_quiz->id/show")}}"><i class="flaticon-web  text-info mr-5"></i></a>--}}
                                        <button type="button" class="btn btn-text-dark-50 btn-icon-success font-weight-bold btn-hover-bg-light p-1 py-2" data-toggle="modal" data-target="#quiz-{{$key}}">
                                            <i class="flaticon-map"></i> Quizzes
                                        </button>
                                        <div class="modal fade" id="quiz-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Super Quiz Title : {{$super_quiz->title ?? ''}}</h5>
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
                                                                    <th>Quiz Title</th>
                                                                    <th>taken</th>
                                                                    <th>average score</th>
                                                                    <th>average percentage</th>
                                                                    <th>Action</th>

                                                                </tr>
                                                                </thead>

                                                                <tbody>
                                                                @foreach($super_quiz->quiz as $quizKey => $quiz)
                                                                    <tr class="">
                                                                        <td>{{$quizKey+1 ?? ''}}</td>
                                                                        <td>{{$quiz->title ?? ''}}</td>
                                                                        <td>{{$quiz->taken ?? ''}}</td>
                                                                        <td>{{$quiz->average_score ?? ''}}</td>
                                                                        <td>{{$quiz->average_percentage ?? ''}}</td>
                                                                        <td>
                                                                            <a href="{{url("super_result/$quiz->id/answers")}}" class="btn btn-text-dark-50 btn-icon-success font-weight-bold btn-hover-bg-light p-1 py-2">
                                                                                <i class="flaticon-multimedia-5"></i> Answers
                                                                            </a>
                                                                            <a href="{{url("result/$quiz->id/segment_answers")}}" class="btn btn-text-dark-50 btn-icon-warning font-weight-bold btn-hover-bg-light p-1 py-2">
                                                                                <i class="flaticon-interface-1 "></i> Segments
                                                                            </a>
                                                                        </td>

{{--                                                                        <td>{{ \Carbon\Carbon::parse($answer['taken']['created_at'])->format('Y-m-d - H:i') ?? ''}}</td>--}}
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

                                        <a href="{{url("result/$super_quiz->id/segment_answers")}}" class="btn btn-text-dark-50 btn-icon-warning font-weight-bold btn-hover-bg-light p-1 py-2">
                                            <i class="flaticon-interface-1 "></i> Segments
                                        </a>
                                        <a href="{{url("super_result/$super_quiz->id/users_answers")}}" class="btn btn-text-dark-50 btn-icon-info font-weight-bold btn-hover-bg-light p-1 py-2">
                                            <i class="flaticon-avatar"></i> Users
                                        </a>
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



