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
                                    @if(isset($question)) Title : {{$question->body }} @else New title @endif
                                </h3>
                            </div>
                            <!--begin::Form-->

                                <div class="card-body px-md-10">
                                        <form class="form" action="
                                        @if(isset($question))
                                        {{url("/questions/$question->id/update")}}
                                        @else
                                        {{url("/questions/store")}}
                                        @endif
                                            " method="post" enctype="multipart/form-data">

                                            @csrf
                                            @if(isset($question))
                                                @method('PUT')
                                            @endif
                                            <div class="row">
                                                @include('fragment.error')
                                                <div class="col-lg-9">

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label text-right">Title :</label>
                                                        <div class="col-lg-9">
                                                            <input type="text" name="body" class="form-control" placeholder="Enter your title" value="{{$question->body  ?? ''}}" />
                                                        </div>
                                                        <input type="number" name="form_id" value="{{$quiz->id}}" class="d-none">
                                                        <input type="text" name="type" value="title" class="d-none">
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label text-right">Title description :</label>
                                                        <div class="col-lg-9">
                                                            <textarea class="form-control" type="text" name="description" id="exampleTextarea" rows="3">{{$question->description  ?? ''}}</textarea>
                                                        </div>

                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label text-right"></label>
                                                        <div class="col-lg-4">
                                                            <a href="" class="btn btn-light-success font-weight-bold mb-3 mr-8" data-toggle="modal" data-target="#add_media">Add media</a>
                                                        </div>
                                                    </div>
                                                    <!--begin::Modal-->
                                                    <div class="modal fade" id="add_media" role="dialog"  aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Add New Circle</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!--begin::Form-->
                                                                    @csrf
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label>Image :</label>
                                                                            <div class="custom-file">
                                                                                <input type="file" name="file"
                                                                                       class="custom-file-input"
                                                                                       id="customFile"/>
                                                                                <label class="custom-file-label"
                                                                                       for="customFile">Choose Banner</label>
                                                                            </div>
                                                                        </div>
    {{--                                                                    <p class="text-muted text-center"> - or - </p>--}}
    {{--                                                                    <div class="row">--}}
    {{--                                                                        <div class="form-group col-12">--}}
    {{--                                                                            <label>Video</label>--}}
    {{--                                                                            <input type="text" name="video_path" class="form-control form-control-solid" />--}}
    {{--                                                                        </div>--}}
    {{--                                                                    </div>--}}
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <button type="button" class="btn btn-primary mr-2" data-dismiss="modal" aria-label="Close">Add media</button>
                                                                    </div>
                                                                    <!--end::Form-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Modal-->
                                                </div>
                                                @if(isset($question))
                                                    <div class="col-md-3">
                                                        <!--begin::Card-->
                                                        <div class="card card-custom card-shadowless">
                                                            <div class="card-body p-0">
                                                                <!--begin::Image-->
                                                                <div class="overlay">
                                                                    <div class="overlay-wrapper rounded bg-light text-center">
                                                                        <img src="{{asset($question->media)}}" alt="" class="mw-100" />
                                                                    </div>
                                                                    <div class="overlay-layer">
                                                                        <a href="{{url("questions/$question->id/remove_media")}}" class="btn font-weight-bolder btn-sm btn-danger mr-2">Delete</a>
{{--                                                                        <a href="#" class="btn font-weight-bolder btn-sm btn-light-primary">More</a>--}}
                                                                    </div>
                                                                </div>
                                                                <!--end::Image-->
                                                            </div>
                                                        </div>
                                                        <!--end::Card-->
                                                    </div>
                                                    @endif
                                            </div>
                                            <div class="text-center">
                                                <a href="{{url("quizzes/$quiz->id/edit")}}" class="btn btn-secondary col-md-2 mx-5">Back</a>
                                                <button type="submit" class="btn btn-success col-md-2">Save</button>
                                            </div>
                                        </form>

                                </div>

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
