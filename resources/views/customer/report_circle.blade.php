@extends('layouts.customer.master')
@section('content')

    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">

                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <h3 class="card-title">
                                    {{$circle->title ?? ''}}
                                </h3>
                                <a href="{{url("evaluation_result/$circle->evaluation_id/show")}}" class="btn btn-light-warning ml-auto mr-6 w-100px h-40px mt-5">Back</a>

                            </div>
                            <div class="card-body">
                                <!--begin::Example-->
                                <div class="example">

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home">
                                                    <span class="nav-icon"><i class="flaticon-exclamation-square "></i></span>
                                                    <span class="nav-text">Report</span>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                   href="#profile" aria-controls="profile">
                                                    <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                    <span class="nav-text">Answers Details</span>
                                                </a>
                                            </li>

                                        </ul>
                                        <div class="tab-content mt-5" id="myTabContent">
                                            <div class="tab-pane fade show active " id="home" role="tabpanel"
                                                 aria-labelledby="home-tab">
                                                <div class="px-5 px-md-30">
                                                    <!--begin::Form-->
                                                    <form class="form" action="
                                                    @if(isset($report) && $report != null)
                                                        {{url("evaluation_result/report/$report->id/update")}}
                                                        @else
                                                        {{url("evaluation_result/report/$circle->id/store")}}
                                                        @endif
                                                        " method="post" enctype="multipart/form-data">

                                                        @csrf

                                                        @if(isset($report) && $report != null)
                                                            <input type="number" name="report_id" value="{{$report->id}}" class="d-none">
                                                            @endif
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
                                                                            Send to Client
                                                                    </button>
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="profile" role="tabpanel"
                                                     aria-labelledby="profile-tab">
                                                <div class="col-12">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Question</th>
                                                            <th scope="col">Type</th>
                                                            <th scope="col">Action</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($questions as $q_key=>$question)
                                                                <tr>
                                                                    <th scope="row">{{$q_key+1}}</th>
                                                                    <td>{{$question->title ?? ''}}</td>
                                                                    <td>{{$question->type ?? ''}}</td>
                                                                    <td>
                                                                        <a href="" class="btn btn-light-info font-weight-bold mb-3 mr-3 ml-8" data-toggle="modal" data-target="#answer{{$q_key}}">Answers Details</a>
                                                                    </td>
                                                                </tr>

                                                                @endforeach
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>

                                </div>
                                <!--end::Example-->
                            </div>
                        </div>
                        <!--end::Card-->
                        @foreach($questions as $modal_key=>$question)
                            <!--begin::Modal-->
                                <div class="modal fade" id="answer{{$modal_key}}" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">{{$question->title ?? ''}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <form class="form" action="{{url("circle/new_scroller")}}" method="post">
                                                <div class="modal-body">

                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Name</th>
                                                            <th>Answer</th>
                                                            <th>Action</th>
                                                        </tr>
                                                        </thead>

                                                        <tbody>

                                                        @foreach($question->answers as $answer_key=>$answer)
                                                            <tr class="text-center">
                                                                <td>{{$answer_key+1 ?? ''}}</td>
                                                                <td>{{$answer->user->name ?? ''}}</td>
                                                                <td><input type="text" class="form-control" value="{{$answer->body ?? ''}}" id="myInput-{{$answer_key}}"></td>
                                                                <td>
                                                                    <button class="btn btn-light-success" onclick="addToReport('{{$answer_key}}')">Copy</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach

                                                        </tbody>
                                                    </table>

                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Modal-->

                            @endforeach

                    </div>

                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
    <script>
        function addToReport(answerKey) {
            /* Get the text field */
            var copyText = document.getElementById("myInput-"+answerKey);

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand("copy");

        }
    </script>
    @endsection
