@extends('layouts.user.master')
@section('content')
    <!--begin::Profile Email Settings-->
    <div class="d-flex flex-row">
    @include('layouts.user.sidebar')

    <!--begin::Content-->
        <div class="flex-row-fluid ml-lg-8">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">{{$user_answer->circle->title ?? ''}}</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">{{$user_answer->circle->target->name ?? ''}} 360' Evaluation</span>

                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                    @csrf
                    <div class="card-body row">
                        <div class="col-lg-12">
                            @include('fragment.error')
                            @if(isset($user_answer->answer_detail))
                                @foreach($user_answer->answer_detail as $key=>$answer)
                                    <div class="row">
                                        <div class="form-group px-10 m-0 mb-2">
                                            <label class="row col-form-label h6">{{$key+1}}) {{$answer->not->title ?? ''}}
                                            </label>
                                            <p class="row text-muted m-0 ">{{$answer->not->description ?? ''}}</p>
                                            <p class="row text-success m-0 ">Your Answer : {{$answer->body ?? ''}}</p>
                                        </div>
                                        <div class="ml-auto">
                                            <a href="" class="btn btn-light-success font-weight-bold mb-3 mr-5 ml-auto" data-toggle="modal" data-target="#comment{{$key}}">Comments @if($answer->new_message !=0 )<span class="label label-sm label-rounded label-danger ml-1">{{$answer->new_message ?? ''}}</span> @endif </a>
                                            <!--begin::Modal-->
                                            <div class="modal fade" id="comment{{$key}}" role="dialog"  aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <div class="text-left flex-grow-1">

                                                            </div>
                                                            <div class="text-center flex-grow-1">
                                                                <div class="text-dark-75 font-weight-bold font-size-h5">Comments</div>
                                                                {{--                                                            <div>--}}
                                                                {{--                                                                <span class="label label-sm label-dot label-success"></span>--}}
                                                                {{--                                                                <span class="font-weight-bold text-muted font-size-sm">Active</span>--}}
                                                                {{--                                                            </div>--}}
                                                            </div>
                                                            <div class="text-right flex-grow-1">
                                                                <!--begin::Dropdown Menu-->

                                                                <!--end::Dropdown Menu-->
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <i aria-hidden="true" class="ki ki-close"></i>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">

                                                            <!--begin::Form-->
                                                            @csrf
                                                            <div class="card-body">
                                                                <!--begin::Scroll-->
                                                                <div class="scroll scroll-pull" data-mobile-height="350">
                                                                    <!--begin::Messages-->
                                                                    <div class="messages">
                                                                    @if($answer->message != null)
                                                                        @foreach($answer->message as $msg)
                                                                            @if($msg->owner_id == auth()->id())
                                                                                <!--begin::Message Out-->
                                                                                    <div class="d-flex flex-column mb-5 align-items-end">
                                                                                        <div class="d-flex align-items-center">
                                                                                            <div>
                                                                                                <span class="text-muted font-size-sm">{{$msg->created_at ?? ''}}</span>
                                                                                                <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
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

                                                                            @else
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
                                                                                @endif
                                                                            @endforeach

                                                                        @endif

                                                                    </div>
                                                                    <!--end::Messages-->
                                                                </div>
                                                                <!--end::Scroll-->
                                                            </div>
                                                            <div class="card-footer">
                                                                <form action="{{url("participant/message/store")}}" method="post">
                                                                @csrf
                                                                <!--begin::Compose-->
                                                                    {{--                                                                        <input type="number" name="owner_id" class="d-none" value="{{$answer->note_id}}">--}}
                                                                    <input type="number" name="destination_id" class="d-none" value="{{$answer->id}}">
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
                                                            <!--end::Form-->

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Modal-->
                                        </div>

                                    </div>
                                    <hr>
                                @endforeach
                                @endif
                            @if(isset($scroller_answers) && $scroller_answers != null)
                                @foreach($scroller_answers->answer_scroller_detail as $scroller_key=>$scroller_answer)
                                    <div class="row">
                                        <div class="form-group px-10 m-0 mb-2">
                                            <label class="row col-form-label h6">
                                                <h6>- {{$scroller_answer->scroller->behavior->body ?? ''}} :</h6>
                                            </label>
                                            <div class="row">
                                                <p class="mx-2">( Min : {{$scroller_answer->scroller->min ?? ''}}</p>
                                                <p class="mx-2">Max : {{$scroller_answer->scroller->max ?? ''}} )</p>
                                            </div>
                                            <p class="row text-muted m-0 ">{{$scroller_answer->scroller->description ?? ''}}</p>
                                            <p class="row text-success m-0 ">Your Answer : {{$scroller_answer->score ?? ''}}</p>
                                        </div>


                                    </div>
                                    <hr>
                                @endforeach
                                @endif
                        </div>

                    </div>

{{--                    <div class="card-footer">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-4"></div>--}}
{{--                            <div class="col-lg-8">--}}
{{--                                <a href="{{url('/admin/users')}}" type="reset" class="btn btn-secondary col-md-3 mr-2">Cancel</a>--}}
{{--                                <button type="submit" class="btn btn-success col-md-3">Submit</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                <!--end::Form-->
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Profile Email Settings-->



@endsection

