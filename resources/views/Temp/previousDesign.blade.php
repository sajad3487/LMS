@extends('layouts.customer.master')
@section('content')
    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">


        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
{{--                <div class="row">--}}
{{--                    <div class="col-xl-12 mb-6">--}}

{{--                        <!--begin::Engage Widget 15-->--}}
{{--                        <div class="card card-custom ">--}}
{{--                            <div class="card-body rounded p-0 d-flex bg-light justify-content-between">--}}
{{--                                <div--}}
{{--                                    class="d-flex flex-column flex-lg-row-auto w-auto w-lg-350px w-xl-450px w-xxl-650px py-10 py-md-6 px-6 px-md-20 pr-lg-0">--}}
{{--                                    <h1 class="font-weight-bolder text-dark mb-3">Search Products</h1>--}}
{{--                                --}}{{--                                    <div class="font-size-h4 mb-8">Get Amazing Gadgets</div>--}}
{{--                                <!--begin::Form-->--}}
{{--                                    <form action="{{url('/search')}}" method="get" class="d-flex flex-center py-2 px-6 bg-white rounded">--}}
{{--                                        @csrf--}}
{{--                                                        <span class="svg-icon svg-icon-lg svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Search.svg--><svg--}}
{{--                                                                xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"--}}
{{--                                                                height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                                        <rect x="0" y="0" width="24" height="24"/>--}}
{{--                                                                        <path--}}
{{--                                                                            d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"--}}
{{--                                                                            fill="#000000" fill-rule="nonzero" opacity="0.3"/>--}}
{{--                                                                        <path--}}
{{--                                                                            d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"--}}
{{--                                                                            fill="#000000" fill-rule="nonzero"/>--}}
{{--                                                                    </g>--}}
{{--                                                                </svg>--}}
{{--                                                         </span>--}}
{{--                                        <input type="text" name="search" class="form-control border-0 font-weight-bold pl-2" placeholder="Search Goods"/>--}}
{{--                                    </form>--}}
{{--                                    <!--end::Form-->--}}
{{--                                </div>--}}
{{--                                <div--}}
{{--                                    class="d-none d-md-flex flex-row-fluid bgi-no-repeat bgi-position-y-center bgi-position-x-left bgi-size-cover"--}}
{{--                                    style="background-image: url({{asset('/media/bg/aaa.png')}}); ">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--end::Engage Widget 15-->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-xl-12 mb-6">--}}

{{--                        <!--begin::Engage Widget 15-->--}}
{{--                        <div class="card card-custom ">--}}
{{--                            <div class="card-body rounded px-6 py-4 bg-light">--}}
{{--                                <div class="font-size-h4 mt-2 mr-4">Categories :--}}
{{--                                    <a href="{{url("/home")}}" class="btn btn-hover-light-primary mr-2">All</a>--}}
{{--                                    @if(isset($categories))--}}
{{--                                        @foreach($categories as $category)--}}
{{--                                            <a href="{{url("/category/$category->id")}}" class="btn btn-hover-light-primary mr-2">{{$category->title}}</a>--}}
{{--                                        @endforeach--}}
{{--                                    @endif--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!--end::Engage Widget 15-->--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!--begin::Row-->
                @if($previousDesign->count() ==0)
                    <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
                    <div class="alert-icon">
                                    <span class="svg-icon svg-icon-primary svg-icon-xl"><!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero"/>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>	</div>
                        <div class="alert-text">
                            You haven't added any design
{{--                            <a class="font-weight-bold" href="https://getbootstrap.com/docs/4.3/content/typography/" target="_blank">Bootstrap Typography Documentation</a>.--}}
                        </div>
                    </div>
                @else
                <div class="row">
                    @foreach($previousDesign as $design)
                        <div class="col-lg-3 col-xl-3 mb-5">
                            <!--begin::Iconbox-->
                            <div class="card card-custom wave wave-animate-slow mb-8 mb-lg-0">
                                <div class="card-body p-6">
                                    <div class="d-flex align-items-center">
                                        <!-- begin: Invoice header-->
                                        <div class="row justify-content-center bgi-size-cover bgi-no-repeat ml-0" style="background-image: url({{asset($design->product->picture)}});background-size: contain; background-position: center;width: 100%; ">
                                            <h1 class="display-4 text-black font-weight-boldest mb-30 mb-md-0 mt-20"></h1>

                                            <div class="border-bottom w-100 opacity-20"></div>
                                                <div class="d-flex justify-content-between text-white pt-6">
                                                    <div class="d-flex flex-column flex-root">

                                                    </div>
                                                    <div class="d-flex flex-column flex-root align-items-center">
                                                        <img src="{{asset($design->label_picture) ?? ''}}" alt="" style="width: 50px; height: 50px"/>

                                                    </div>
                                                    <h1 class="display-4 text-black font-weight-boldest mb-30 mb-md-0 mt-40"></h1>

                                                    <div class="d-flex flex-column flex-root">

                                                    </div>

                                                </div>
                                        </div>
                                    </div>
                                    <a href="{{url("/previousDesign/reorder/$design->id")}}" class="btn btn-success btn-lg btn-block mt-4">Reorder</a>
                                </div>
                            </div>
                            <!--end::Iconbox-->
                        </div>
                    @endforeach

                </div>
                @endif
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->
@endsection
