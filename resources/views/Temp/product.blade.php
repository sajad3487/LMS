@extends('layouts.customer.master')
@section('content')

    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!--begin::Page Layout-->
                <div class="d-flex flex-row">


                    <!--begin::Layout-->
                    <div class="flex-row-fluid ">
                        <!--begin::Section-->

                    <!--begin::Engage Widget 13-->
                    <!--begin::Card-->
                        <div class="card card-custom gutter-b">
                        <!--begin::Card Body-->
                            {{--                                <div class=" bgi-no-repeat bgi-position-center bgi-size-cover h-300px h-md-auto h-lg-300px h-xxl-auto mw-100 w-400px" style="background-image: url({{$product->picture}});background-size: contain;"></div>--}}
                            <div class="card-body d-flex rounded  p-12 justify-content-center row  flex-xxl-row">
                            <!--begin::Image-->
                                <!--end::Image-->
                                <div class="col-md-6" ><img class="img-fluid" style="max-height: 400px" src="{{url($product->picture)}}" alt=""></div>

                                <!--begin::Card-->
                                <div class="card card-custom bg-light w-auto mt-10 mt-md-0 w-md-300px w-lg-auto w-xxl-300px col-md-6">
                                    <!--begin::Card Body-->
                                    <div class="card-body px-12 py-10">
                                        <h3 class="font-weight-bolder font-size-h2 mb-1"><a href="#" class="text-dark-75">{{$product->title}}</a></h3>
                                        <div class="text-primary font-size-h4 mb-9"></div>
                                        <div class="font-size-sm mb-8">{{$product->description}}</div>
                                        <!--begin::Info-->
                                        @foreach($product->specification as $spec)
                                        <div class="d-flex mb-3">
                                            <span class="text-dark-50 flex-root font-weight-bold">{{$spec->title}}</span>
                                            <span class="text-dark flex-root font-weight-bold">{{$spec->specification}}</span>
                                        </div>
                                        @endforeach
                                        <!--end::Info-->
                                    </div>
                                    <div class="card-footer ">
                                            <a href="{{url("orders/createWithProduct/$product->id")}}" class="btn btn-success btn-block ml-auto mr-auto col-6">Add to Cart</a>
                                    </div>
                                    <!--end::Card Body-->
                                </div>
                                <!--end::Card-->
                            </div>
                            <!--end::Card Body-->
                        </div>
                        <!--end::Card-->
                        <!--end::Engage Widget 13-->        <!--end::Section-->

                    </div>
                    <!--end::Layout-->
                </div>
                <!--end::Page Layout-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

    @endsection
