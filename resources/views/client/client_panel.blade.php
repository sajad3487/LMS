@extends('layouts.user.master')
@section('content')
    <!--begin::Row-->
    <div class="row">
        <div class="col-lg-6 col-xxl-4">
            <!--begin::Mixed Widget 1-->
            <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 bg-danger py-5">
                    <h3 class="card-title font-weight-bolder text-white">360' Assessment</h3>
                    <div class="card-toolbar">
{{--                        <div class="dropdown dropdown-inline">--}}
{{--                            <a href="#" class="btn btn-transparent-white btn-sm font-weight-bolder dropdown-toggle px-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--                                Export--}}
{{--                            </a>--}}
{{--                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">--}}
{{--                                <!--begin::Navigation-->--}}
{{--                                <ul class="navi navi-hover">--}}
{{--                                    <li class="navi-header pb-1">--}}
{{--                                        <span class="text-primary text-uppercase font-weight-bold font-size-sm">Add new:</span>--}}
{{--                                    </li>--}}
{{--                                    <li class="navi-item">--}}
{{--                                        <a href="#" class="navi-link">--}}
{{--                                            <span class="navi-icon"><i class="flaticon2-shopping-cart-1"></i></span>--}}
{{--                                            <span class="navi-text">Order</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="navi-item">--}}
{{--                                        <a href="#" class="navi-link">--}}
{{--                                            <span class="navi-icon"><i class="flaticon2-calendar-8"></i></span>--}}
{{--                                            <span class="navi-text">Event</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="navi-item">--}}
{{--                                        <a href="#" class="navi-link">--}}
{{--                                            <span class="navi-icon"><i class="flaticon2-graph-1"></i></span>--}}
{{--                                            <span class="navi-text">Report</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="navi-item">--}}
{{--                                        <a href="#" class="navi-link">--}}
{{--                                            <span class="navi-icon"><i class="flaticon2-rocket-1"></i></span>--}}
{{--                                            <span class="navi-text">Post</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                    <li class="navi-item">--}}
{{--                                        <a href="#" class="navi-link">--}}
{{--                                            <span class="navi-icon"><i class="flaticon2-writing"></i></span>--}}
{{--                                            <span class="navi-text">File</span>--}}
{{--                                        </a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <!--end::Navigation-->--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body p-0 position-relative overflow-hidden">
                    <!--begin::Chart-->
                    <div id="" class="card-rounded-bottom bg-danger" style="height: 200px"></div>
                    <!--end::Chart-->

                    <!--begin::Stats-->
                    <div class="card-spacer mt-n25">
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col bg-light-primary px-6 py-8 rounded-xl mr-7 mb-7">
                                <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                            <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                                <a href="#" data-toggle="modal" data-target="#behaviour" class="text-primary font-weight-bold font-size-h6 mt-2">
                                    Behaviours
                                </a>
                                <!--begin::Modal-->
                                <div class="modal fade" id="behaviour" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Behaviour</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                                <div class="modal-body">
                                                        I’m working with an executive coach, David Nour to elevate the manner in which I lead our team.
                                                        <br>
                                                        The process is called Stakeholder Center Coaching, developed by Marshall Goldsmith, the #1 executive coach in the world.
                                                        <br>
                                                        It entails me identifying a select group of stakeholders, whom I trust, respect, and those who will give me consistent and candid input on my behavior changes.
                                                        <br>
                                                        I would appreciate your help as one of these few trusted stakeholders.
                                                        <br>
                                                        Here are two behaviors I’ve committed to dramatically elevating:
                                                        <br>
                                                        <h6 class="mt-3">Become More Succinct </h6>(executive will fill this in from their panel after my summary report from circle 1) - I’d like to practice brevity more often and get my key point across more succinctly.<br>
                                                        <h6 class="mt-3">Easier to Disagree With / Balance my Dominance with Approachability (same as above) </h6>- I’d like to practice better listening skills, make room to hear counterpoints to topics I’m passionate about, be me, yet ensure others feel comfortable pushing back on my ideas, and perspectives.<br>
                                                        <br>

                                                        Here is where I could use your help in my efforts to move the needle in these behaviors:
                                                        <br>
                                                        Accountability - Will you hold me accounting to the above behavior changes? I’m asking you to, discretely and one-on-one, highlight any scenario you observe that I’m not practicing these behaviors.<br>
                                                        Two Action Items - Could you kindly click here (we need to provide a link for the executive to share) with two simple action steps I can take to practice above two behaviors? How do you think I can demonstrate these behaviors consistently?<br>
                                                        Monthly Updates - I’d like you and I to speak for a few minutes each month, specifically on this topic. It would be very helpful if you can provide specific and actionable examples of both what you believe is going well, as well as areas I need to continue to improve.<br>
                                                        <br>

                                                        I’m committed to the Stakeholder Center Coaching process and am currently reading Marshall’s book, What Got You Here, Won’t Get You There.<br>
                                                        As a small token of my appreciation, I’m sending you a copy of the same book.

                                                </div>

                                        </div>
                                    </div>
                                </div>
                                <!--end::Modal-->
                            </div>
                            <div class="col bg-light-warning px-6 py-8 rounded-xl mb-7">
                                <span class="svg-icon svg-icon-3x svg-icon-warning d-block my-2"><!--begin::Svg Icon | path:assets/media/svg/icons/Media/Equalizer.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <rect fill="#000000" opacity="0.3" x="13" y="4" width="3" height="16" rx="1.5"/>
                                            <rect fill="#000000" x="8" y="9" width="3" height="11" rx="1.5"/>
                                            <rect fill="#000000" x="18" y="11" width="3" height="9" rx="1.5"/>
                                            <rect fill="#000000" x="3" y="13" width="3" height="7" rx="1.5"/>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                                <a href="#" class="text-warning font-weight-bold font-size-h6" data-toggle="modal" data-target="#report">
                                    Quant Change
                                </a>
                                <!--begin::Modal-->
                                <div class="modal fade" id="report" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Quant Change</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row p-8">
                                                    <canvas id="myChart" width="400" height="200"></canvas>
                                                    <script>
                                                        var ctx = document.getElementById('myChart').getContext('2d');
                                                        var myChart = new Chart(ctx, {
                                                            type: 'line',
                                                            data: {
                                                                labels: [
                                                                    @foreach($behaviours as $month=>$score)

                                                                        '{{$month}}',
                                                                        @endforeach

                                                                ],
                                                                datasets: [{
                                                                    label: '# of Votes',
                                                                    data: [
                                                                        @foreach($behaviours as $score)
                                                                        {{$score}},
                                                                        @endforeach
                                                                    ],
                                                                    backgroundColor: [
                                                                        'rgba(255, 99, 132, 0.2)',
                                                                        'rgba(54, 162, 235, 0.2)',
                                                                        'rgba(255, 206, 86, 0.2)',
                                                                        'rgba(75, 192, 192, 0.2)',
                                                                        'rgba(153, 102, 255, 0.2)',
                                                                        'rgba(255, 159, 64, 0.2)'
                                                                    ],
                                                                    borderColor: [
                                                                        'rgba(255, 99, 132 , 1)',
                                                                        'rgba(255, 99, 132 , 1)',
                                                                        'rgba(255, 99, 132 , 1)',
                                                                        'rgba(255, 99, 132 , 1)',
                                                                        'rgba(255, 99, 132 , 1)',
                                                                        'rgba(255, 99, 132 , 1)'
                                                                    ],
                                                                    borderWidth: 1
                                                                },{
                                                                    label: '# of color',
                                                                    data: [10, 17, 8, 9, 12, 6],
                                                                    backgroundColor: [
                                                                        'rgba(255, 99, 132, 0.2)',
                                                                        'rgba(54, 162, 235, 0.2)',
                                                                        'rgba(255, 206, 86, 0.2)',
                                                                        'rgba(75, 192, 192, 0.2)',
                                                                        'rgba(153, 102, 255, 0.2)',
                                                                        'rgba(255, 159, 64, 0.2)'
                                                                    ],
                                                                    borderColor: [
                                                                        'rgba(10, 255, 10 , 1)',
                                                                        'rgba(10, 255, 10 , 1)',
                                                                        'rgba(10, 255, 10 , 1)',
                                                                        'rgba(10, 255, 10 , 1)',
                                                                        'rgba(10, 255, 10 , 1)',
                                                                        'rgba(10, 255, 10 , 1)'
                                                                    ],
                                                                    borderWidth: 1
                                                                }]
                                                            },
                                                            options: {
                                                                scales: {
                                                                    y: {
                                                                        beginAtZero: true
                                                                    }
                                                                }
                                                            }
                                                        });
                                                    </script>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--end::Modal-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col bg-light-danger px-6 py-8 rounded-xl mr-7">
                                <span class="svg-icon svg-icon-3x svg-icon-danger d-block my-2"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                            <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero"/>
                                            <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3"/>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                                <a href="#" class="text-danger font-weight-bold font-size-h6 mt-2"  data-toggle="modal" data-target="#journal">
                                    Journal
                                </a>

                            </div>


                            <div class="col bg-light-success px-6 py-8 rounded-xl">
                                <span class="svg-icon svg-icon-3x svg-icon-success d-block my-2"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Urgent-mail.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z" fill="#000000" opacity="0.3"/>
                                            <path d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z" fill="#000000"/>
                                        </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                                <a href="#" class="text-success font-weight-bold font-size-h6 mt-2"  data-toggle="modal" data-target="#kt_chat_modal">
                                    Nour Chat
                                </a>
                                <!--begin::Chat Panel-->
                                <div class="modal modal-sticky modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <!--begin::Card-->
                                            <div class="card card-custom">
                                                <!--begin::Header-->
                                                <div class="card-header align-items-center px-4 py-3">
                                                    <div class="text-left flex-grow-1">
                                                        <!--begin::Dropdown Menu-->
                                                        <div class="dropdown dropdown-inline">
                                                            <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="svg-icon svg-icon-lg"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                            <polygon points="0 0 24 0 24 24 0 24"/>
                                                                            <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                                            <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                                                        </g>
                                                                    </svg>
                                            <!--end::Svg Icon--></span>
                                                            </button>
                                                            <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-md">
                                                                <!--begin::Navigation-->
                                                                <ul class="navi navi-hover py-5">
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-icon"><i class="flaticon2-drop"></i></span>
                                                                            <span class="navi-text">New Group</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-icon"><i class="flaticon2-list-3"></i></span>
                                                                            <span class="navi-text">Contacts</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-icon"><i class="flaticon2-rocket-1"></i></span>
                                                                            <span class="navi-text">Groups</span>
                                                                            <span class="navi-link-badge">
                                                                                <span class="label label-light-primary label-inline font-weight-bold">new</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-icon"><i class="flaticon2-bell-2"></i></span>
                                                                            <span class="navi-text">Calls</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-icon"><i class="flaticon2-gear"></i></span>
                                                                            <span class="navi-text">Settings</span>
                                                                        </a>
                                                                    </li>

                                                                    <li class="navi-separator my-3"></li>

                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-icon"><i class="flaticon2-magnifier-tool"></i></span>
                                                                            <span class="navi-text">Help</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="navi-item">
                                                                        <a href="#" class="navi-link">
                                                                            <span class="navi-icon"><i class="flaticon2-bell-2"></i></span>
                                                                            <span class="navi-text">Privacy</span>
                                                                            <span class="navi-link-badge">
                                                                                <span class="label label-light-danger label-rounded font-weight-bold">5</span>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                                <!--end::Navigation-->
                                                            </div>
                                                        </div>
                                                        <!--end::Dropdown Menu-->
                                                    </div>
                                                    <div class="text-center flex-grow-1">
                                                        <div class="text-dark-75 font-weight-bold font-size-h5">Matt Pears</div>
                                                        <div>
                                                            <span class="label label-dot label-success"></span>
                                                            <span class="font-weight-bold text-muted font-size-sm">Active</span>
                                                        </div>
                                                    </div>
                                                    <div class="text-right flex-grow-1">
                                                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md"  data-dismiss="modal">
                                                            <i class="ki ki-close icon-1x"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!--end::Header-->

                                                <!--begin::Body-->
                                                <div class="card-body">
                                                    <!--begin::Scroll-->
                                                    <div class="scroll scroll-pull" data-height="375" data-mobile-height="300">
                                                        <!--begin::Messages-->
                                                        <div class="messages">
                                                            <!--begin::Message In-->
                                                            <div class="d-flex flex-column mb-5 align-items-start">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="symbol symbol-circle symbol-40 mr-3">
                                                                        <img alt="Pic" src="assets/media/users/300_12.jpg"/>
                                                                    </div>
                                                                    <div>
                                                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
                                                                        <span class="text-muted font-size-sm">2 Hours</span>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                                                    How likely are you to recommend our company
                                                                    to your friends and family?
                                                                </div>
                                                            </div>
                                                            <!--end::Message In-->

                                                            <!--begin::Message Out-->
                                                            <div class="d-flex flex-column mb-5 align-items-end">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <span class="text-muted font-size-sm">3 minutes</span>
                                                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                                                    </div>
                                                                    <div class="symbol symbol-circle symbol-40 ml-3">
                                                                        <img alt="Pic" src="assets/media/users/300_21.jpg"/>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                                    Hey there, we’re just writing to let you know
                                                                    that you’ve been subscribed to a repository on GitHub.
                                                                </div>
                                                            </div>
                                                            <!--end::Message Out-->

                                                            <!--begin::Message In-->
                                                            <div class="d-flex flex-column mb-5 align-items-start">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="symbol symbol-circle symbol-40 mr-3">
                                                                        <img alt="Pic" src="assets/media/users/300_21.jpg"/>
                                                                    </div>
                                                                    <div>
                                                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
                                                                        <span class="text-muted font-size-sm">40 seconds</span>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                                                    Ok, Understood!
                                                                </div>
                                                            </div>
                                                            <!--end::Message In-->

                                                            <!--begin::Message Out-->
                                                            <div class="d-flex flex-column mb-5 align-items-end">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <span class="text-muted font-size-sm">Just now</span>
                                                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                                                    </div>
                                                                    <div class="symbol symbol-circle symbol-40 ml-3">
                                                                        <img alt="Pic" src="assets/media/users/300_21.jpg"/>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                                    You’ll receive notifications for all issues, pull requests!
                                                                </div>
                                                            </div>
                                                            <!--end::Message Out-->

                                                            <!--begin::Message In-->
                                                            <div class="d-flex flex-column mb-5 align-items-start">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="symbol symbol-circle symbol-40 mr-3">
                                                                        <img alt="Pic" src="assets/media/users/300_12.jpg"/>
                                                                    </div>
                                                                    <div>
                                                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
                                                                        <span class="text-muted font-size-sm">40 seconds</span>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                                                    You can unwatch this repository immediately by clicking here: <a href="#">https://github.com</a>
                                                                </div>
                                                            </div>
                                                            <!--end::Message In-->

                                                            <!--begin::Message Out-->
                                                            <div class="d-flex flex-column mb-5 align-items-end">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <span class="text-muted font-size-sm">Just now</span>
                                                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                                                    </div>
                                                                    <div class="symbol symbol-circle symbol-40 ml-3">
                                                                        <img alt="Pic" src="assets/media/users/300_21.jpg"/>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                                    Discover what students who viewed Learn Figma - UI/UX Design. Essential Training also viewed
                                                                </div>
                                                            </div>
                                                            <!--end::Message Out-->

                                                            <!--begin::Message In-->
                                                            <div class="d-flex flex-column mb-5 align-items-start">
                                                                <div class="d-flex align-items-center">
                                                                    <div class="symbol symbol-circle symbol-40 mr-3">
                                                                        <img alt="Pic" src="assets/media/users/300_12.jpg"/>
                                                                    </div>
                                                                    <div>
                                                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">Matt Pears</a>
                                                                        <span class="text-muted font-size-sm">40 seconds</span>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                                                    Most purchased Business courses during this sale!
                                                                </div>
                                                            </div>
                                                            <!--end::Message In-->

                                                            <!--begin::Message Out-->
                                                            <div class="d-flex flex-column mb-5 align-items-end">
                                                                <div class="d-flex align-items-center">
                                                                    <div>
                                                                        <span class="text-muted font-size-sm">Just now</span>
                                                                        <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                                                    </div>
                                                                    <div class="symbol symbol-circle symbol-40 ml-3">
                                                                        <img alt="Pic" src="assets/media/users/300_21.jpg"/>
                                                                    </div>
                                                                </div>
                                                                <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                                    Company BBQ to celebrate the last quater achievements and goals. Food and drinks provided
                                                                </div>
                                                            </div>
                                                            <!--end::Message Out-->
                                                        </div>
                                                        <!--end::Messages-->
                                                    </div>
                                                    <!--end::Scroll-->
                                                </div>
                                                <!--end::Body-->

                                                <!--begin::Footer-->
                                                <div class="card-footer align-items-center">
                                                    <!--begin::Compose-->
                                                    <textarea class="form-control border-0 p-0" rows="2" placeholder="Type a message"></textarea>
                                                    <div class="d-flex align-items-center justify-content-between mt-5">
                                                        <div class="mr-3">
                                                            <a href="#" class="btn btn-clean btn-icon btn-md mr-1"><i class="flaticon2-photograph icon-lg"></i></a>
                                                            <a href="#" class="btn btn-clean btn-icon btn-md"><i class="flaticon2-photo-camera  icon-lg"></i></a>
                                                        </div>
                                                        <div>
                                                            <button type="button" class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">Send</button>
                                                        </div>
                                                    </div>
                                                    <!--begin::Compose-->
                                                </div>
                                                <!--end::Footer-->
                                            </div>
                                            <!--end::Card-->
                                        </div>
                                    </div>
                                </div>
                                <!--end::Chat Panel-->

                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 1-->
        </div>
        <div class="col-lg-6 col-xxl-4">

            <!--begin::List Widget 9-->
            <div class="card card-custom card-stretch gutter-b">
                @if(isset($evaluation) && $evaluation != null)

                <div class="card-header flex-wrap py-5">
                    <div class="card-title">
                        <h3 class="card-label">
                            {{$evaluation->name ?? ''}}
                            {{--                                <span class="d-block text-muted pt-2 font-size-sm">This page shows Customers info</span>--}}
                        </h3>
                    </div>
                    <div class="card-toolbar">
                        <!--begin::Button-->
{{--                        <a href="{{url('/evaluation/create')}}" class="btn btn-light-warning font-weight-bolder">--}}
{{--                                    <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg--}}
{{--                                            xmlns="http://www.w3.org/2000/svg"--}}
{{--                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                            viewBox="0 0 24 24" version="1.1">--}}
{{--                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                            <rect x="0" y="0" width="24" height="24"/>--}}
{{--                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>--}}
{{--                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>--}}
{{--                                        </g>--}}
{{--                                </svg><!--end::Svg Icon--></span>--}}
{{--                            Edit Evaluation--}}
{{--                        </a>--}}
                        <!--end::Button-->
                    </div>
                </div>

                <div class="card-body">
                    <div class="overflow-auto">


                        <div class="accordion accordion-toggle-arrow" id="accordionExample1">
                            @foreach($evaluation->circles as $key=>$circle)

                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title" data-toggle="collapse" data-target="#collapseOne{{$key}}">
                                            {{$circle->title ?? ''}}
                                        </div>
                                    </div>
                                    <div id="collapseOne{{$key}}" class="collapse @if($key == 0) show @endif" data-parent="#accordionExample1">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <!--begin: Pic-->
                                            {{--                                                <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">--}}
                                            {{--                                                    <div class="symbol symbol-50 symbol-lg-120">--}}
                                            {{--                                                        <img alt="Pic" src="assets/media/project-logos/3.png"/>--}}
                                            {{--                                                    </div>--}}

                                            {{--                                                    <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">--}}
                                            {{--                                                        <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                            <!--end: Pic-->

                                                <!--begin: Info-->
                                                <div class="flex-grow-1">
                                                    <!--begin: Title-->
                                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                        <div class="mr-3">

                                                        </div>
                                                        <div class="my-lg-0 my-1">
                                                            {{--                                                            <a href="{{url("evaluation/$circle->id/edit")}}" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">Edit</a>--}}
                                                            @if($circle->status == 5)
                                                                <a href="" class="btn btn-sm btn-success font-weight-bolder text-uppercase"  data-toggle="modal" data-target="#report{{$key}}">Nour Review</a>
                                                                <!--begin::Modal-->
                                                                <div class="modal fade" id="report{{$key}}" role="dialog"  aria-hidden="true">
                                                                    <div class="modal-dialog modal-lg" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title">Nour report for {{$circle->title ?? ''}}</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                {!! $circle->report->description ?? ''!!}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!--end::Modal-->
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <!--end: Title-->

                                                    <!--begin: Content-->
                                                    <div class=" align-items-center flex-wrap justify-content-between">

                                                        <div class="d-flex flex-wrap align-items-center py-2 ">
                                                            <div class="d-flex align-items-center mr-10">
                                                                <div class="mr-6">
                                                                    <div class="font-weight-bold mb-2">Start Date</div>
                                                                    <span class="btn btn-sm btn-text btn-light-primary text-uppercase font-weight-bold">{{$circle->start_date ?? ''}}</span>
                                                                </div>
                                                                <div class="">
                                                                    <div class="font-weight-bold mb-2">Due Date</div>
                                                                    <span class="btn btn-sm btn-text btn-light-danger text-uppercase font-weight-bold">{{$circle->end_date ?? ''}}</span>
                                                                </div>
                                                            </div>
                                                            <div class="flex-grow-1 flex-shrink-0 w-150px w-xl-300px mt-4 mt-sm-0">
                                                                <span class="font-weight-bold">Progress</span>
                                                                <div class="progress progress-xs mt-2 mb-2">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{($circle->status)*20}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                                <span class="font-weight-bolder text-dark">{{($circle->status)*20}}%</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end: Content-->
                                                </div>
                                                <!--end: Info-->
                                            </div>

                                            <div class="separator separator-solid my-7"></div>

                                            <!--begin: Items-->
                                            <div class="d-flex align-items-center flex-wrap">
                                                <!--begin: Item-->
                                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                    <span class="mr-4">
                                                        <i class="flaticon-calendar-3 icon-2x text-muted font-weight-bold"></i>
                                                    </span>
                                                    <div class="d-flex flex-column text-dark-75">
{{--                                                        <span class="font-weight-bolder font-size-sm">Total Circle</span>--}}
                                                        <span class="font-weight-bolder font-size-h5"><a href="" class="" data-toggle="modal" data-target="#journal{{$key}}">Journal</a></span>
                                                    </div>
                                                </div>
                                                <!--end: Item-->
                                                <!--begin::Modal-->
                                                <div class="modal fade" id="journal{{$key}}" role="dialog"  aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Journal</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">


                                                                <div class="accordion accordion-light accordion-light-borderless accordion-svg-toggle" id="accordionExample7">
                                                                    @foreach($circle->journal as $journal_key=>$journal)
                                                                    <div class="card">
                                                                        <div class="card-header" id="headingOne7">
                                                                            <div class="card-title collapsed" data-toggle="collapse" data-target="#journal-{{$journal_key}}">
                                                                                <span class="svg-icon svg-icon-primary">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                                                            <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>
                                                                                            <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>
                                                                                        </g>
                                                                                    </svg>
                                                                                </span>
                                                                                <div class="card-label pl-4">{{$journal->title ?? ''}}</div>
                                                                                <div class="card-label text-muted pl-4">{{\Carbon\Carbon::parse($journal->created_at)->format('Y-m-d') ?? ''}}</div>
                                                                            </div>
                                                                        </div>
                                                                        <div id="journal-{{$journal_key}}" class="collapse" data-parent="#accordionExample7">
                                                                            <div class="card-body pl-12">
                                                                                {!! $journal->description ?? '' !!}
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                    {{--                                                    <div class="card">--}}
                                                                    {{--                                                        <div class="card-header" id="headingTwo7">--}}
                                                                    {{--                                                            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapseTwo7">--}}
                                                                    {{--                                                            <span class="svg-icon svg-icon-primary">--}}
                                                                    {{--                                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
                                                                    {{--                                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
                                                                    {{--                                                                        <polygon points="0 0 24 0 24 24 0 24"></polygon>--}}
                                                                    {{--                                                                        <path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z" fill="#000000" fill-rule="nonzero"></path>--}}
                                                                    {{--                                                                        <path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "></path>--}}
                                                                    {{--                                                                    </g>--}}
                                                                    {{--                                                                </svg>--}}
                                                                    {{--                                                            </span>--}}
                                                                    {{--                                                                <div class="card-label pl-4">Order Statistics</div>--}}
                                                                    {{--                                                            </div>--}}
                                                                    {{--                                                        </div>--}}
                                                                    {{--                                                        <div id="collapseTwo7" class="collapse" data-parent="#accordionExample7">--}}
                                                                    {{--                                                            <div class="card-body pl-12">--}}
                                                                    {{--                                                                ...--}}
                                                                    {{--                                                            </div>--}}
                                                                    {{--                                                        </div>--}}
                                                                    {{--                                                    </div>--}}
                                                                </div>
                                                            @include('fragment.error')
                                                            <!--begin::Form-->
                                                                <form class="form" action="{{url('client/journal/store')}}" method="post">
                                                                    @csrf
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label>Name</label>
                                                                            <input type="text" name="title" class="form-control" required placeholder="Please enter name of your co-worker"/>
                                                                            <input type="number" name="circle_id" class="d-none" value="{{$circle->id}}"/>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="exampleTextarea">Report of conversation</label>
                                                                            <textarea class="form-control" required name="description" rows="3"></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card-footer">
                                                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                                        <button type="reset" class="btn btn-secondary">Cancel</button>
                                                                    </div>
                                                                </form>
                                                                <!--end::Form-->
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Modal-->

                                            {{--                                                <!--begin: Item-->--}}
                                            {{--                                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">--}}
                                            {{--                                                    <span class="mr-4">--}}
                                            {{--                                                        <i class="flaticon-confetti icon-2x text-muted font-weight-bold"></i>--}}
                                            {{--                                                    </span>--}}
                                            {{--                                                    <div class="d-flex flex-column text-dark-75">--}}
                                            {{--                                                        <span class="font-weight-bolder font-size-sm">Expenses</span>--}}
                                            {{--                                                        <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold">$</span>164,700</span>--}}
                                            {{--                                                    </div>--}}
                                            {{--                                                </div>--}}
                                            {{--                                                <!--end: Item-->--}}

                                            <!--begin: Item-->
                                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                    <span class="mr-4">
                                                        <i class="flaticon-pie-chart icon-2x text-muted font-weight-bold"></i>
                                                    </span>
                                                    <div class="d-flex flex-column text-dark-75">
                                                        <span class="font-weight-bolder font-size-sm">Taken</span>
                                                        <span class="font-weight-bolder font-size-h5 text-info">{{$circle->answers->count()}} Person</span>

                                                    </div>



                                                </div>

                                                <!--end: Item-->

                                                <!--begin: Item-->

                                                <!--end: Item-->

                                                <!--begin: Item-->
                                                <div class="d-flex align-items-center flex-lg-fill my-1">
                                                    <span class="mr-4">
                                                        <i class="flaticon-network icon-2x text-muted font-weight-bold"></i>
                                                    </span>
                                                    <div class="symbol-group symbol-hover">
                                                        @foreach($circle->users as $user_key=>$user)
                                                            <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="{{$user->name ?? ''}}">
                                                                <img alt="Pic" src="{{asset($user->profile_picture) ?? asset('media/users/300_19.jpg')}}"/>
                                                            </div>
                                                            @break($user_key == 4)
                                                        @endforeach


                                                        @if($circle->users->count() > 5)
                                                            <a href="" class="" data-toggle="modal" data-target="#all_users{{$key}}">
                                                                <div class="symbol symbol-30 symbol-circle symbol-light">
                                                                    <span class="symbol-label font-weight-bold">{{($circle->users->count())-5}}+</span>
                                                                </div>
                                                            </a>
                                                    @endif
                                                    <!--begin::Modal-->
                                                        <div class="modal fade" id="all_users{{$key}}" role="dialog"  aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title">Circle Users:</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">

                                                                        <!--begin::Form-->
                                                                        @csrf
                                                                        <div class="overflow-auto">
                                                                            <!--begin: Datatable-->
                                                                            <table class="table table-separate table-head-custom table-checkable text-center" id="kt_datatable">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Quiz ID</th>
                                                                                    <th>Name</th>
                                                                                    <th>Email</th>
                                                                                    <th>Position</th>
                                                                                </tr>
                                                                                </thead>

                                                                                <tbody>
                                                                                @foreach($circle->users as $all_user_key=>$all_user)
                                                                                    <tr class="text-center">
                                                                                        <td>{{$all_user_key+1 ?? ''}}</td>
                                                                                        <td>{{$all_user->name ?? ''}}</td>
                                                                                        <td>{{$all_user->email ?? ''}}</td>
                                                                                        <td>{{$all_user->position ?? ''}}</td>
                                                                                    </tr>
                                                                                @endforeach

                                                                                </tbody>

                                                                            </table>
                                                                            <!--end: Datatable-->
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--end::Modal-->
                                                    </div>
                                                </div>
                                                <!--end: Item-->
                                                @if($circle->status == 1 || $circle->status == 2)
                                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                    <span class="mr-4">
                                                        <i class="flaticon-users icon-2x text-muted font-weight-bold"></i>
                                                    </span>
                                                    <div class="d-flex flex-column">
{{--                                                        <span class="text-dark-75 font-weight-bolder font-size-sm">Conversation</span>--}}
                                                        <a href="#" class="text-primary font-weight-bolder"  data-toggle="modal" data-target="#add_new_user{{$key}}">Add New User</a>
                                                    </div>
                                                    <!--begin::Modal-->
                                                    <div class="modal fade" id="add_new_user{{$key}}" role="dialog"  aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Circle Users:</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    @csrf
                                                                    <div class="form-group row">
                                                                        <label class="col-form-label text-right col-lg-2 col-sm-12">Select User</label>
                                                                        <div class="col-lg-4 col-md-10 col-sm-12">
                                                                            <select  name="user_id" class="form-control selectpicker" data-size="7" data-live-search="true">
                                                                                {{--                                                                        <option value="">Select</option>--}}
                                                                                @foreach($users as $user)
                                                                                    <option value="{{$user->id}}">{{$user->name ?? ''}} - {{$user->email ?? ''}}</option>
                                                                                @endforeach
                                                                            </select>
                                                                            <span class="form-text text-muted">Select user of evaluation</span>
                                                                            <a href="#"
                                                                               class="btn btn-outline-success mx-auto" data-toggle="modal" data-target="#new_user_client{{$key}}">Add New User
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                    <input type="number" name="circle_id" value="{{$circle->id ?? ''}}" class="d-none">
                                                                    <div class="card-footer">
                                                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                                        {{--                                                                        <button type="reset" class="btn btn-secondary">Cancel</button>--}}
                                                                    </div>
                                                                    <!--end::Form-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Modal-->
                                                </div>

                                                    @endif
                                            </div>
                                            <!--begin: Items-->
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>


                    </div>
                </div>
                    @else
                    <div class="p-10">
                        <h2 class="text-muted"> You don't have any evaluation yet</h2>
                    </div>
                    @endif
            </div>
            <!--end: List Widget 9-->
        </div>


    </div>
    <!--end::Row-->


    @endsection
