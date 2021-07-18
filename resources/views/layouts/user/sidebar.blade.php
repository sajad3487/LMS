<!--begin::Aside-->
<div class="flex-row-auto offcanvas-mobile w-300px w-xl-325px" id="kt_profile_aside">
    <!--begin::Nav Panel Widget 1-->
    <div class="card card-custom gutter-b">
        <!--begin::Body-->
        <div class="card-body">
            <!--begin::Wrapper-->
            <div class="d-flex justify-content-between flex-column pt-4 h-100">
                <!--begin::Container-->
                <div class="pb-5">
                    <!--begin::Header-->
                    <div class="d-flex flex-column flex-center">
                        <!--begin::Symbol-->
                        <div class="symbol symbol-120 symbol-circle symbol-success overflow-hidden">
                            <a href="{{url('/participant')}}">
                                <img src="{{asset($user->profile_picture)}}" class="h-100 align-self-end" alt=""/>
                            </a>
                        </div>
                        <!--end::Symbol-->

                        <!--begin::Username-->
                        <a href="{{url('participant/profile')}}" class="card-title font-weight-bolder text-dark-75 text-hover-primary font-size-h4 m-0 pt-7 pb-1">{{$user->name ?? ''}}</a>
                        <!--end::Username-->

                        <!--begin::Info-->
                        <div class="font-weight-bold text-dark-50 font-size-sm pb-6">
                            <p class="m-0 text-center">{{$user->position ?? ''}}</p>
                            <p class="m-0 text-center">{{$user->company->name ?? ''}}</p>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="pt-1">
                        <p class="text-muted">Quizzes and Assessment:</p>
                        @if(isset($quizzes) && $quizzes != null)
                            @foreach($quizzes as $key=>$quiz)
                                @if($quiz->answer_status == 0)
                                    <!--begin::Item-->
                                        <div class="d-flex align-items-center pb-9">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-45 symbol-light-primary mr-4">
                                                <span class="symbol-label">
                                                    <span class="svg-icon svg-icon-2x svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M19,11 L20,11 C21.6568542,11 23,12.3431458 23,14 C23,15.6568542 21.6568542,17 20,17 L19,17 L19,20 C19,21.1045695 18.1045695,22 17,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,17 L5,17 C6.65685425,17 8,15.6568542 8,14 C8,12.3431458 6.65685425,11 5,11 L3,11 L3,8 C3,6.8954305 3.8954305,6 5,6 L8,6 L8,5 C8,3.34314575 9.34314575,2 11,2 C12.6568542,2 14,3.34314575 14,5 L14,6 L17,6 C18.1045695,6 19,6.8954305 19,8 L19,11 Z" fill="#000000" opacity="0.3"/>
                                                        </g>
                                                    </svg><!--end::Svg Icon--></span>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Text-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <a href="{{url("quiz/$quiz->id/view")}}" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{$quiz->title ?? ''}}</a>
                                                {{--                                        <span class="text-muted font-weight-bold">Successful Fellas</span>--}}
                                            </div>
                                            <!--end::Text-->

                                            <a href="{{url("quiz/$quiz->id/view")}}" class="btn btn-icon btn-light-danger pulse pulse-danger mr-2 p-6">
                                                New
                                                <span class="pulse-ring">New</span>
                                            </a>
                                        </div>
                                        <!--end::Item-->
                                @elseif($quiz->answer_status == 1)
                                    <!--begin::Item-->
                                        <div class="d-flex align-items-center pb-9">
                                            <!--begin::Symbol-->
                                            <div class="symbol symbol-45 symbol-light mr-4">
                                                <span class="symbol-label">
                                                    <span class="svg-icon svg-icon-2x svg-icon-dark-50"><!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect x="0" y="0" width="24" height="24"/>
                                                            <path d="M8,3 L8,3.5 C8,4.32842712 8.67157288,5 9.5,5 L14.5,5 C15.3284271,5 16,4.32842712 16,3.5 L16,3 L18,3 C19.1045695,3 20,3.8954305 20,5 L20,21 C20,22.1045695 19.1045695,23 18,23 L6,23 C4.8954305,23 4,22.1045695 4,21 L4,5 C4,3.8954305 4.8954305,3 6,3 L8,3 Z" fill="#000000" opacity="0.3"/>
                                                            <path d="M11,2 C11,1.44771525 11.4477153,1 12,1 C12.5522847,1 13,1.44771525 13,2 L14.5,2 C14.7761424,2 15,2.22385763 15,2.5 L15,3.5 C15,3.77614237 14.7761424,4 14.5,4 L9.5,4 C9.22385763,4 9,3.77614237 9,3.5 L9,2.5 C9,2.22385763 9.22385763,2 9.5,2 L11,2 Z" fill="#000000"/>
                                                            <rect fill="#000000" opacity="0.3" x="10" y="9" width="7" height="2" rx="1"/>
                                                            <rect fill="#000000" opacity="0.3" x="7" y="9" width="2" height="2" rx="1"/>
                                                            <rect fill="#000000" opacity="0.3" x="7" y="13" width="2" height="2" rx="1"/>
                                                            <rect fill="#000000" opacity="0.3" x="10" y="13" width="7" height="2" rx="1"/>
                                                            <rect fill="#000000" opacity="0.3" x="7" y="17" width="2" height="2" rx="1"/>
                                                            <rect fill="#000000" opacity="0.3" x="10" y="17" width="7" height="2" rx="1"/>
                                                        </g>
                                                        </svg><!--end::Svg Icon-->
                                                    </span>
                                                </span>
                                            </div>
                                            <!--end::Symbol-->

                                            <!--begin::Text-->
                                            <div class="d-flex flex-column flex-grow-1">
                                                <a href="{{url("participant/$quiz->id/done_quiz")}}" class="text-dark-75 text-hover-primary mb-1 font-size-lg font-weight-bolder">{{$quiz->title ?? ''}}</a>
                                                {{--                                        <span class="text-muted font-weight-bold">PHP, SQLite, Artisan CLI</span>--}}
                                            </div>
                                            <!--end::Text-->
                                        </div>
                                        <!--end::Item-->
                                    @endif
                                @endforeach

                            @endif
                    </div>
                    <!--end::Body-->
                </div>
                <!--eng::Container-->

                <!--begin::Footer-->
            {{--                        <div class="d-flex flex-center" id="kt_sticky_toolbar_chat_toggler" data-toggle="tooltip" title="" data-placement="right" data-original-title="Chat Example">--}}
            {{--                            <button class="btn btn-primary font-weight-bolder font-size-sm py-3 px-14" data-toggle="modal" data-target="#kt_chat_modal">Write a Message</button>--}}
            {{--                        </div>--}}
            <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Nav Panel Widget 1-->

    <!--begin::List Widget 17-->
    <div class="card card-custom gutter-b">
        <!--begin::Header-->
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label font-weight-bolder text-dark">Evaluations</span>
{{--                <span class="text-muted mt-3 font-weight-bold font-size-sm">24 Books to Return</span>--}}
            </h3>
            <div class="card-toolbar">
            </div>
        </div>
        <!--end::Header-->

        <!--begin::Body-->
        <div class="card-body pt-4">
            <!--begin::Container-->
            <div>
                @if($user->circles->count() != 0)
                    @foreach($user->circles as $circle)
                        <!--begin::Item-->
                            <div class="d-flex align-items-center mb-8">
                                <!--begin::Symbol-->
                                <div class="symbol mr-5 pt-1">
                                    <div class="symbol symbol-70 symbol-light-success mr-4">
                                         <span class="symbol-label">
                                             <span class="svg-icon svg-icon-2x svg-icon-success"><!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                 <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                     <rect x="0" y="0" width="24" height="24"/>
                                                     <path d="M19,11 L20,11 C21.6568542,11 23,12.3431458 23,14 C23,15.6568542 21.6568542,17 20,17 L19,17 L19,20 C19,21.1045695 18.1045695,22 17,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,17 L5,17 C6.65685425,17 8,15.6568542 8,14 C8,12.3431458 6.65685425,11 5,11 L3,11 L3,8 C3,6.8954305 3.8954305,6 5,6 L8,6 L8,5 C8,3.34314575 9.34314575,2 11,2 C12.6568542,2 14,3.34314575 14,5 L14,6 L17,6 C18.1045695,6 19,6.8954305 19,8 L19,11 Z" fill="#000000" opacity="0.3"/>
                                                 </g>
                                             </svg><!--end::Svg Icon-->
                                             </span>
                                         </span>
                                    </div>
                                </div>
                                <!--end::Symbol-->

                                <!--begin::Info-->
                                <div class="d-flex flex-column">
                                    <!--begin::Title-->
                                    <a href="{{url("participant/circle/$circle->id/view")}}" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">
                                        {{$circle->title ?? ''}}
                                        @if(isset($circle->new_message) && $circle->new_message != 0)
                                            <span class="label label-sm label-rounded label-danger">{{$circle->new_message}}</span>
                                        @endif
                                    </a>
                                    <!--end::Title-->

                                    <!--begin::Text-->
{{--                                    <span class="text-muted font-weight-bold font-size-sm pb-4">--}}
{{--                                        asda--}}
{{--                                    </span>--}}
                                    <!--end::Text-->

                                    <!--begin::Action-->
                                    <div><a href="{{url("participant/circle/$circle->id/view")}}" class="btn btn-light-info font-weight-bolder font-size-sm py-2 mt-3">View</a></div>
                                    <!--end::Action-->
                                </div>
                                <!--end::Info-->
                            </div>
                            <!--end::Item-->
                        @endforeach
                    @endif
            </div>
            <!--end::Container-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::List Widget 17-->
