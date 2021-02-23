<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <base href="../../../">
    <meta charset="utf-8"/>
    <title>Nour Group</title>
    <meta name="description" content="Support center faq example"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->


    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->

    <link href="{{asset('css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Layout Themes-->
    <link href="{{asset('/css/style.quiz.css')}}" rel="stylesheet" type="text/css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link rel="shortcut icon" href="{{asset('media/logos/favicon.ico')}}"/>

</head>
<!--end::Head-->

<!--begin::Body-->
<body id="kt_body" class="header-fixed header-mobile-fixed  aside-minimize-hoverable page-loading">

<!--begin::Main-->
<!--begin::Header Mobile-->
<div id="kt_header_mobile" class="header-mobile align-items-center  header-mobile-fixed ">
    <!--begin::Logo-->
    <a href="index.html">
        <img alt="Logo" src="{{asset('media/logos/logo-light.png')}}"/>
    </a>
    <!--end::Logo-->

    <!--begin::Toolbar-->
    <div class="d-flex align-items-center">
        <!--begin::Aside Mobile Toggle-->
        <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
            <span></span>
        </button>
        <!--end::Aside Mobile Toggle-->

        <!--begin::Header Menu Mobile Toggle-->
        <button class="btn p-0 burger-icon ml-4" id="kt_header_mobile_toggle">
            <span></span>
        </button>
        <!--end::Header Menu Mobile Toggle-->

        <!--begin::Topbar Mobile Toggle-->
        <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
			<span class="svg-icon svg-icon-xl"><!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg--><svg
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                    height="24px" viewBox="0 0 24 24" version="1.1">
    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
        <polygon points="0 0 24 0 24 24 0 24"/>
        <path
            d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
            fill="#000000" fill-rule="nonzero" opacity="0.3"/>
        <path
            d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
            fill="#000000" fill-rule="nonzero"/>
    </g>
</svg><!--end::Svg Icon--></span></button>
        <!--end::Topbar Mobile Toggle-->
    </div>
    <!--end::Toolbar-->
</div>
<!--end::Header Mobile-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">


        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper pt-10" id="kt_wrapper">
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
            <div class="content  d-flex flex-column flex-column-fluid pt-0" id="kt_content">

                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">

                    <!--begin::Container-->
                    <div class=" container ">

                        <!--begin::hero-->
                        <img class="img-fluid" src="{{asset($super_quiz->banner)}}" alt="">
                        <!--end::hero-->


                        <?php $i=1 ?>
                        <div class="container p-0" style="min-height: 500px">
                            <div class="wrapper pt-0 mt-0">
                                <div class="card bg-white-o-100 rounded-0 mb-2 px-10 pb-5 border-0">
                                    <div class="mt-5 pt-3">
                                        <h1 class="font-weight-bolder text-dark mb-6">
                                            {{$super_quiz->title ?? ''}}
                                        </h1>
                                        {!! $super_quiz->description ?? ''!!}

                                    </div>
                                </div>
                                <ul class="steps">
                                    <li class="is-active">Information</li>
                                    @foreach($super_quiz->quiz as $key=>$quiz)
                                    <li>{{$key+1}}. {{$quiz->title ?? ''}}</li>
                                    @endforeach

