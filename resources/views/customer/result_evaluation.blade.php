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
                            <!--begin::Button-->
                            <a href="{{url('/evaluation/create')}}" class="btn btn-light-warning font-weight-bolder">
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
                                                            <!--begin::Name-->
                                                            <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">
                                                                {{$circle->target->name ?? ''}}
{{--                                                                @if($circle->status == 1)--}}
{{--                                                                    <i class="flaticon2-calendar-6 text-success icon-md ml-2"></i>--}}
{{--                                                                    @elseif($circle->status == 2)--}}
{{--                                                                    <i class="flaticon2-correct text-success icon-md ml-2"></i>--}}
{{--                                                                    @endif--}}
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
                                                                </>
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
                                                <!--begin: Item-->
{{--                                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">--}}
{{--                                                    <span class="mr-4">--}}
{{--                                                        <i class="flaticon2-hourglass-1 icon-2x text-muted font-weight-bold"></i>--}}
{{--                                                    </span>--}}
{{--                                                    <div class="d-flex flex-column text-dark-75">--}}
{{--                                                        <span class="font-weight-bolder font-size-sm">Total Circle</span>--}}
{{--                                                        <span class="font-weight-bolder font-size-h5">4 Circle</span>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
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
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Modal-->

                                                <!--begin: Item-->
                                                <div class="d-flex align-items-center flex-lg-fill mr-5 my-1">
                                                    <span class="mr-4">
                                                        <i class="flaticon-chat-1 icon-2x text-muted font-weight-bold"></i>
                                                    </span>
                                                    <div class="d-flex flex-column">
                                                        <span class="text-dark-75 font-weight-bolder font-size-sm">Conversation</span>
                                                        <a href="#" class="text-primary font-weight-bolder">View</a>
                                                    </div>
                                                </div>
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



