<!--begin::Aside-->
<div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
    <!--begin::Profile Card-->
    <div class="card card-custom card-stretch">
        <!--begin::Body-->
        <div class="card-body pt-4">
            <!--begin::Toolbar-->
        {{--                    <div class="d-flex justify-content-end">--}}
        {{--                        <div class="dropdown dropdown-inline">--}}
        {{--                            <a href="#" class="btn btn-clean btn-hover-light-primary btn-sm btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
        {{--                                <i class="ki ki-bold-more-hor"></i>--}}
        {{--                            </a>--}}
        {{--                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">--}}
        {{--                                <!--begin::Navigation-->--}}
        {{--                                <ul class="navi navi-hover py-5">--}}
        {{--                                    <li class="navi-item">--}}
        {{--                                        <a href="#" class="navi-link">--}}
        {{--                                            <span class="navi-icon"><i class="flaticon2-drop"></i></span>--}}
        {{--                                            <span class="navi-text">New Group</span>--}}
        {{--                                        </a>--}}
        {{--                                    </li>--}}
        {{--                                    <li class="navi-item">--}}
        {{--                                        <a href="#" class="navi-link">--}}
        {{--                                            <span class="navi-icon"><i class="flaticon2-list-3"></i></span>--}}
        {{--                                            <span class="navi-text">Contacts</span>--}}
        {{--                                        </a>--}}
        {{--                                    </li>--}}
        {{--                                    <li class="navi-item">--}}
        {{--                                        <a href="#" class="navi-link">--}}
        {{--                                            <span class="navi-icon"><i class="flaticon2-rocket-1"></i></span>--}}
        {{--                                            <span class="navi-text">Groups</span>--}}
        {{--                                            <span class="navi-link-badge">--}}
        {{--                <span class="label label-light-primary label-inline font-weight-bold">new</span>--}}
        {{--            </span>--}}
        {{--                                        </a>--}}
        {{--                                    </li>--}}
        {{--                                    <li class="navi-item">--}}
        {{--                                        <a href="#" class="navi-link">--}}
        {{--                                            <span class="navi-icon"><i class="flaticon2-bell-2"></i></span>--}}
        {{--                                            <span class="navi-text">Calls</span>--}}
        {{--                                        </a>--}}
        {{--                                    </li>--}}
        {{--                                    <li class="navi-item">--}}
        {{--                                        <a href="#" class="navi-link">--}}
        {{--                                            <span class="navi-icon"><i class="flaticon2-gear"></i></span>--}}
        {{--                                            <span class="navi-text">Settings</span>--}}
        {{--                                        </a>--}}
        {{--                                    </li>--}}

        {{--                                    <li class="navi-separator my-3"></li>--}}

        {{--                                    <li class="navi-item">--}}
        {{--                                        <a href="#" class="navi-link">--}}
        {{--                                            <span class="navi-icon"><i class="flaticon2-magnifier-tool"></i></span>--}}
        {{--                                            <span class="navi-text">Help</span>--}}
        {{--                                        </a>--}}
        {{--                                    </li>--}}
        {{--                                    <li class="navi-item">--}}
        {{--                                        <a href="#" class="navi-link">--}}
        {{--                                            <span class="navi-icon"><i class="flaticon2-bell-2"></i></span>--}}
        {{--                                            <span class="navi-text">Privacy</span>--}}
        {{--                                            <span class="navi-link-badge">--}}
        {{--                <span class="label label-light-danger label-rounded font-weight-bold">5</span>--}}
        {{--            </span>--}}
        {{--                                        </a>--}}
        {{--                                    </li>--}}
        {{--                                </ul>--}}
        {{--                                <!--end::Navigation-->--}}
        {{--                            </div>--}}
        {{--                        </div>--}}
        {{--                    </div>--}}
        <!--end::Toolbar-->

            <!--begin::User-->
            <div class="d-flex align-items-center mt-5">
                <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                    <div class="symbol-label" style="background-image:url('{{asset($user->profile_picture)}}')"></div>
                    <i class="symbol-badge bg-success"></i>
                </div>
                <div>
                    <a href="{{url('participant')}}" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">
                        {{$user->name ?? ''}}
                    </a>

                    <div class="mt-2">
                        <a href="{{url('participant/profile')}}" class="btn btn-sm btn-primary font-weight-bold mr-2 py-2 px-3 px-xxl-5 my-1">Profile</a>
                    </div>
                </div>
            </div>
            <!--end::User-->

            <!--begin::Contact-->
            <div class="py-9">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold mr-2">Email:</span>
                    <a href="#" class="text-muted text-hover-primary">{{$user->email ?? ''}}</a>
                </div>
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="font-weight-bold mr-2">Company:</span>
                    <span class="text-muted">{{$user->business_name ?? ''}}</span>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                    <span class="font-weight-bold mr-2">Position:</span>
                    <span class="text-muted">{{$user->position ?? ''}}</span>
                </div>
            </div>
            <!--end::Contact-->

            <!--begin::Nav-->
            <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                @foreach($user->circles as $circle)
                    <div class="navi-item mb-2 @if(isset($active_circle) && $active_circle->id == $circle->id)  bg-light @endif">
                        <a href="{{url("participant/circle/$circle->id/view")}}" class="navi-link py-4" data-toggle="tooltip">
                                <span class="navi-icon mr-2">
                                    <span class="svg-icon"><!--begin::Svg Icon | path:assets/media/svg/icons/Files/File.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"/>
                                                <path d="M5.85714286,2 L13.7364114,2 C14.0910962,2 14.4343066,2.12568431 14.7051108,2.35473959 L19.4686994,6.3839416 C19.8056532,6.66894833 20,7.08787823 20,7.52920201 L20,20.0833333 C20,21.8738751 19.9795521,22 18.1428571,22 L5.85714286,22 C4.02044787,22 4,21.8738751 4,20.0833333 L4,3.91666667 C4,2.12612489 4.02044787,2 5.85714286,2 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <rect fill="#000000" x="6" y="11" width="9" height="2" rx="1"/>
                                                <rect fill="#000000" x="6" y="15" width="5" height="2" rx="1"/>
                                            </g>
                                        </svg><!--end::Svg Icon-->
                                    </span>
                                </span>
                            <span class="navi-text font-size-lg">{{$circle->title ?? ''}}</span>
                            @if(isset($circle->new_message) && $circle->new_message != 0)
                            <span class="label label-sm label-rounded label-danger">{{$circle->new_message}}</span>
                            @endif
{{--                            <span class="navi-label">--}}
{{--                                <span class="label label-light-danger label-inline font-weight-bold">new</span>--}}
{{--                            </span>--}}
                        </a>
                    </div>
                    @endforeach
            </div>
            <!--end::Nav-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Profile Card-->
</div>
<!--end::Aside-->
