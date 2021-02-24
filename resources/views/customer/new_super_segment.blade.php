@extends('layouts.customer.master')
@section('content')
    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
                <div class="row">
                    <div class="
                        @if(isset($segment))
                        col-lg-8
                        @else
                        col-lg-12
                        @endif
                            ">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header">
                                <h3 class="card-title">
                                    @if(isset($segment)) Segment Range- Min : {{$segment->min_score }} - Max : {{$segment->max_score }} @else New Segment for Sub Quiz Result @endif
                                </h3>
                            </div>
                            <!--begin::Form-->

                                <div class="card-body px-md-10">
                                    <form class="form" action="
                                        @if(isset($segment))
                                            {{url("/segments/$segment->id/update")}}
                                        @else
                                            {{url("/segments/store")}}
                                        @endif
                                        " method="post" enctype="multipart/form-data">

                                        @csrf
                                        @if(isset($segment))
                                            @method('PUT')
                                        @endif
                                        <div class="">
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Segment Title</label>
                                                    <input type="text" name="segment_title" class="form-control form-control-solid" value="{{old('segment_title') ?? $segment->segment_title  ?? ''}}" placeholder="Enter result title"/>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Min Score</label>
                                                    <input type="number" name="min_score" class="form-control form-control-solid" value="{{old('min_score') ?? $segment->min_score  ?? ''}}" placeholder="Enter min score"/>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label>Max Score</label>
                                                    <input type="number" name="max_score" class="form-control form-control-solid" value="{{old('max_score') ?? $segment->max_score  ?? ''}}" placeholder="Enter max score"/>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleTextarea">Result Description:</label>
{{--                                                <textarea name="result_body" class="form-control form-control-solid" rows="3">{{old('result_body') ?? $segment->result_body  ?? ''}}</textarea>--}}
                                                <textarea name="result_body" id="kt-ckeditor-1">
                                                    {{old('result_body') ?? $segment->result_body  ?? ''}}
                                                </textarea>
                                            </div>
                                            <input type="number" name="form_id" value="{{$quiz->id}}" class="d-none">
                                            <div class="row">
                                                <div class="form-group co-12 col-md-4">
                                                    <label>File Browser</label>
                                                    <div></div>
                                                    <div class="custom-file">
                                                        <input type="file" name="file" class="custom-file-input" id="customFile"/>
                                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            @if($quiz->type = 'super')

                                                <a href="{{url("super_segments/$quiz->id/show")}}" class="btn btn-secondary">Cancel</a>
                                            @else
                                                <a href="{{url("segments/$quiz->id/show")}}" class="btn btn-secondary">Cancel</a>
                                            @endif
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        </div>
                                    </form>

                                </div>

                            <!--end::Form-->
                        </div>
                        <!--end::Card-->

                    </div>
                    @if(isset($segment))
                    <div class="col-lg-4">
                        <div class="card card-custom card-stretch gutter-b">
                            <div class="card-body">
                                <!--begin::Section-->
                                <div class="mb-11">
                                    <!--begin::Heading-->
                                    <div class="d-flex justify-content-between align-items-center mb-7">
                                        <h2 class="font-weight-bolder text-dark font-size-h3 mb-0">Media</h2>
                                        <button type="button" class="btn btn-light-info font-weight-bold ml-2" data-toggle="modal" data-target="#new_media">New media
                                        </button>

                                        <!-- Modal-->
                                        <div class="modal fade" id="new_media" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" style="max-width: 60%" role="document">
                                                <div class="modal-content" >
                                                    <div class="modal-body">
                                                        <div data-scroll="true">
                                                            <div class="text-left px-10 pt-10">

                                                                    <form action="{{url("media/store")}}" method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label>Media Title:</label>
                                                                                <input type="text" name="title" class="form-control"  placeholder="Enter media title"/>
                                                                            </div>

                                                                            <div class="form-group mb-1">
                                                                                <label for="exampleTextarea">Description:</label>
                                                                                <textarea class="form-control" name="description" id="exampleTextarea" rows="3"></textarea>
                                                                            </div>
                                                                            <div class="form-group my-3">
                                                                                <label>File Browser</label>
                                                                                <div></div>
                                                                                <div class="custom-file">
                                                                                    <input type="file" name="file" class="custom-file-input" id="customFile"/>
                                                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                                                        </div>
                                                                    </form>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Heading-->

                                    <!--begin::Products-->
                                    <div class="row">
                                        <!--begin::Product-->
                                        <div class="col-md-4 col-xxl-4 col-lg-12">
                                            <!--begin::Card-->
                                            <div class="card card-custom card-shadowless">
                                                <div class="card-body p-0">
                                                    <!--begin::Image-->
                                                    <div class="overlay my-3">
                                                        <div class="overlay-wrapper rounded bg-light text-center">
                                                            <img src="{{asset('media/image/1581297RE_banner.jpg')}}" alt="" class="mw-100 w-200px" />
                                                        </div>
                                                        <div class="overlay-layer">
                                                            <a href="#" class="btn font-weight-bolder btn-sm btn-info mr-2">View</a>
                                                        </div>
                                                    </div>
                                                    <!--end::Image-->
                                                    <!--begin::Image-->
                                                    <div class="overlay my-3">
                                                        <div class="overlay-wrapper rounded bg-light text-center">
                                                            <img src="{{asset('media/image/1581297RE_banner.jpg')}}" alt="" class="mw-100 w-200px" />
                                                        </div>
                                                        <div class="overlay-layer">
                                                            <a href="#" class="btn font-weight-bolder btn-sm btn-info mr-2">View</a>
                                                        </div>
                                                    </div>
                                                    <!--end::Image-->

                                                </div>
                                            </div>
                                            <!--end::Card-->
                                        </div>
                                        <!--end::Product-->
                                    </div>
                                    <!--end::Products-->
                                </div>
                                <!--end::Section-->

                            </div>
                        </div>
                    </div>
                        @endif
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

    @endsection
