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
                <form class="form" action="{{url("/participant/$user_answer->id/submit")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body row">
                        <div class="col-lg-12">
                            @include('fragment.error')
                            @foreach($user_answer->answer_detail as $key=>$answer)
                            <div class="form-group px-10 m-0 mb-2">
                                <label class="row col-form-label h6">{{$key+1}}) {{$answer->not->title ?? ''}}
                                </label>
                                <p class="row text-muted m-0 ">{{$answer->not->description ?? ''}}</p>
                                <p class="row text-success m-0 ">Your Answer : {{$answer->body ?? ''}}</p>
                            </div>
                                <hr>
                            @endforeach


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
                </form>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Profile Email Settings-->



@endsection