{{--                                    <li>Stsadfs dfs sadep 4</li>--}}
{{--                                    <li>Stsadfs dfs sadep 5</li>--}}
{{--                                    <li>Stsadfs dfs sadep 6</li>--}}
                                </ul>

                                <form class="form form-wrapper" action="{{url("superQuizzes/submit")}}" method="post">

                                    <fieldset class="section is-active">
                                        @csrf
                                        <h3>Information</h3>
                                        <input type="number" name="form_id" value="{{$super_quiz->id}}" class="d-none">
                                        <div class="row">
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label>{{$super_quiz->first_name_label ?? ''}}</label>
                                                <input type="text" name="first_name" class="form-control form-control-solid" @if($super_quiz->first_name_requirement == 1 ) required @endif  @if($super_quiz->placeholder == 1) placeholder="{{$super_quiz->first_name_label ?? ''}}" @endif/>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label>{{$super_quiz->last_name_label ?? ''}}</label>
                                                <input type="text" name="last_name" class="form-control form-control-solid" @if($super_quiz->last_name_requirement == 1 ) required @endif  @if($super_quiz->placeholder == 1) placeholder="{{$super_quiz->last_name_label ?? ''}}" @endif/>
                                            </div>
                                            <div class="form-group col-md-6 col-lg-4">
                                                <label>{{$super_quiz->email_label ?? ''}}</label>
                                                <input type="email" name="email" class="form-control form-control-solid" @if($super_quiz->email_requirement == 1 ) required @endif  @if($super_quiz->placeholder == 1) placeholder="{{$super_quiz->email_label ?? ''}}" @endif/>
                                            </div>
                                        </div>
                                        <div class="row">
                                            @if($super_quiz->first_info_status == 1)
                                                <div class="form-group col-md-6 col-lg-4">
                                                    <label>{{$super_quiz->first_info_label ?? ''}}</label>
                                                    <input type="text" name="first_info" class="form-control form-control-solid" required placeholder="{{$super_quiz->first_info_label ?? ''}}" />
                                                </div>
                                            @endif
                                            @if($super_quiz->second_info_status == 1)
                                                <div class="form-group col-md-6 col-lg-4">
                                                    <label>{{$super_quiz->second_info_label ?? ''}}</label>
                                                    <input type="text" name="second_info" class="form-control form-control-solid" required placeholder="{{$super_quiz->second_info_label ?? ''}}" />
                                                </div>
                                            @endif
                                            @if($super_quiz->date_info_status == 1)
                                                <div class="form-group col-md-6 col-lg-4">
                                                    <label>{{$super_quiz->date_info_label ?? ''}}</label>
                                                    <input type="date" name="date_info" class="form-control form-control-solid" required placeholder="{{$super_quiz->date_info_label ?? ''}}" />
                                                </div>
                                            @endif
                                        </div>
                                        <div class="button">Next</div>
                                    </fieldset>
                                    @foreach($super_quiz->quiz as $quizKey=>$quiz)
                                    <fieldset class="section">
                                        <h3>{{$quiz->body ?? ''}}</h3>
                                        <div class=" cf">
                                            @foreach($quiz->question as $key=>$question)
                                                @if($question->type == 'question')
                                                    <div class="form-group px-10 m-0">
                                                        <label class="row col-form-label h6">{{$i++}}) {{$question->body ?? ''}}
                                                        </label>
                                                        <p class="row text-muted m-0 ">{{$question->description ?? ''}}</p>

                                                        <div class="row col-form-label px-4">
                                                            <div class="radio-inline">
                                                                @foreach($question->option as $option)
                                                                    <label class="radio radio-outline radio-outline-2x radio-primary">
                                                                        <input type="radio" value="{{$option->id}}" name="quiz[{{$quiz->id}}][{{$question->id}}]" @if($question->requirement) required @endif/>
                                                                        <span></span>
                                                                        {{$option->body ?? ''}}
                                                                    </label>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                        <input type="text" name="additional_info[{{$question->id}}]" style="width: 100%" class="form-control mt-2  @if(!$question->additional_info) d-none @endif"  placeholder="Additional information"/>
                                                    </div>
                                                @elseif($question->type == 'multi_answer')
                                                    <div class="form-group px-10 m-0">
                                                        <label class="row col-form-label h6">{{$i++}}) {{$question->body ?? ''}}
                                                        </label>
                                                        <p class="row text-muted m-0 ">{{$question->description ?? ''}}</p>

                                                        <div class="row col-form-label px-4">
                                                            <div class="checkbox-inline">
                                                                @foreach($question->option as $optionKey=>$option)

                                                                    <label class="checkbox checkbox-success" >
                                                                        <input type="checkbox" name="quiz[{{$quiz->id}}][{{$question->id}}][{{$optionKey}}]" value="{{$option->id}}"  />
                                                                        <span></span>
                                                                        {{$option->body ?? ''}}
                                                                    </label>

                                                                @endforeach
                                                            </div>
                                                            <input type="text" name="additional_info[{{$question->id}}]" style="width: 100%" class="form-control form-control-sm mt-2  @if(!$question->additional_info) d-none @endif"  placeholder="Additional information"/>
                                                        </div>
                                                    </div>
                                                @elseif($question->type == 'title')
                                                    <div class="form-group px-10 m-0">
                                                        <label class="row col-form-label text-primary h4 mt-5"> {{$question->body ?? ''}}
                                                        </label>
                                                        <p class="row text-muted m-0 ">{{$question->description ?? ''}}</p>

                                                    </div>

                                                @endif
                                                                                        <hr class="m-0">

                                            @endforeach
                                        </div>
                                        @if($quizKey == $super_quiz->quiz->count()-1)
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success w-100px mt-2">Submit</button>
                                            </div>
                                        @else
                                            <div class="button">Next</div>
                                        @endif
                                    </fieldset>
                                    @endforeach

                                </form>
                            </div>
                        </div>

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Entry-->
            </div>

            <!--end::Content-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Main-->


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
    $(document).ready(function(){
        $(".form-wrapper .button").click(function(){
            var button = $(this);
            var currentSection = button.parents(".section");
            var currentSectionIndex = currentSection.index();
            var headerSection = $('.steps li').eq(currentSectionIndex);
            currentSection.removeClass("is-active").next().addClass("is-active");
            headerSection.removeClass("is-active").next().addClass("is-active");

            // $(".form-wrapper").submit(function(e) {
            //     e.preventDefault();
            // });

            if(currentSectionIndex === 8){
                $(document).find(".form-wrapper .section").first().addClass("is-active");
                $(document).find(".steps li").first().addClass("is-active");
            }
        });
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
