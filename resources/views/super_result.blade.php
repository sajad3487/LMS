
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en" >
<!--begin::Head-->
<head><base href="../../../">
    <meta charset="utf-8"/>
    <title>David Nour</title>
    <meta name="description" content="Support center faq example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>        <!--end::Fonts-->



    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->

    <link href="{{asset('css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css"/>        <!--end::Layout Themes-->

    <link rel="shortcut icon" href="{{asset('media/logos/favicon.ico')}}"/>
    <script src="{{asset('js/zingchart.min.js')}}"></script>
    <style>
        .zc-body {
            background-color: #fff;
        }

        .chart--container {
            width: 100%;
            height: 100%;
            min-height: 530px;
        }

        .zc-ref {
            display: none;
        }
    </style>
</head>
<!--end::Head-->

<!--begin::Body-->
<body  id="kt_body"  class="header-fixed header-mobile-fixed  aside-minimize-hoverable page-loading"  >

<!--begin::Main-->

<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">


        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
            <!--begin::Header-->
            <div id="kt_header" class="header  header-fixed ">
                <!--begin::Container-->
                <div class=" container-fluid  d-flex align-items-stretch justify-content-between">
                    <!--begin::Header Menu Wrapper-->
                    <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                        <!--begin::Header Menu-->
                        <div id="kt_header_menu" class="header-menu header-menu-mobile  header-menu-layout-default ">
                            <!--begin::Header Nav-->
                            <ul class="menu-nav ">
                                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click"
                                    aria-haspopup="true">
                                    <a href="https://nourgroup.com/">
                                        <img alt="Logo" src="{{asset('media/logos/logo-transperant-1.png')}}" style="width: 80%"/>
                                    </a>
                                </li>
                                <li class="menu-item  menu-item-submenu menu-item-rel menu-item-active"
                                    data-menu-toggle="click" aria-haspopup="true"><a href="https://nourgroup.com/"
                                                                                     class="menu-link menu-toggle"><span
                                            class="menu-text">Home</span></a>
                                </li>
                                <li class="menu-item  menu-item-submenu" data-menu-toggle="click" aria-haspopup="true">
                                    <a href="https://nourgroup.com/big-ideas/" class="menu-link menu-toggle"><span class="menu-text">Big Ideas</span><i
                                            class="menu-arrow"></i></a>
                                </li>
                                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click"
                                    aria-haspopup="true"><a href="https://nourgroup.com/advising/" class="menu-link menu-toggle"><span
                                            class="menu-text">Advising</span></a>
                                </li>
                                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click"
                                    aria-haspopup="true"><a href="https://nourgroup.com/coaching/" class="menu-link menu-toggle"><span
                                            class="menu-text">Coaching</span></a>
                                </li>
                                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click"
                                    aria-haspopup="true"><a href="https://nourgroup.com/speaking//" class="menu-link menu-toggle"><span
                                            class="menu-text">Speaking</span></a>
                                </li>
                                <li class="menu-item  menu-item-submenu menu-item-rel" data-menu-toggle="click"
                                    aria-haspopup="true"><a href="https://nourgroup.com/resources/" class="menu-link menu-toggle"><span
                                            class="menu-text">Speaking</span></a>
                                </li>
                            </ul>
                            <!--end::Header Nav-->
                        </div>
                        <!--end::Header Menu-->
                    </div>
                    <!--end::Header Menu Wrapper-->

                </div>
                <!--end::Container-->
            </div>
            <!--end::Header-->

            <!--begin::Content-->
            <div class="content pt-0 d-flex flex-column flex-column-fluid" id="kt_content">

                <!--begin::Entry-->
                <!--begin::Hero-->
                <div class="d-flex flex-row-fluid bgi-size-cover bgi-position-top" style="background-image: url({{asset($quiz->result_banner)}})">
                    <div class=" container ">
                        <div class="d-flex justify-content-between align-items-center pt-25 pb-35">

