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
                                    Invitation Email
                                </h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" action="{{url("evaluation/setting/$circle->id/update")}}" method="post" enctype="multipart/form-data">
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
                                        @endif

                                        <h6 class="m-0 mb-3">Send invitation for a circle quiz </h6>
                                        @include('fragment.error')
                                        <textarea name="description" id="kt-ckeditor-1">
                                            @if(isset($email_template) && $email_template != null)
                                                    {{$email_template->description ?? ''}}
                                            @endif
                                            {{--                                                {{$circle->title}}--}}
                                        </textarea>

                                        <div class="row mt-3">
                                            <a href="{{url("evaluation_result/$circle->evaluation_id/show")}}" class="btn btn-light-warning ml-auto mr-6 w-100px">Back</a>
                                            <button type="submit" class="btn btn-light-success mr-6 w-100px">Save</button>
                                            <button type="submit" formaction="{{url("/evaluation_result/$circle->id/send_user")}}" class="btn btn-primary mr-auto">
                                                    Send to Peer
                                            </button>
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
