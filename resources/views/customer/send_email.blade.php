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
                                        @if(\Session::has('success'))
                                            <div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                                                <div class="alert-icon"><i class="flaticon2-checkmark"></i></div>
                                                <div class="alert-text">{!! \Session::get('success') !!}</div>
                                                <div class="alert-close">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                        @elseif($circle->status == 5)
                                            <div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                                                <div class="alert-icon"><i class="flaticon2-checkmark"></i></div>
                                                <div class="alert-text">You sent the report to the client before</div>
                                                <div class="alert-close">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif
                                        @if($circle->answers->count() != $circle->users->count())
                                            <div class="alert alert-custom alert-light-danger fade show mb-5" role="alert">
                                                <div class="alert-icon"><i class="flaticon2-delete"></i></div>
                                                <div class="alert-text">All users haven't answered to evaluation yet</div>
                                                <div class="alert-close">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                        @endif

                                        <h6 class="m-0 mb-3">Create a Report for the client</h6>
                                        @include('fragment.error')
                                        <textarea name="description" id="kt-ckeditor-1">
                                                                    @if(isset($report) && $report != null)
                                                @if($report->description == null)
                                                    @foreach($questions as $question_key=>$question)
                                                        <h4 class="font-weight-bold">{{$question_key +1}}) {{$question->title ?? ''}}</h4>
                                                        <ul>
                                                                            @foreach($question->answers as $answer_key=>$answer)
                                                                @if($answer->body != "")
                                                                    <li>{{$answer->body ?? ''}}</li>
                                                                @endif
                                                            @endforeach
                                                                        </ul>
                                                    @endforeach
                                                @else
                                                    {{$report->description}}
                                                @endif
                                            @else
                                                @foreach($questions as $question_key=>$question)
                                                    <h4 class="font-weight-bold">{{$question_key +1}}) {{$question->title ?? ''}}</h4>
                                                    <ul>
                                                                            @foreach($question->answers as $answer_key=>$answer)
                                                            @if($answer->body != "")
                                                                <li>{{$answer->body ?? ''}}</li>
                                                            @endif
                                                        @endforeach
                                                                        </ul>
                                                @endforeach
                                            @endif
                                            {{--                                                {{$circle->title}}--}}
                                                                </textarea>

                                        <div class="row mt-3">
                                            <a href="{{url("evaluation_result/$circle->evaluation_id/show")}}" class="btn btn-light-warning ml-auto mr-6 w-100px">Back</a>
                                            <button type="submit" class="btn btn-light-success mr-6 w-100px">Save</button>
                                            <button type="submit" formaction="{{url("evaluation_result/report/$circle->id/send_client")}}" class="btn btn-primary mr-auto">
                                                @if(isset($report) && $report != null)
                                                    Send Again
                                                @else
                                                    Send to Client
                                                @endif
                                            </button>
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
