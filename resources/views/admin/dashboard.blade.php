@extends('layouts.admin.master')

@section('content')

    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">


        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">


                <!--begin::Row-->
                <div class="row">
                    <div class="col-xl-4">
                        <!--begin::Tiles Widget 8-->
                        <div class="card card-custom gutter-b card-stretch">
                            <!--begin::Header-->
                            <div class="card-header border-0 pt-5">
                                <div class="card-title">
                                    <div class="card-label">
                                        <div class="font-weight-bolder">Weekly Sales Stats</div>
{{--                                        <div class="font-size-sm text-muted mt-2">890,344 Sales</div>--}}
                                    </div>
                                </div>
                                <div class="card-toolbar">

                                </div>
                            </div>
                            <!--end::Header-->

                            <!--begin::Body-->
                            <div class="card-body d-flex flex-column p-0">
                                <!--begin::Items-->
                                <div class="flex-grow-1 card-spacer">
                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center justify-content-between mb-10">
                                        <div class="d-flex align-items-center mr-2">
                                            <div class="symbol symbol-40 symbol-light-primary mr-3 flex-shrink-0">
                                                <div class="symbol-label">
                            <span class="svg-icon svg-icon-lg svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                        fill="#000000"/>
                                                    <rect fill="#000000" opacity="0.3"
                                                          transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519) "
                                                          x="16.3255682" y="2.94551858" width="3" height="18" rx="1"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span></div>
                                            </div>
                                            <div>
                                                <a href="{{url('/admin/products/create')}}"
                                                   class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">New Product</a>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center justify-content-between mb-10">
                                        <div class="d-flex align-items-center mr-2">
                                            <div class="symbol symbol-40 symbol-light-warning mr-3 flex-shrink-0">
                                                <div class="symbol-label">
                            <span class="svg-icon svg-icon-lg svg-icon-warning"><!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Mic.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M12.9975507,17.929461 C12.9991745,17.9527631 13,17.9762852 13,18 L13,21 C13,21.5522847 12.5522847,22 12,22 C11.4477153,22 11,21.5522847 11,21 L11,18 C11,17.9762852 11.0008255,17.9527631 11.0024493,17.929461 C7.60896116,17.4452857 5,14.5273206 5,11 L7,11 C7,13.7614237 9.23857625,16 12,16 C14.7614237,16 17,13.7614237 17,11 L19,11 C19,14.5273206 16.3910388,17.4452857 12.9975507,17.929461 Z"
                                                        fill="#000000" fill-rule="nonzero"/>
                                                    <rect fill="#000000" opacity="0.3"
                                                          transform="translate(12.000000, 8.000000) rotate(-360.000000) translate(-12.000000, -8.000000) " x="9"
                                                          y="2" width="6" height="12" rx="3"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span></div>
                                            </div>
                                            <div>
                                                <a href="{{url('/admin/invoices/2')}}"
                                                   class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">Placed Order</a>

                                            </div>
                                        </div>

                                    </div>
                                    <!--end::Item-->

                                    <!--begin::Item-->
                                    <div class="d-flex align-items-center justify-content-between mb-10">
                                        <div class="d-flex align-items-center mr-2">
                                            <div class="symbol symbol-40 symbol-light-success mr-3 flex-shrink-0">
                                                <div class="symbol-label">
                            <span class="svg-icon svg-icon-lg svg-icon-success"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group-chat.svg--><svg
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path
                                                        d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                                                        fill="#000000"/>
                                                    <path
                                                        d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                                                        fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg><!--end::Svg Icon--></span></div>
                                            </div>
                                            <div>
                                                <a href="{{url('/admin/categories/create')}}"
                                                   class="font-size-h6 text-dark-75 text-hover-primary font-weight-bolder">New Category</a>

                                            </div>
                                        </div>

                                    </div>
                                    <!--end::Item-->

                                </div>
                                <!--end::Items-->

                                <!--begin::Chart-->
                                <div id="kt_tiles_widget_8_chart" class="card-rounded-bottom" data-color="danger"
                                     style="height: 150px"></div>
                                <!--end::Chart-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Tiles Widget 8-->
                    </div>
                    <div class="col-xl-8">
                        <div class="row">
                            <div class="col-xl-3">
                                <!--begin::Tiles Widget 9-->
                                <div class="card card-custom bgi-no-repeat bgi-size-cover gutter-b"
                                     style="height: 150px; background-image: url({{asset('/media/stock-600x400/img-26.jpg')}})">
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column">
                                        <!--begin::Title-->
                                        <a href="{{url('/admin/products')}}"
                                           class="text-white text-hover-primary font-weight-bolder font-size-h3">Products</a>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Tiles Widget 9-->
                            </div>
                            <div class="col-xl-9">
                                <!--begin::Mixed Widget 10-->
                                <div class="card card-custom gutter-b" style="height: 150px">
                                    <!--begin::Body-->
                                    <div class="card-body d-flex align-items-center justify-content-between flex-wrap">
                                        <div class="mr-2">
                                            <h3 class="font-weight-bolder">Create New Category</h3>
                                            {{--                                            <div class="text-dark-50 font-size-lg mt-2">--}}
                                            {{--                                                Generate the latest CRM Report--}}
                                            {{--                                            </div>--}}
                                        </div>
                                        <a href="{{'/admin/categories'}}"
                                           class="btn btn-primary font-weight-bold py-3 px-6">Create</a>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Mixed Widget 10-->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Tiles Widget 11-->
                                        <div class="card card-custom bg-success gutter-b" style="height: 150px">
                                            <div class="card-body">
        <span class="svg-icon svg-icon-3x svg-icon-white ml-n2"><!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"/>
        <path
            d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z"
            fill="#000000" opacity="0.3"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                                <div
                                                    class="text-inverse-success font-weight-bolder font-size-h2 mt-3"></div>

                                                <a href="{{url('/admin/invoices/0')}}"
                                                   class="text-inverse-success font-weight-bold font-size-lg mt-1">All Order</a>
                                            </div>
                                        </div>
                                        <!--end::Tiles Widget 11-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Tiles Widget 12-->
                                        <div class="card card-custom gutter-b" style="height: 150px">
                                            <div class="card-body">
        <span class="svg-icon svg-icon-3x svg-icon-success"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg--><svg
                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
            fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span>
                                                <div
                                                    class="text-dark font-weight-bolder font-size-h2 mt-3"></div>

                                                <a href="{{url('/admin/users')}}"
                                                   class="text-muted text-hover-primary font-weight-bold font-size-lg mt-1">All
                                                    Customers</a>
                                            </div>
                                        </div>
                                        <!--end::Tiles Widget 12-->
                                    </div>
                                </div>
                                <!--begin::Tiles Widget 13-->
                                <div class="card card-custom bgi-no-repeat gutter-b"
                                     style="height: 225px; background-color: #663259; background-position: calc(100% + 0.5rem) 100%; background-size: 100% auto; background-image: url({{asset('/media/svg/patterns/taieri.svg')}})">

                                    <!--begin::Body-->
                                    <div class="card-body d-flex align-items-center">
                                        <div>
                                            <h3 class="text-white font-weight-bolder line-height-lg mb-5">Canceled Order</h3>
                                            <a href='{{url('admin/invoices/6')}}' class="btn btn-success font-weight-bold px-6 py-3">Show</a>
                                        </div>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Tiles Widget 13-->
                            </div>
                            <div class="col-xl-6">
                                <!--begin::Mixed Widget 14-->
                                <div class="card card-custom bgi-no-repeat bgi-size-cover gutter-b card-stretch"
                                     style="background-image: url({{asset('/media/stock-600x600/img-16.jpg')}})">
                                    <!--begin::Body-->
                                    <div class="card-body d-flex flex-column align-items-start justify-content-start">
                                        <div class="p-1 flex-grow-1">
                                            <h3 class="text-white font-weight-bolder line-height-lg mb-5">Placed Order</h3>
                                        </div>

                                        <a href='{{url('/admin/invoices/2')}}' class="btn btn-link btn-link-warning font-weight-bold">
                                            Placed Order
                                            <span class="svg-icon svg-icon-lg svg-icon-warning"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg--><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3"
              transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000) " x="11"
              y="5" width="2" height="14" rx="1"/>
        <path
            d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
            fill="#000000" fill-rule="nonzero"
            transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997) "/>
    </g>
</svg><!--end::Svg Icon--></span> </a>
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Mixed Widget 14-->
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Row-->

            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->


@endsection


