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
                                    Email Templates
                                </h3>
                            </div>
                            <div class="card-body">
                                <!--begin::Example-->
                                <div class="example">

                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home">
                                                    <span class="nav-icon"><i class="flaticon-exclamation-square "></i></span>
                                                    <span class="nav-text">Circle Invitation Template</span>
                                                </a>
                                            </li>
{{--                                            <li class="nav-item">--}}
{{--                                                <a class="nav-link" id="profile-tab" data-toggle="tab"--}}
{{--                                                   href="#profile" aria-controls="profile">--}}
{{--                                                    <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>--}}
{{--                                                    <span class="nav-text">Answers Details</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}

                                        </ul>
                                        <div class="tab-content mt-5" id="myTabContent">
                                            <div class="tab-pane fade show active " id="home" role="tabpanel"
                                                 aria-labelledby="home-tab">
                                                <div class="px-5 px-md-30">
                                                    <!--begin::Form-->
                                                    <form class="form" action="
                                                    @if(isset($email_template) && $email_template != null)
                                                        {{url("evaluation/setting/email_template/$email_template->id/update")}}
                                                        @else
                                                        {{url("evaluation/setting/email_template/store")}}
                                                        @endif
                                                        " method="post" enctype="multipart/form-data">

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

                                                                <h6 class="m-0 mb-3">Create or Edit invitation email template for users</h6>
                                                                @include('fragment.error')
                                                                <textarea name="description" id="kt-ckeditor-1">
                                                                    @if(isset($email_template) && $email_template != null)
                                                                            {{$email_template->description ?? ''}}
                                                                    @endif
                                                                </textarea>

                                                                <div class="row mt-3">
{{--                                                                    <a href="{{url("evaluation_result/$circle->evaluation_id/show")}}" class="btn btn-light-warning ml-auto mr-6 w-100px">Back</a>--}}
                                                                    <button type="submit" class="btn btn-light-success mx-auto w-100px">Save</button>
                                                                </div>
                                                            </div>



                                                        </div>
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                            </div>

{{--                                            <div class="tab-pane fade" id="profile" role="tabpanel"--}}
{{--                                                     aria-labelledby="profile-tab">--}}
{{--                                                <div class="col-12">--}}

{{--                                                </div>--}}
{{--                                            </div>--}}

                                        </div>

                                </div>
                                <!--end::Example-->
                            </div>
                        </div>
                        <!--end::Card-->


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
