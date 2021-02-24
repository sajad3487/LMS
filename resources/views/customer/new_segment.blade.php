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
                                    @if(isset($segment)) Segment Range- Min : {{$segment->min_score }} - Max : {{$segment->max_score }} @else New Segment for Result @endif
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
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

    @endsection
