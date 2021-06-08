@extends('layouts.customer.master')

@section('content')


    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">


        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">


                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">
                                {{$evaluation->name ?? ''}}
                                {{--                                <span class="d-block text-muted pt-2 font-size-sm">This page shows Customers info</span>--}}
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            @if(isset($evaluation) && $evaluation != null)
                                <a href="" class="btn btn-light-success font-weight-bolder" data-toggle="modal" data-target="#chat">
                                <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <polygon fill="#000000" opacity="0.3" points="5 15 3 21.5 9.5 19.5"/>
                                                <path d="M13.5,21 C8.25329488,21 4,16.7467051 4,11.5 C4,6.25329488 8.25329488,2 13.5,2 C18.7467051,2 23,6.25329488 23,11.5 C23,16.7467051 18.7467051,21 13.5,21 Z M8.5,13 C9.32842712,13 10,12.3284271 10,11.5 C10,10.6715729 9.32842712,10 8.5,10 C7.67157288,10 7,10.6715729 7,11.5 C7,12.3284271 7.67157288,13 8.5,13 Z M13.5,13 C14.3284271,13 15,12.3284271 15,11.5 C15,10.6715729 14.3284271,10 13.5,10 C12.6715729,10 12,10.6715729 12,11.5 C12,12.3284271 12.6715729,13 13.5,13 Z M18.5,13 C19.3284271,13 20,12.3284271 20,11.5 C20,10.6715729 19.3284271,10 18.5,10 C17.6715729,10 17,10.6715729 17,11.5 C17,12.3284271 17.6715729,13 18.5,13 Z" fill="#000000"/>
                                            </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                                    Client Chat
                                    @if(isset($messages) && $messages != null && $messages->unread_message != 0)
                                        <span class="label label-sm label-rounded label-danger ml-1">{{$messages->unread_message}}</span>

                                    @endif
                                </a>
                                <!--begin::Modal-->
                                <div class="modal fade" id="chat" role="dialog"  aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <div class="text-left flex-grow-1">

                                                </div>
                                                <div class="text-center flex-grow-1">
                                                    <div class="text-dark-75 font-weight-bold font-size-h5">Client Chat</div>
                                                    {{--                                                            <div>--}}
                                                    {{--                                                                <span class="label label-sm label-dot label-success"></span>--}}
                                                    {{--                                                                <span class="font-weight-bold text-muted font-size-sm">Active</span>--}}
                                                    {{--                                                            </div>--}}
                                                </div>
                                                <div class="text-right flex-grow-1">
                                                    <!--begin::Dropdown Menu-->

                                                    <!--end::Dropdown Menu-->
                                                </div>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <!--begin::Form-->
                                                @csrf
                                                <div class="card-body">
                                                    <!--begin::Scroll-->
                                                    <div class="scroll scroll-pull" data-mobile-height="350">
                                                        <!--begin::Messages-->
                                                        <div class="messages">
                                                        @if(isset($messages) && $messages != null)
                                                            @foreach($messages as $msg)
                                                                @if($msg->owner_id != auth()->id())
                                                                    <!--begin::Message In-->
                                                                        <div class="d-flex flex-column mb-5 align-items-start">
                                                                            <div class="d-flex align-items-center">
                                                                                <div class="symbol symbol-circle symbol-40 mr-3">
                                                                                    <img alt="Pic" src="{{asset($msg->owner->profile_picture)}}"/>
                                                                                </div>
                                                                                <div>
                                                                                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">{{$msg->owner->name ?? 'Client'}}</a>
                                                                                    <span class="text-muted font-size-sm">{{$msg->created_at ?? ''}}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-2 rounded p-5 bg-light-success text-dark-50 font-weight-bold font-size-lg text-left max-w-400px">
                                                                                {{$msg->body ?? ''}}
                                                                            </div>
                                                                        </div>
                                                                        <!--end::Message In-->


                                                                @else
                                                                    <!--begin::Message Out-->
                                                                        <div class="d-flex flex-column mb-5 align-items-end">
                                                                            <div class="d-flex align-items-center">
                                                                                <div>
                                                                                    <span class="text-muted font-size-sm">{{$msg->created_at ?? ''}}</span>
                                                                                    <a href="#" class="text-dark-75 text-hover-primary font-weight-bold font-size-h6">You</a>
                                                                                </div>
                                                                                <div class="symbol symbol-circle symbol-40 ml-3">
                                                                                    <img alt="Pic" src="{{asset($msg->owner->profile_picture)}}"/>
                                                                                </div>
                                                                            </div>
                                                                            <div class="mt-2 rounded p-5 bg-light-primary text-dark-50 font-weight-bold font-size-lg text-right max-w-400px">
                                                                                {{$msg->body ?? ''}}
                                                                            </div>
                                                                        </div>
                                                                        <!--end::Message Out-->
                                                                    @endif
                                                                @endforeach

                                                            @endif

                                                        </div>
                                                        <!--end::Messages-->
                                                    </div>
                                                    <!--end::Scroll-->
                                                </div>
                                                <div class="card-footer">
                                                    <form action="{{url("evaluation_result/message/store")}}" method="post">
                                                    @csrf
                                                    <!--begin::Compose-->
                                                        {{--                                                                        <input type="number" name="owner_id" class="d-none" value="{{$answer->note_id}}">--}}
                                                        <input type="text" name="type" class="d-none" value="client_chat">
                                                        <input type="number" name="destination_id" class="d-none" value="{{$evaluation->user_id}}">
                                                        <textarea class="form-control border-0 p-0" name="body" rows="2" placeholder="Type a message" required></textarea>
                                                        <div class="d-flex align-items-center justify-content-between mt-5">
                                                            <div class="mr-3">
                                                                {{--                                                                            <a href="#" class="btn btn-clean btn-icon btn-md mr-1"><i class="flaticon2-photograph icon-lg"></i></a>--}}
                                                                {{--                                                                            <a href="#" class="btn btn-clean btn-icon btn-md"><i class="flaticon2-photo-camera  icon-lg"></i></a>--}}
                                                            </div>
                                                            <div>
                                                                <button type="submit"  class="btn btn-primary btn-md text-uppercase font-weight-bold chat-send py-2 px-6">Send</button>
                                                            </div>
                                                        </div>
                                                        <!--begin::Compose-->
                                                    </form>
                                                </div>
                                                <!--end::Form-->

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!--end::Modal-->

                                @endif

                            <a href="" class="btn btn-light-info font-weight-bolder ml-3" data-toggle="modal" data-target="#behaviors">
                                <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M12,13 C10.8954305,13 10,12.1045695 10,11 C10,9.8954305 10.8954305,9 12,9 C13.1045695,9 14,9.8954305 14,11 C14,12.1045695 13.1045695,13 12,13 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M7.00036205,18.4995035 C7.21569918,15.5165724 9.36772908,14 11.9907452,14 C14.6506758,14 16.8360465,15.4332455 16.9988413,18.5 C17.0053266,18.6221713 16.9988413,19 16.5815,19 C14.5228466,19 11.463736,19 7.4041679,19 C7.26484009,19 6.98863236,18.6619875 7.00036205,18.4995035 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                    </svg><!--end::Svg Icon-->
                                </span>
                                Behaviors
                            </a>
                            <!--begin::Modal-->
                            <div class="modal fade" id="behaviors" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Behaviors</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home">
                                                        <span class="nav-icon"><i class="flaticon-exclamation-square "></i></span>
                                                        <span class="nav-text">Behaviors</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                       href="#behavior_report" aria-controls="profile">
                                                        <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                        <span class="nav-text">Behaviors Report</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                       href="#quant_change" aria-controls="profile">
                                                        <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                        <span class="nav-text">Behaviors Report</span>
                                                    </a>
                                                </li>

                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active " id="home" role="tabpanel"
                                                     aria-labelledby="home-tab">
                                                    <div class="">
                                                        <!--begin::Form-->
                                                        <div class="card-body row">
                                                            <div class="col-12">
                                                                <form class="mt-3" action="{{"evaluation_result/behavior/store"}}" method="post">
                                                                    @csrf
                                                                    <h6>Add New Behavior</h6>
                                                                    <div class="form-group row mt-3">
                                                                        <label  class="col-2 col-form-label">Behavior</label>
                                                                        <div class="col-8">
                                                                            <input class="form-control d-none" type="number" name="evaluation_id" value="{{$evaluation->id}}"/>
                                                                            <input class="form-control d-none" type="number" name="user_id" value="{{$evaluation->user_id}}"/>
                                                                            <input class="form-control" type="text" name="body" id="example-text-input"/>
                                                                        </div>
                                                                        <div class="col-2">
                                                                            <button class="btn btn-light-success font-weight-bold mr-2">Save</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <hr>
                                                            </div>
                                                            <div class="col-12">
                                                                <!--begin: Datatable-->
                                                                <table class="table table-separate table-head-custom table-checkable text-center" id="kt_datatable">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Behavior</th>
                                                                        <th>Created At</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    @if(isset($evaluation->behaviors) && $evaluation->behaviors != null)
                                                                        @foreach($evaluation->behaviors as $behavior_key=>$behavior)
                                                                            <tr class="text-center">
                                                                                <td>{{$behavior_key+1 ?? ''}}</td>
                                                                                <td>{{$behavior->body ?? ''}}</td>
                                                                                <td>{{$behavior->created_at ?? ''}}</td>
                                                                                <td></td>
                                                                            </tr>
                                                                        @endforeach
                                                                    @endif

                                                                    </tbody>

                                                                </table>
                                                                <!--end: Datatable-->
                                                            </div>
                                                        </div>
                                                        <!--end::Form-->
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="behavior_report" role="tabpanel"
                                                     aria-labelledby="profile-tab">
                                                    <div class="col-12">
                                                        @if(isset($evaluation->behaviors) && $evaluation->behaviors != null)
                                                        <!--begin::Form-->
                                                        <form class="form" action="
                                                        @if(isset($behavior_template) && $behavior_template != null)
                                                        {{url("evaluation_result/behavior/template/$behavior_template->id/update")}}
                                                        @else
                                                        {{url("evaluation_result/behavior/template/$evaluation->id/store")}}
                                                        @endif
                                                            " method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="card-body row">
                                                                <div class="col-lg-12">
                                                                    @if(isset($behavior) && $behavior->status == 5)
                                                                        <div class="alert alert-custom alert-light-success fade show mb-5" role="alert">
                                                                            <div class="alert-icon"><i class="flaticon2-checkmark"></i></div>
                                                                            <div class="alert-text">You sent the report to the client before</div>
                                                                            <div class="alert-close">
                                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                    <span aria-hidden="true"><i class="ki ki-close"></i></span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    @endif

                                                                    <h6 class="m-0 mb-3">Create a Report for the client</h6>
                                                                    @include('fragment.error')
                                                                    <textarea name="description" id="kt-ckeditor-1">
                                                                    @if(isset($behavior_template) && $behavior_template != null)
                                                                                {!! $behavior_template->description !!}
                                                                        @else
                                                                            <p>I’m working with an executive coach, David Nour to elevate the manner in which I lead our team.</p>
                                                                            <p>The process is called Stakeholder Center Coaching, developed by Marshall Goldsmith, the #1 executive coach in the world.</p>
                                                                            <p>It entails me identifying a select group of stakeholders, whom I trust, respect, and those who will give me consistent and candid input on my behavior changes.</p>
                                                                            <p>I would appreciate your help as one of these few trusted stakeholders.</p>
                                                                            <p>Here are two behaviors I’ve committed to dramatically elevating:</p>
                                                                            @foreach($evaluation->behaviors as $behavior)
                                                                                <h4 class="mt-3">{{$behavior->body ?? ''}} </h4>
                                                                            @endforeach
                                                                            <p>Here is where I could use your help in my efforts to move the needle in these behaviors:</p>
                                                                            <p>Accountability - Will you hold me accounting to the above behavior changes? I’m asking you to, discretely and one-on-one, highlight any scenario you observe that I’m not practicing these behaviors.</p>
                                                                            <p>Two Action Items - Could you kindly click here (we need to provide a link for the executive to share) with two simple action steps I can take to practice above two behaviors? How do you think I can demonstrate these behaviors consistently?</p>
                                                                            <p>Monthly Updates - I’d like you and I to speak for a few minutes each month, specifically on this topic. It would be very helpful if you can provide specific and actionable examples of both what you believe is going well, as well as areas I need to continue to improve.</p>
                                                                            <p>I’m committed to the Stakeholder Center Coaching process and am currently reading Marshall’s book, What Got You Here, Won’t Get You There.</p>
                                                                            <p>As a small token of my appreciation, I’m sending you a copy of the same book.</p>

                                                                        @endif
                                                                </textarea>

                                                                    <div class="row mt-3">
                                                                        <button type="submit" class="btn btn-light-success ml-auto mr-6 w-100px">Save</button>
                                                                        <button type="submit" formaction="{{url("evaluation_result/behavior/$evaluation->id/send_client")}}" class="btn btn-primary mr-auto">
                                                                            Send to Client
                                                                        </button>
                                                                    </div>
                                                                </div>



                                                            </div>
                                                        </form>
                                                        @else
                                                            <h6 class="mt-8 mx-auto text-muted"> You haven't added any behavior yet</h6>
                                                            @endif
                                                        <!--end::Form-->
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="quant_change" role="tabpanel"
                                                     aria-labelledby="profile-tab">
                                                    <div class="col-12">
                                                    @if(isset($behaviors) && $behaviors != null)
                                                            <div class="row p-8">
                                                                <canvas id="myChart" width="400" height="200"></canvas>
                                                                <script>
                                                                    var ctx = document.getElementById('myChart').getContext('2d');
                                                                    var myChart = new Chart(ctx, {
                                                                        type: 'line',
                                                                        data: {
                                                                            labels: [
                                                                                @if($behaviors->count() != 0)
                                                                                    @foreach($behaviors[0]->scrollers as $scroller)
                                                                                        '{{$scroller->circle->title ?? ''}}',
                                                                                    @endforeach
                                                                                @endif
//                                                                                 'Jun','Jul','Aug',
                                                                            ],

                                                                            datasets: [
                                                                                @if($behaviors->count() != 0)

                                                                                    @foreach($behaviors as $key=>$behavior)
                                                                                        {
                                                                                            label: '# {{$behavior->body ?? ''}}',
                                                                                            data: [
                                                                                                @foreach($behavior->scrollers as $scroller)
                                                                                                    '{{$scroller->average_score ?? ''}}',
                                                                                                @endforeach
                                                                                                // 3,5,9
                                                                                            ],
                                                                                            backgroundColor: [
                                                                                                'rgba(255, 255, 255 , 255)',
                                                                                                'rgba(255, 255, 255 , 255)',
                                                                                                'rgba(255, 255, 255 , 255)',
                                                                                                'rgba(255, 255, 255 , 255)',
                                                                                                'rgba(255, 255, 255 , 255)',
                                                                                                'rgba(255, 255, 255 , 255)'
                                                                                            ],
                                                                                            borderColor: [
                                                                                                'rgba(255, 99, 1 , 1)',
                                                                                                'rgba(1, 10, 100 , 1)',
                                                                                                'rgb(255,19,205)',
                                                                                                'rgb(0,255,174)',
                                                                                                'rgb(246,255,27)',
                                                                                                'rgb(126,0,255)'
                                                                                            ],
                                                                                            borderWidth: 1
                                                                                        },
                                                                                    @endforeach
                                                                                @endif
                                                                            ]
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

                                                    @endif
                                                    <!--end::Form-->
                                                    </div>
                                                </div>

                                            </div>

                                            <!--begin::Form-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--end::Modal-->
                            <!--begin::Button-->
                            <a href="{{url("/evaluation/$evaluation->id/edit")}}" class="btn btn-light-warning font-weight-bolder ml-3">
                                    <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                            viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"/>
                                            <path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero" transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
                                            <rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
                                        </g>
                                </svg><!--end::Svg Icon--></span>
                                Edit Evaluation
                            </a>
                            <!--end::Button-->


                        </div>
                    </div>

                    <div class="card-body">
                        <div class="overflow-auto">


                            <div class="accordion accordion-toggle-arrow" id="accordionExample1">
                                @foreach($evaluation->circles as $key=>$circle)

                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title @if($key != 0) collapsed @endif" data-toggle="collapse" data-target="#collapseOne{{$key}}">
                                            {{$circle->title ?? ''}}
                                            @if($circle->new_message != 0)
                                            <span class="label label-sm label-rounded label-danger ml-2">{{$circle->new_message ?? ''}}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div id="collapseOne{{$key}}" class="collapse @if($key == 0) show @endif" data-parent="#accordionExample1">
                                        <div class="card-body">
                                            <div class="d-flex">
                                                <!--begin: Info-->
                                                <div class="flex-grow-1">
                                                    <!--begin: Title-->
                                                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                                                        <div class="mr-3">
                                                            <!--begin::Name-->
                                                            <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                                                {{$circle->target->name ?? ''}}
                                                            </a>
                                                            <!--end::Name-->

                                                            <!--begin::Contacts-->
                                                            <div class="d-flex flex-wrap my-2">
                                                                <h6 class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <rect x="0" y="0" width="24" height="24"/>
                                                                                <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000"/>
                                                                                <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"/>
                                                                            </g>
                                                                        </svg><!--end::Svg Icon-->
                                                                    </span>
                                                                    {{$circle->target->email ?? ''}}
                                                                </h6>
                                                                <h6 class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                                                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><!--begin::Svg Icon | path:assets/media/svg/icons/General/Lock.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                                                <mask fill="white">
                                                                                    <use xlink:href="#path-1"/>
                                                                                </mask>
                                                                                <g/>
                                                                                <path d="M7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 Z M12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L15,10 L15,8 C15,6.34314575 13.6568542,5 12,5 Z" fill="#000000"/>
                                                                            </g>
                                                                        </svg><!--end::Svg Icon-->
                                                                    </span>                                {{$circle->target->position ?? ''}}
                                                                </h6>
                                                            </div>
                                                            <!--end::Contacts-->
                                                        </div>
                                                        <div class="my-lg-0 my-1">
{{--                                                            <a href="{{url("evaluation/$circle->id/edit")}}" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">Edit</a>--}}
                                                            @if($circle->status == 1)
                                                                <a href="{{url("evaluation_result/$circle->evaluation_id/edit")}}" class="btn btn-sm btn-warning font-weight-bolder text-uppercase">Complete Circle</a>
                                                            @elseif($circle->status == 2)
                                                                <a href="{{url("evaluation_result/$circle->id/edit_email")}}" class="btn btn-sm btn-success font-weight-bolder text-uppercase">Send Circle to Users</a>
                                                            @elseif($circle->status == 3)
                                                                <a href="{{url("evaluation_result/report/$circle->id/show")}}" class="btn btn-sm btn-info font-weight-bolder text-uppercase">Report</a>
                                                            @elseif($circle->status == 4)
                                                                <a href="{{url("evaluation_result/report/$circle->id/show")}}" class="btn btn-sm btn-info font-weight-bolder text-uppercase">Report</a>
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


                                                <!--end: Item-->

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
                                                        <span class="font-weight-bolder font-size-h5"><a href="" class="" data-toggle="modal" data-target="#users{{$key}}">{{$circle->answers->count()}} Person</a></span>

                                                    </div>
                                                </div>
                                                <!--begin::Modal-->
                                                <div class="modal fade" id="users{{$key}}" role="dialog"  aria-hidden="true">
                                                    <div class="modal-dialog modal-lg" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Taken Users:</h5>
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
                                                                            <th>Answer</th>
                                                                        </tr>
                                                                        </thead>

                                                                        <tbody>
                                                                        @foreach($circle->answers as $answer_key=>$answer)
                                                                            <tr class="text-center">
                                                                                <td>{{$answer_key+1 ?? ''}}</td>
                                                                                <td>{{$answer->user->name ?? ''}}</td>
                                                                                <td>{{$answer->user->email ?? ''}}</td>
                                                                                <td>{{$answer->body ?? ''}}</td>
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
                                                <!--end: Item-->

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

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Modal-->

                                                <!--begin: Item-->
                                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                    @if($circle->new_message == 0)
                                                        <span class="mr-4">
                                                        <i class="flaticon-chat-1 icon-2x text-muted font-weight-bold"></i>
                                                        </span>
                                                    @else
                                                    <a href="{{url("evaluation_result/answers/$circle->id/show")}}" class="btn btn-icon btn-light-danger pulse pulse-danger mr-5">
                                                        {{$circle->new_message ?? ''}}<i class="flaticon-chat-1 ml-1 mb-1 icon-sm"></i>
                                                        <span class="pulse-ring"></span>
                                                    </a>
                                                    @endif

                                                    <div class="d-flex flex-column">
                                                        <span class="text-dark-75 font-weight-bolder font-size-sm">Answers</span>
                                                        <a href="{{url("evaluation_result/answers/$circle->id/show")}}" class="text-primary font-weight-bolder">View</a>

                                                    </div>
                                                </div>
                                                <!--end: Item-->

                                                <!--begin: Item-->
                                                <div class="d-flex align-items-center flex-lg-fill my-1">
                                                    <span class="mr-4">
                                                        <i class="flaticon-network icon-2x text-muted font-weight-bold"></i>
                                                    </span>
                                                    <div class="symbol-group symbol-hover">
                                                        @foreach($circle->users as $user_key=>$circle_user)
                                                        <div class="symbol symbol-30 symbol-circle" data-toggle="tooltip" title="{{$circle_user->name ?? ''}}">
                                                            <img alt="Pic" src="{{asset($circle_user->profile_picture) ?? asset('media/users/300_19.jpg')}}"/>
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
                                            </div>
                                            <!--begin: Items-->
                                        </div>
                                    </div>
                                </div>

                                    @endforeach

                            </div>


                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->


@endsection



