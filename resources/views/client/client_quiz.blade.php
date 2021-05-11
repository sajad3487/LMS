@extends('layouts.client.master')
@section('content')
    <!--begin::Profile Email Settings-->
    <div class="d-flex flex-row">
    @include('layouts.client.sidebar')

    <!--begin::Content-->
        <div class="flex-row-fluid ml-lg-8">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">{{$active_circle->title ?? ''}}</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Please answer the questions</span>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form class="form" action="{{url("/client/$active_circle->id/submit")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body row">
                        <div class="col-lg-12">
                            @include('fragment.error')
                            @foreach($active_circle->questions as $key=>$question)
                            <div class="form-group px-10 m-0 mb-2">
                                <label class="row col-form-label h6">{{$key+1}}) {{$question->title ?? ''}}
                                </label>
                                <p class="row text-muted m-0 ">{{$question->description ?? ''}}</p>
                                <input type="text" name="answer[{{$question->id}}]" style="width: 100%" class="form-control mt-2"  placeholder="Answer"/>
                            </div>
                            @endforeach


                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <a href="{{url('/admin/users')}}" type="reset" class="btn btn-secondary col-md-3 mr-2">Cancel</a>
                                <button type="submit" class="btn btn-success col-md-3">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Profile Email Settings-->



@endsection

