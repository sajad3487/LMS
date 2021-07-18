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
                        <h3 class="card-label font-weight-bolder text-dark">Quiz title</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">quiz description</span>

                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                    @csrf
                    <div class="card-body row">
                        <div class="col-lg-12">
                            @include('fragment.error')
                            @if(isset($quiz_answer))
                                @foreach($quiz_answer->question_answer as $key=>$answer)
                                    @if($answer->type == 'text')
                                    <div class="">
                                        <form action="{{url("participant/edit_answer/$answer->id/update_answer")}}" method="post">
                                            @csrf
                                            @method('put')
                                            <div class="form-group pl-10">
                                                <label class="m-0">{{$key+1}} ) {{$answer->question->body ?? '' }} </label>
                                                <span class="form-text text-muted ml-5 mb-2">{{$answer->question->description ?? ''}}</span>

                                                <div class="row ml-1">
                                                    <input type="text" name="answer" class="form-control col-9" value="{{$answer->answer ?? ''}}"/>
                                                    <button type="submit" class="btn btn-primary ml-2 col-2">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                        @else
                                        <div class="form-group px-10 m-0 mb-2">
                                            <label class="row col-form-label h6">{{$key+1}}) {{$answer->question->body ?? ''}}
                                            </label>
                                            <p class="row text-muted m-0 ">{{$answer->question->description ?? ''}}</p>
                                            <p class="row text-success m-0 ">Your Answer : {{$answer->answer ?? ''}}</p>
                                        </div>
                                    @endif
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

