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
                                    @if(isset($question)) Question No : {{$question->position }} @else New Question @endif
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
                                    <div class="">
                                        @include('fragment.error')
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label text-center">Title :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="body" class="form-control" placeholder="Enter your title" value="{{$question->body  ?? ''}}" />
                                            </div>
                                            <input type="number" name="form_id" value="{{$quiz->id}}" class="d-none">
                                            <input type="text" name="type" value="title" class="d-none">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label text-center">Title description :</label>
                                            <div class="col-lg-9">
                                                <textarea class="form-control" type="text" name="description" id="exampleTextarea" rows="3">{{$question->description  ?? ''}}</textarea>
                                            </div>

                                        </div>

                                        <div class="text-center">
                                            <a href="{{url("quizzess/$quiz->id/edit")}}" class="btn btn-secondary col-md-2 mx-5">Back</a>
                                            <button type="submit" class="btn btn-success col-md-2">Save</button>
                                        </div>
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
