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
                                                <span class="nav-text">Users Answers</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab"
                                               href="#profile" aria-controls="profile">
                                                <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                <span class="nav-text">Questions Answers</span>
                                            </a>
                                        </li>

                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active " id="home" role="tabpanel"
                                             aria-labelledby="home-tab">
                                            <div class="">
                                                <!--begin::Form-->
                                                    <div class="card-body row">
                                                        <table class="table">
                                                            <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Name</th>
                                                                <th scope="col">Email</th>
                                                                <th scope="col">Position</th>
                                                                <th scope="col">Date</th>
                                                                <th scope="col" class="text-center">Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($circle->answers as $answer_key=>$answer)
                                                                <tr>
                                                                    <th scope="row">{{$answer_key+1}}</th>
                                                                    <td>{{$answer->user->name ?? ''}}</td>
                                                                    <td>{{$answer->user->email ?? ''}}</td>
                                                                    <td>{{$answer->user->position ?? ''}}</td>
                                                                    <td>{{$answer->created_at ?? ''}}</td>
                                                                    <td class="text-center">
                                                                        <a href="" class="btn btn-light-info font-weight-bold mb-3 mr-3 ml-8" data-toggle="modal" data-target="#user_answer{{$answer_key}}">Answers @if($answer->new_message != 0) <span class="label label-sm label-rounded label-danger ml-1">{{$answer->new_message ?? ''}}</span> @endif </a>
                                                                        <!--begin::Modal-->
                                                                        <div class="modal fade" id="user_answer{{$answer_key}}" role="dialog"  aria-hidden="true">
                                                                            <div class="modal-dialog modal-lg" role="document">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h5 class="modal-title">{{$answer->user->name ?? ''}}</h5>
                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body">

                                                                                        <table class="table">
                                                                                            <thead>
                                                                                            <tr>
                                                                                                <th>#</th>
                                                                                                <th>Question</th>
                                                                                                <th>Answer</th>
                                                                                                <th>Action</th>
                                                                                            </tr>
                                                                                            </thead>

                                                                                            <tbody>

                                                                                            @foreach($answer->answer_detail as $detail_key=>$detail_answer)
                                                                                                <tr class="text-center">
                                                                                                    <td>{{$detail_key+1 ?? ''}}</td>
                                                                                                    <td>{{$detail_answer->not->title ?? ''}}</td>
                                                                                                    <td>{{$detail_answer->body ?? ''}}</td>
                                                                                                    <td>
                                                                                                        <a href="" class="btn btn-light-success font-weight-bold mb-3 mr-3 ml-8" data-toggle="modal" data-target="#comment-{{$answer_key}}-{{$detail_key}}">Comment @if($detail_answer->new_message->count() != 0) <span class="label label-sm label-rounded label-danger ml-1">{{$detail_answer->new_message->count() ?? ''}}</span> @endif</a>
                                                                                                        <!--begin::Modal-->
                                                                                                        <div class="modal fade" id="comment-{{$answer_key}}-{{$detail_key}}" role="dialog"  aria-hidden="true">
                                                                                                            <div class="modal-dialog modal-lg" role="document">
                                                                                                                <div class="modal-content">
                                                                                                                    <div class="modal-header">
                                                                                                                        <h5 class="modal-title">{{$answer->user->name ?? ''}}</h5>
                                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                                                                        </button>
                                                                                                                    </div>
                                                                                                                    <div class="modal-body" style="min-height: 400px">

                                                                                                                        <div class="card-body">
                                                                                                                            <!--begin::Scroll-->
                                                                                                                            <div class="scroll scroll-pull" data-mobile-height="350">
                                                                                                                                <!--begin::Messages-->
                                                                                                                                <div class="messages">
    {{--                                                                                                                                @foreach($detail_answer->message as $msg)--}}
    {{--                                                                                                                                    {{$msg->body}}--}}

    {{--                                                                                                                                @endforeach--}}

                                                                                                                                @if($detail_answer->message != null)
                                                                                                                                    @foreach($detail_answer->message as $msg)
                                                                                                                                        @if($msg->owner_id == auth()->id())
                                                                                                                                            <!--begin::Message In-->
                                                                                                                                                <div class="d-flex flex-column mb-5 align-items-start">
                                                                                                                                                    <div class="d-flex align-items-center">
                                                                                                                                                        <div class="symbol symbol-circle symbol-40 mr-3">
                                                                                                                                                            <img alt="Pic" src="{{asset($msg->owner->profile_picture)}}"/>
                                                                                                                                                        </div>
                                                                                                                                                        <div>
                                                                                                                                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Coach</a>
                                                                                                                                                            <span class="text-muted font-size-sm">{{$msg->created_at ?? ''}}</span>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                                                                                                                                        {{$msg->body ?? ''}}
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <!--end::Message In-->


                                                                                                                                        @else
                                                                                                                                            <!--begin::Message Out-->
                                                                                                                                                <div class="d-flex flex-column mb-5 align-items-end">
                                                                                                                                                    <div class="d-flex align-items-center">
                                                                                                                                                        <div>
                                                                                                                                                            <span class="text-muted font-size-sm">{{$msg->created_at ?? ''}}</span>
                                                                                                                                                            <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">{{$msg->owner->name ?? ''}}</a>
                                                                                                                                                        </div>
                                                                                                                                                        <div class="symbol symbol-circle symbol-40 ml-3">
                                                                                                                                                            <img alt="Pic" src="{{asset($msg->owner->profile_picture)}}"/>
                                                                                                                                                        </div>
                                                                                                                                                    </div>
                                                                                                                                                    <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                                                                                                                        {{$msg->body ?? ''}}
                                                                                                                                                    </div>
                                                                                                                                                </div>
                                                                                                                                                <!--end::Message Out-->
                                                                                                                                            @endif
                                                                                                                                        @endforeach

                                                                                                                                    @endif

                                                                                                                                </div>
                                                                                                                                <!--end::Messages-->
                                                                                                                            </div>
                                                                                                                            <!--end::Scroll-->
                                                                                                                        </div>
                                                                                                                        <div class="card-footer">
                                                                                                                            <form action="{{url("evaluation_result/message/store")}}" method="post">
                                                                                                                            @csrf
                                                                                                                            <!--begin::Compose-->
                                                                                                                                {{--                                                                        <input type="number" name="owner_id" class="d-none" value="{{$answer->note_id}}">--}}
                                                                                                                                <input type="number" name="destination_id" class="d-none" value="{{$detail_answer->id}}">
                                                                                                                                <input type="text" name="type" class="d-none" value="question_comment">
                                                                                                                                <textarea class="form-control border-0 p-0" name="body" rows="2" placeholder="Type a message" required></textarea>
                                                                                                                                <div class="d-flex align-items-center justify-content-between mt-5">
                                                                                                                                    <div class="mr-3">
                                                                                                                                        {{--                                                                            <a href="#" class="btn btn-clean btn-icon btn-md mr-1"><i class="flaticon2-photograph icon-lg"></i></a>--}}
                                                                                                                                        {{--                                                                            <a href="#" class="btn btn-clean btn-icon btn-md"><i class="flaticon2-photo-camera  icon-lg"></i></a>--}}
                                                                                                                                    </div>
                                                                                                                                    <div>
                                                                                                                                        <button type="submit"  class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">Send</button>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                                <!--begin::Compose-->
                                                                                                                            </form>
                                                                                                                        </div>

                                                                                                                    </div>

                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <!--end::Modal-->
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach

                                                                                            </tbody>
                                                                                        </table>

                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <!--end::Modal-->
                                                                    </td>
                                                                </tr>



                                                            @endforeach
                                                            </tbody>
                                                        </table>


                                                    </div>
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
                                                        <th scope="col" class="text-center">Action</th>
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