{{--                            <div class="d-flex">--}}
{{--                                <a href="#" class="font-size-h4 font-weight-bold">Help Center</a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <!--end::Hero-->
                @if($answer->score != 0)
                <div class=" container  mt-n15">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--begin::Card-->
                            <div class="card card-custom  bg-grey-100 mb-8 mb-lg-0">
                                <!--begin::Card Body-->
                                <div class="card-body">
                                    <div class="d-flex align-items-center pl-10">
                                        <!--begin::Icon-->
                                        <div class="mr-6">
                                            <span class="svg-icon svg-icon-4x svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z" fill="#000000"/>
                                                </g>
                                            </svg><!--end::Svg Icon-->
                                            </span>
                                        </div>
                                        <!--end::Icon-->

                                        <!--begin::Content-->
                                        <div class="d-flex flex-column">
                                            <h3 class="font-weight-bolder text-dark mb-0">
                                                {{$segment->segment_title ?? ''}}
                                            </h3>
                                            <h5 class="text-primary m-0 mt-5">
                                                Your score : {{$answer->score ?? ''}}
                                            </h5>
{{--                                            <div class="text-dark-50">--}}
{{--                                                Base FAQ Questions--}}
{{--                                            </div>--}}
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                </div>
                                <!--end::Card Body-->
                            </div>
                            <!--end::Card-->
                        </div>

                    </div>
                </div>
                @endif
                <div class="container row mx-auto">
                    <!--begin::Section-->
                    <div class="col-md-4  mt-8 p-0">
                        @foreach($answer->quiz_answer as $key=>$subQuiz)
                            <div class="col-12 p-0 mb-8">
                                <!--begin::Callout-->
                                <p class="d-none">
                                    @if(fmod(($key+1),6) == 0)
                                        {{fmod(($key+1),6)}}
                                        {{$icon = '<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="12" y="4" width="3" height="13" rx="1.5"/>
        <rect fill="#000000" opacity="0.3" x="7" y="9" width="3" height="8" rx="1.5"/>
        <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
        <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/>
    </g>'}}
                                    @elseif(fmod(($key+1),6) == 1)
                                        {{$color = "info"}}
                                        {{$icon = '<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="7" y="4" width="3" height="13" rx="1.5"/>
        <rect fill="#000000" opacity="0.3" x="12" y="9" width="3" height="8" rx="1.5"/>
        <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
        <rect fill="#000000" opacity="0.3" x="17" y="11" width="3" height="6" rx="1.5"/>
    </g>'}}
                                    @elseif(fmod(($key+1),6) == 2)
                                        {{$color = "primary"}}
                                        {{$icon = '<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M4.00246329,12.2004927 L13,14 L13,4.06189375 C16.9463116,4.55399184 20,7.92038235 20,12 C20,16.418278 16.418278,20 12,20 C7.64874861,20 4.10886412,16.5261253 4.00246329,12.2004927 Z" fill="#000000" opacity="0.3"/>
        <path d="M3.0603968,10.0120794 C3.54712466,6.05992157 6.91622084,3 11,3 L11,11.6 L3.0603968,10.0120794 Z" fill="#000000"/>
    </g>'}}
                                    @elseif(fmod(($key+1),6) == 3 )
                                        {{$color = "warning"}}
                                        {{$icon = '<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
        <path d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
    </g>'}}
                                    @elseif(fmod(($key+1),6) == 4 )
                                        {{$color = "danger"}}
                                        {{$icon = '<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
        <path d="M8.7295372,14.6839411 C8.35180695,15.0868534 7.71897114,15.1072675 7.31605887,14.7295372 C6.9131466,14.3518069 6.89273254,13.7189711 7.2704628,13.3160589 L11.0204628,9.31605887 C11.3857725,8.92639521 11.9928179,8.89260288 12.3991193,9.23931335 L15.358855,11.7649545 L19.2151172,6.88035571 C19.5573373,6.44687693 20.1861655,6.37289714 20.6196443,6.71511723 C21.0531231,7.05733733 21.1271029,7.68616551 20.7848828,8.11964429 L16.2848828,13.8196443 C15.9333973,14.2648593 15.2823707,14.3288915 14.8508807,13.9606866 L11.8268294,11.3801628 L8.7295372,14.6839411 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(14.000019, 10.749981) scale(1, -1) translate(-14.000019, -10.749981) "/>
    </g>'}}
                                    @elseif(fmod(($key+1),6) == 5 )
                                        {{$color = "second"}}
                                        {{$icon = '<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <rect x="0" y="0" width="24" height="24"/>
        <rect fill="#000000" opacity="0.3" x="17" y="4" width="3" height="13" rx="1.5"/>
        <rect fill="#000000" opacity="0.3" x="12" y="9" width="3" height="8" rx="1.5"/>
        <path d="M5,19 L20,19 C20.5522847,19 21,19.4477153 21,20 C21,20.5522847 20.5522847,21 20,21 L4,21 C3.44771525,21 3,20.5522847 3,20 L3,4 C3,3.44771525 3.44771525,3 4,3 C4.55228475,3 5,3.44771525 5,4 L5,19 Z" fill="#000000" fill-rule="nonzero"/>
        <rect fill="#000000" opacity="0.3" x="7" y="11" width="3" height="6" rx="1.5"/>
    </g>'}}

                                    @endif
                                </p>
                                <div class="card card-custom wave wave-animate-slow wave-{{$color}} mb-8 mb-lg-0">
                                    <div class="card-body p-3">
                                        <div class="d-flex align-items-center p-5">
                                            <!--begin::Icon-->
                                            <div class="mr-6">
                                            <span class="svg-icon svg-icon-{{$color}} svg-icon-4x"><!--begin::Svg Icon | path:assets/media/svg/icons/Home/Mirror.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                {!! $icon !!}
                                            </svg><!--end::Svg Icon--></span>
                                            </div>
                                            <!--end::Icon-->

                                            <!--begin::Content-->
                                            <div class="d-flex flex-column">
                                                <a href="{{url("superQuizzes/$subQuiz->id/subquiz_result/$answer->id")}}" class="text-dark text-hover-primary font-weight-bold font-size-h4 mb-3">
                                                    {{$subQuiz->quiz->title ?? ''}}
                                                </a>
                                                <div class="text-dark-75">
                                                    Section score : {{$subQuiz->score ?? ''}}
                                                </div>
                                            </div>
                                            <!--end::Content-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Callout-->
                            </div>
                            @endforeach
                    </div>
                    <!--end::Section-->
                    <!--begin::Section-->
                    <div class="col-md-8 mt-8 p-0 pl-8">
                        <!--begin::Card-->
                        <div class="card mb-8">
                            <!--begin::Body-->
                            <div class="card-body p-10">
                                <!--begin::Row-->
                                <div class="row">

                                    <div class="col-lg-12 pl-20">
                                        @if($answer->score !=0)
                                            <h4>Details of your result :</h4>
                                        @endif
                                        <div id="myChart" class="chart--container">
                                        </div>


                                    </div>
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Item-->
                    </div>
                    <!--end::Sectiocontainer n-->


                </div>
            </div>
            <!--end::Content-->

            <!--begin::Footer-->
            <div class="footer bg-white py-4 d-flex flex-lg-column " id="kt_footer">
                <!--begin::Container-->
                <div class=" container-fluid  d-flex flex-column flex-md-row align-items-center justify-content-between">
                    <!--begin::Copyright-->
                    <div class="text-dark order-2 order-md-1">
                        <span class="text-muted font-weight-bold mr-2">2020&copy;</span>
                        <a href="http://keenthemes.com/metronic" target="_blank" class="text-dark-75 text-hover-primary"></a>
                    </div>
                    <!--end::Copyright-->

                    <!--begin::Nav-->
                    <div class="nav nav-dark">
                        <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">Home</a>
                        <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">Advising</a>
                        <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">Speaking</a>
                        <a href="http://keenthemes.com/metronic" target="_blank" class="nav-link pl-0 pr-5">Training</a>
                    </div>
                    <!--end::Nav-->
                </div>
                <!--end::Container-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->


<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
	<span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
        <path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z" fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span></div>
<!--end::Scrolltop-->




<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>
    var KTAppSettings = {
        "breakpoints": {
            "sm": 576,
            "md": 768,
            "lg": 992,
            "xl": 1200,
            "xxl": 1400
        },
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };
</script>
<!--end::Global Config-->
<script>
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "b55b025e438fa8a98e32482b5f768ff5"];
    var myConfig = {
        type: 'radar',
        plot: {
            aspect: 'area',
            animation: {
                effect: 3,
                sequence: 1,
                speed: 700
            }
        },
        scaleV: {
            visible: false
        },
        scaleK: {
            values: '0:{{$answer->quiz_answer->count()-1}}:1',
            labels: [
                @foreach($answer->quiz_answer as $subquiz)
                    '{{$subquiz->quiz->title}}',
                @endforeach
            ],
            item: {
                fontColor: '#607D8B',
                backgroundColor: "white",
                borderColor: "#aeaeae",
                borderWidth: 1,
                padding: '5 10',
                borderRadius: 10
            },
            refLine: {
                lineColor: '#c10000'
            },
            tick: {
                lineColor: '#59869c',
                lineWidth: 2,
                lineStyle: 'dotted',
                size: 20
            },
            guide: {
                lineColor: "#607D8B",
                lineStyle: 'solid',
                alpha: 0.3,
                backgroundColor: "#c5c5c5 #718eb4"
            }
        },
        series: [{
            values: [
                @foreach($answer->quiz_answer as $subquiz)
                    {{$subquiz->score}},
                @endforeach
            ],
            text: 'farm'
        },
            {
                values: [],
                lineColor: '#53a534',
                backgroundColor: '#689F38'
            }
        ]
    };

    zingchart.render({
        id: 'myChart',
        data: myConfig,
        height: '100%',
        width: '100%'
    });
</script>
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle-->


</body>
<!--end::Body-->
</html>