</div>
<!--end::Aside-->


























{{--<!--begin::Aside-->--}}
{{--<div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">--}}
{{--    <!--begin::Profile Card-->--}}
{{--    <div class="card card-custom card-stretch">--}}
{{--        <!--begin::Body-->--}}
{{--        <div class="card-body pt-4">--}}
{{--            <!--begin::Toolbar-->--}}
{{--                            <div class="d-flex justify-content-end">--}}
{{--                                <div class="dropdown dropdown-inline">--}}
{{--                                    <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                        <i class="ki ki-bold-more-hor"></i>--}}
{{--                                    </a>--}}
{{--                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">--}}
{{--                                        <!--begin::Navigation-->--}}
{{--                                        <ul class="navi navi-hover py-5">--}}
{{--                                            <li class="navi-item">--}}
{{--                                                <a href="#" class="navi-link">--}}
{{--                                                    <span class="navi-icon"><i class="flaticon2-drop"></i></span>--}}
{{--                                                    <span class="navi-text">New Group</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="navi-item">--}}
{{--                                                <a href="#" class="navi-link">--}}
{{--                                                    <span class="navi-icon"><i class="flaticon2-list-3"></i></span>--}}
{{--                                                    <span class="navi-text">Contacts</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="navi-item">--}}
{{--                                                <a href="#" class="navi-link">--}}
{{--                                                    <span class="navi-icon"><i class="flaticon2-rocket-1"></i></span>--}}
{{--                                                    <span class="navi-text">Groups</span>--}}
{{--                                                    <span class="navi-link-badge">--}}
{{--                        <span class="label label-light-primary label-inline font-weight-bold">new</span>--}}
{{--                    </span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="navi-item">--}}
{{--                                                <a href="#" class="navi-link">--}}
{{--                                                    <span class="navi-icon"><i class="flaticon2-bell-2"></i></span>--}}
{{--                                                    <span class="navi-text">Calls</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="navi-item">--}}
{{--                                                <a href="#" class="navi-link">--}}
{{--                                                    <span class="navi-icon"><i class="flaticon2-gear"></i></span>--}}
{{--                                                    <span class="navi-text">Settings</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}

{{--                                            <li class="navi-separator my-3"></li>--}}

{{--                                            <li class="navi-item">--}}
{{--                                                <a href="#" class="navi-link">--}}
{{--                                                    <span class="navi-icon"><i class="flaticon2-magnifier-tool"></i></span>--}}
{{--                                                    <span class="navi-text">Help</span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                            <li class="navi-item">--}}
{{--                                                <a href="#" class="navi-link">--}}
{{--                                                    <span class="navi-icon"><i class="flaticon2-bell-2"></i></span>--}}
{{--                                                    <span class="navi-text">Privacy</span>--}}
{{--                                                    <span class="navi-link-badge">--}}
{{--                        <span class="label label-light-danger label-rounded font-weight-bold">5</span>--}}
{{--                    </span>--}}
{{--                                                </a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                        <!--end::Navigation-->--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--        <!--end::Toolbar-->--}}

{{--            <!--begin::User-->--}}
{{--            <div class="d-flex align-items-center mt-5">--}}
{{--                <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">--}}
{{--                    <div class="symbol-label" style="background-image:url('{{asset($user->profile_picture)}}')"></div>--}}
{{--                    <i class="symbol-badge bg-success"></i>--}}
{{--                </div>--}}
{{--                <div>--}}
{{--                    <a href="{{url('participant')}}" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">--}}
{{--                        {{$user->name ?? ''}}--}}
{{--                    </a>--}}

{{--                    <div class="mt-2">--}}
{{--                        <a href="{{url('participant/profile')}}" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Profile</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--end::User-->--}}

{{--            <!--begin::Contact-->--}}
{{--            <div class="py-9">--}}
{{--                <div class="d-flex align-items-center justify-content-between mb-2">--}}
{{--                    <span class="font-weight-bold mr-2">Email:</span>--}}
{{--                    <a href="#" class="text-muted text-hover-primary">{{$user->email ?? ''}}</a>--}}
{{--                </div>--}}
{{--                <div class="d-flex align-items-center justify-content-between mb-2">--}}
{{--                    <span class="font-weight-bold mr-2">Company:</span>--}}
{{--                    <span class="text-muted">{{$user->business_name ?? ''}}</span>--}}
{{--                </div>--}}
{{--                <div class="d-flex align-items-center justify-content-between">--}}
{{--                    <span class="font-weight-bold mr-2">Position:</span>--}}
{{--                    <span class="text-muted">{{$user->position ?? ''}}</span>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--end::Contact-->--}}

{{--            <!--begin::Nav-->--}}
{{--            <div class="navi navi-bold navi-hover navi-active navi-link-rounded">--}}
{{--                @foreach($user->circles as $circle)--}}
{{--                    <div class="navi-item mb-2 @if(isset($active_circle) && $active_circle->id == $circle->id)  bg-light @endif">--}}
{{--                        <a href="{{url("participant/circle/$circle->id/view")}}" class="navi-link py-4" data-toggle="tooltip">--}}
{{--                                <span class="navi-icon mr-2">--}}
{{--                                    <span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Files/File.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                                <polygon points="0 0 24 0 24 24 0 24"/>--}}
{{--                                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>--}}
{{--                                                <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>--}}
{{--                                                <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>--}}
{{--                                            </g>--}}
{{--                                        </svg><!--end::Svg Icon-->--}}
{{--                                    </span>--}}
{{--                                </span>--}}
{{--                            <span class="navi-text font-size-lg">{{$circle->title ?? ''}}</span>--}}
{{--                            @if(isset($circle->new_message) && $circle->new_message != 0)--}}
{{--                            <span class="label label-sm label-rounded label-danger">{{$circle->new_message}}</span>--}}
{{--                            @endif--}}
{{--                            <span class="navi-label">--}}
{{--                                <span class="label label-light-danger label-inline font-weight-bold">new</span>--}}
{{--                            </span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                    @endforeach--}}
{{--            </div>--}}
{{--            <!--end::Nav-->--}}
{{--        </div>--}}
{{--        <!--end::Body-->--}}
{{--    </div>--}}
{{--    <!--end::Profile Card-->--}}
{{--</div>--}}
{{--<!--end::Aside-->--}}
