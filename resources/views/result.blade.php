
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
                <div class="d-flex flex-row-fluid bgi-size-cover bgi-position-top" style="background-image: url({{asset('media/bg/bg-9.jpg')}})">
                    <div class=" container ">
                        <div class="d-flex justify-content-between align-items-center pt-25 pb-35">
                            <h3 class="font-weight-bolder text-dark mb-0">
                                {{$segment->segment_title ?? ''}}
                            </h3>
{{--                            <div class="d-flex">--}}
{{--                                <a href="#" class="font-size-h4 font-weight-bold">Help Center</a>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
                <!--end::Hero-->
                <div class=" container  mt-n15">
                    <div class="row">
                        <div class="col-lg-12">
                            <!--begin::Card-->
                            <div class="card card-custom wave wave-animate-slow bg-grey-100 mb-8 mb-lg-0">
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
                                            <h3 class="text-dark h3 m-0">
                                                Your score : {{$score ?? ''}}
                                            </h3>
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
                <!--begin::Section-->
                <div class=" container mt-10">
                    <!--begin::Card-->
                    <div class="card mb-8">
                        <!--begin::Body-->
                        <div class="card-body p-10">
                            <!--begin::Row-->
                            <div class="row">

                                <div class="col-lg-12 pl-20">
                                    <h4>Description :</h4>
                                    <p>
                                        {!! $segment->result_body ?? '' !!}
                                    </p>
                                </div>
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Item-->
                </div>
                <!--end::Section-->

                <!--begin::Section-->

                <!--end::Section-->
                <!--end::Entry-->
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

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{asset('js/scripts.bundle.js')}}"></script>
<!--end::Global Theme Bundle-->


</body>
<!--end::Body-->
</html>
