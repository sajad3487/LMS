@extends('layouts.customer.master')

@section('content')

    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">

                <!--begin::Row-->
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom gutter-b">
                            <div class="card-header">
                                <div class="card-title">
                                    @if(isset($quiz))
                                        <h3 class="card-label">Quiz No: {{$quiz->id ?? ''}}
                                            <span
                                                class="d-block text-muted pt-2 font-size-sm">Quiz title : {{$quiz->title ?? ''}}</span>
                                        </h3>
                                    @else
                                        <h3 class="card-label">New Quiz </h3>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <!--begin::Example-->
                                <div class="example">

                                    <div>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link @if(!isset($quiz)) active @endif" id="home-tab" data-toggle="tab" href="#home">
                                                    <span class="nav-icon"><i class="flaticon-exclamation-square "></i></span>
                                                    <span class="nav-text">Quiz Information</span>
                                                </a>
                                            </li>
                                            @if(isset($quiz))
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="profile-tab" data-toggle="tab"
                                                       href="#profile" aria-controls="profile">
                                                        <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                        <span class="nav-text">Questions</span>
                                                    </a>
                                                </li>
                                            @endif

                                        </ul>
                                        <div class="tab-content mt-5" id="myTabContent">
                                            <div class="tab-pane fade  @if(!isset($quiz)) show active @endif" id="home" role="tabpanel"
                                                 aria-labelledby="home-tab">
                                                <div class="px-5 px-md-30">

                                                    <!--begin::Form-->
                                                    <form class="form" action="
                                                        @if(isset($quiz))
                                                    {{url("quizzes/$quiz->id/update")}}
                                                    @else
                                                    {{url("quizzes/store")}}
                                                    @endif
                                                        " method="post" enctype="multipart/form-data">

                                                        @csrf
                                                        @if(isset($quiz))
                                                            @method('PUT')
                                                            <img class="img-fluid mb-5" src="{{asset($quiz->banner)}}"
                                                                 alt="">

                                                        @endif
                                                        <div class="">
                                                            @include('fragment.error')
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right">Quiz
                                                                    title :</label>
                                                                <div class="col-lg-8">
                                                                    <input type="text" name="title" class="form-control"
                                                                           placeholder="Enter quiz title"
                                                                           value="{{$quiz->title  ?? ''}}"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right"
                                                                       for="exampleTextarea">Description :</label>
                                                                <div class="col-lg-8">
                                                                    {{--                                                                    <textarea class="form-control" name="description" id="exampleTextarea" rows="3">{{$quiz->description  ?? ''}}</textarea>--}}
                                                                    <textarea name="description" id="kt-ckeditor-1">
                                                                        {!! $quiz->description  ?? ''!!}
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right">Banner
                                                                    image:</label>
                                                                <div class="col-lg-4">
                                                                    <div></div>
                                                                    <div class="custom-file">
                                                                        <input type="file" name="file"
                                                                               class="custom-file-input"
                                                                               id="customFile"/>
                                                                        <label class="custom-file-label"
                                                                               for="customFile">Choose Banner</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right">Intro Video:</label>
                                                                <div class="@if(isset($quiz) && $quiz->intro_video != null) col-lg-4 @else col-lg-8 @endif">
                                                                    <input type="text" name="intro_video"
                                                                           class="form-control"
                                                                           placeholder="Enter your video URL"
                                                                           value="{{$quiz->intro_video  ?? ''}}"/>
                                                                </div>
                                                                @if(isset($quiz) && $quiz->intro_video != null)
                                                                <div class="overlay mx-auto mt-3 mb-8">
                                                                    <div class="overlay-wrapper rounded bg-light text-center">
                                                                        <video width="300" controls>
                                                                            <source src="{{asset($quiz->intro_video)}}" type="video/mp4">
                                                                            Your browser does not support HTML video.
                                                                        </video>
                                                                    </div>
                                                                </div>
                                                                    @endif
                                                            </div>
                                                            <div class="row">

                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right">First
                                                                    Name Label:</label>
                                                                <div class="col-lg-3">
                                                                    <input type="text" name="first_name_label"
                                                                           class="form-control"
                                                                           placeholder="Enter your first name label"
                                                                           value="{{$quiz->first_name_label  ?? ''}}"/>
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio"
                                                                               name="first_name_requirement" value="1"
                                                                               @if(isset($quiz) && $quiz->first_name_requirement == 0)  @else checked="checked" @endif />
                                                                        <span></span>
                                                                        Required
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio"
                                                                               name="first_name_requirement" value="0"
                                                                               @if(isset($quiz) && $quiz->first_name_requirement == 0) checked="checked" @endif/>
                                                                        <span></span>
                                                                        Optional
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right">Last
                                                                    Name Label:</label>
                                                                <div class="col-lg-3">
                                                                    <input type="text" name="last_name_label"
                                                                           class="form-control"
                                                                           placeholder="Enter your last name label"
                                                                           value="{{$quiz->last_name_label  ?? ''}}"/>
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="last_name_requirement"
                                                                               value="1"
                                                                               @if(isset($quiz) && $quiz->last_name_requirement == 0)  @else checked="checked" @endif />
                                                                        <span></span>
                                                                        Required
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="last_name_requirement"
                                                                               value="0"
                                                                               @if(isset($quiz) && $quiz->last_name_requirement == 0) checked="checked" @endif/>
                                                                        <span></span>
                                                                        Optional
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right">Email
                                                                    Label:</label>
                                                                <div class="col-lg-3">
                                                                    <input type="text" name="email_label"
                                                                           class="form-control"
                                                                           placeholder="Enter your email label"
                                                                           value="{{$quiz->email_label  ?? ''}}"/>
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="email_requirement"
                                                                               value="1"
                                                                               @if(isset($quiz) && $quiz->email_requirement == 0)  @else checked="checked" @endif />
                                                                        <span></span>
                                                                        Required
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="email_requirement"
                                                                               value="0"
                                                                               @if(isset($quiz) && $quiz->email_requirement == 0) checked="checked" @endif/>
                                                                        <span></span>
                                                                        Optional
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right">First
                                                                    Info Label:</label>
                                                                <div class="col-lg-3">
                                                                    <input type="text" name="first_info_label"
                                                                           class="form-control"
                                                                           placeholder="Enter first info label"
                                                                           value="{{$quiz->first_info_label  ?? ''}}"/>
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="first_info_status"
                                                                               value="1"
                                                                               @if(isset($quiz) && $quiz->first_info_status == 1)  checked="checked" @endif />
                                                                        <span></span>
                                                                        Active
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="first_info_status"
                                                                               value="0"
                                                                               @if(isset($quiz) && $quiz->first_info_status == 1) @else checked="checked" @endif/>
                                                                        <span></span>
                                                                        Deactive
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right">Second
                                                                    Info Label:</label>
                                                                <div class="col-lg-3">
                                                                    <input type="text" name="second_info_label"
                                                                           class="form-control"
                                                                           placeholder="Enter second info label"
                                                                           value="{{$quiz->second_info_label  ?? ''}}"/>
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="second_info_status"
                                                                               value="1"
                                                                               @if(isset($quiz) && $quiz->second_info_status == 1)  checked="checked" @endif />
                                                                        <span></span>
                                                                        Active
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="second_info_status"
                                                                               value="0"
                                                                               @if(isset($quiz) && $quiz->second_info_status == 1) @else checked="checked" @endif/>
                                                                        <span></span>
                                                                        Deactive
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right">Third
                                                                    Info Label:</label>
                                                                <div class="col-lg-3">
                                                                    <input type="text" name="third_info_label"
                                                                           class="form-control"
                                                                           placeholder="Enter third info label"
                                                                           value="{{$quiz->third_info_label  ?? ''}}"/>
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="third_info_status"
                                                                               value="1"
                                                                               @if(isset($quiz) && $quiz->third_info_status == 1)  checked="checked" @endif />
                                                                        <span></span>
                                                                        Active
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="third_info_status"
                                                                               value="0"
                                                                               @if(isset($quiz) && $quiz->third_info_status == 1) @else checked="checked" @endif/>
                                                                        <span></span>
                                                                        Deactive
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right">Date
                                                                    Info Label:</label>
                                                                <div class="col-lg-3">
                                                                    <input type="text" name="date_info_label"
                                                                           class="form-control"
                                                                           placeholder="Enter date info label"
                                                                           value="{{$quiz->date_info_label  ?? ''}}"/>
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="date_info_status"
                                                                               value="1"
                                                                               @if(isset($quiz) && $quiz->date_info_status == 1)  checked="checked" @endif />
                                                                        <span></span>
                                                                        Active
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="date_info_status"
                                                                               value="0"
                                                                               @if(isset($quiz) && $quiz->date_info_status == 1) @else checked="checked" @endif/>
                                                                        <span></span>
                                                                        Deactive
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="placeholder" value="1"
                                                                               @if(isset($quiz) && $quiz->placeholder == 0)  @else checked="checked" @endif />
                                                                        <span></span>
                                                                        Use Placeholder
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="placeholder" value="0"
                                                                               @if(isset($quiz) && $quiz->placeholder == 0) checked="checked" @endif/>
                                                                        <span></span>
                                                                        Don't Use Placeholder
                                                                    </label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group row">
                                                            <label class="col-lg-2 col-form-label text-right">Result banner:</label>
                                                            <div class="col-lg-4">
                                                                <div></div>
                                                                <div class="custom-file">
                                                                    <input type="file" name="rbanner"
                                                                           class="custom-file-input"
                                                                           id="result_banner"/>
                                                                    <label class="custom-file-label"
                                                                           for="result_banner">Choose file</label>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <button type="submit"
                                                                    class="btn btn-success mx-auto w-100px">Save
                                                            </button>
                                                        </div>
                                                        @if(isset($quiz))
                                                            <img class="img-fluid mt-5" src="{{asset($quiz->result_banner)}}"
                                                                 alt="">
                                                        @endif
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                            </div>

                                            @if(isset($quiz))
                                                <div class="tab-pane fade @if(isset($quiz)) show active @endif" id="profile" role="tabpanel"
                                                     aria-labelledby="profile-tab">
                                                    <!--begin::Accordion-->
                                                    <div class="row">
                                                        <div class="btn-group ml-auto">
                                                            <a href="{{url("questions/$quiz->id/createTitle")}}"
                                                               class="btn btn-outline-warning font-weight-bolder p-2 mb-2 mr-3 d-inline-block">
                                                                <i class="la la-plus p-0"></i> Add New Title</a>
                                                        </div>
                                                    </div>
                                                    <div class="accordion accordion-solid accordion-toggle-plus" id="accordion3">
                                                            @foreach($sections as $key=>$section)
                                                                <div class="card">
                                                                    <div class="card-header" id="category-{{$section->id ?? ''}}">
                                                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse-{{$section->id ?? ''}}">
                                                                            {{$section->body ?? ''}}
                                                                            <div class="ml-10">
{{--                                                                                @if($section->status ==1 )--}}
{{--                                                                                    <span class="label font-weight-bold label-lg label-light-success label-inline">Active</span>--}}

{{--                                                                                @else--}}
{{--                                                                                    <span class="label font-weight-bold label-lg label-light-danger label-inline">Inactive</span>--}}

{{--                                                                                @endif--}}
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div id="collapse-{{$section->id ?? ''}}" class="collapse"  data-parent="#category-{{$section->id ?? ''}}">
                                                                        <div class="card-body">
                                                                            <div class="overflow-auto">

                                                                                <div class="btn-group">

                                                                                    <form  method="post">
                                                                                        <a href="{{url("/questions/section/$section->id/create")}}" class="btn btn-outline-success font-weight-bolder p-1 mb-2 mr-3 d-inline-block">
                                                                                            <i class="la la-plus p-0"></i></a>
                                                                                        <a href="{{url("questions/$section->id/editTitle")}}" class="btn btn-outline-warning font-weight-bolder p-1 mb-2 mr-3 d-inline-block">
                                                                                            <i class="la la-edit p-0"></i></a>
{{--                                                                                        <a href="{{url("/admin/categories/$section->id/delete")}}" class="btn btn-outline-danger font-weight-bolder p-1 mb-2 mr-3 d-inline-block">--}}
{{--                                                                                            <i class="la la-trash p-0"></i></a>--}}
                                                                                    </form>
                                                                                </div>
                                                                                <table class="table table-bordered table-checkable" id="kt_datatable">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>#</th>
                                                                                        <th>Question</th>
                                                                                        <th class="text-center">Additional Info</th>
                                                                                        <th class="text-center">Type</th>
                                                                                        <th class="text-center">Status</th>
                                                                                        <th class="text-center">Requirement</th>
                                                                                        <th class="text-center">Action</th>
                                                                                    </tr>
                                                                                    </thead>

                                                                                    <tbody>
                                                                                    @if($section->question != null)
                                                                                        @foreach($section->question as $key=>$question)
                                                                                                <tr>
                                                                                                    <td>{{$question->id ?? ''}}</td>
                                                                                                    <td>{{$question->body ?? ''}}</td>
                                                                                                    <td class="text-center">
                                                                                                        @if($question->additional_info == 1)
                                                                                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">
                                                                                                                Active
                                                                                                            </span>
                                                                                                        @elseif($question->additional_info == 0)
                                                                                                            <span class="label label-lg font-weight-bold label-light-success label-inline">
                                                                                                                Deactivated
                                                                                                             </span>
                                                                                                        @endif
                                                                                                    </td>
                                                                                                    <td class="text-center">{{$question->type ?? ''}}</td>

                                                                                                    <td class="text-center">
                                                                                                        @if($question->status == 1)
                                                                                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">
                                                                                                                Active
                                                                                                             </span>
                                                                                                        @elseif($question->status == 0)
                                                                                                            <span class="label label-lg font-weight-bold label-light-success label-inline">
                                                                                                                Deactivated
                                                                                                             </span>
                                                                                                        @endif
                                                                                                    </td>
                                                                                                    <td class="text-center">
                                                                                                        @if($question->requirement == 1)
                                                                                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">
                                                                                                                Required
                                                                                                            </span>
                                                                                                        @elseif($question->requirement == 0)
                                                                                                            <span class="label label-lg font-weight-bold label-light-success label-inline">
                                                                                                                Optional
                                                                                                            </span>
                                                                                                        @endif
                                                                                                    </td>
                                                                                                    <td class="text-center" style='white-space: nowrap'>
                                                                                                        <a href="{{url("questions/$question->id/copy")}}"><i
                                                                                                                class="flaticon2-copy text-info mr-5"></i></a>
                                                                                                        <a href="{{url("questions/$question->id/edit")}}"><i
                                                                                                                class="far fa-edit text-warning mr-5"></i></a>
                                                                                                        <a href="{{url("questions/$question->id/delete")}}"><i
                                                                                                                class="fas fa-trash-alt text-danger mr-5"></i></a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                        @endforeach
                                                                                    @endif
                                                                                    </tbody>

                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @endforeach

                                                                <div class="card">
                                                                    <div class="card-header" id="category-none">
                                                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse-none">
                                                                            Without Title
                                                                            <div class="ml-10">
                                                                                {{--                                                                                @if($section->status ==1 )--}}
                                                                                {{--                                                                                    <span class="label font-weight-bold label-lg label-light-success label-inline">Active</span>--}}

                                                                                {{--                                                                                @else--}}
                                                                                {{--                                                                                    <span class="label font-weight-bold label-lg label-light-danger label-inline">Inactive</span>--}}

                                                                                {{--                                                                                @endif--}}
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div id="collapse-none" class="collapse"  data-parent="#category-none">
                                                                        <div class="card-body">
                                                                            <div class="overflow-auto">
                                                                                <div class="row">
                                                                                    <div class="btn-group ml-auto mr-2">
                                                                                        <a href="{{url("questions/$quiz->id/create")}}" class="btn btn-outline-success font-weight-bolder p-1 mb-2 mr-3 d-inline-block">
                                                                                            Add New Question <i class="la la-plus p-0"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                                <table class="table table-bordered table-checkable" id="kt_datatable">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>#</th>
                                                                                        <th>Question</th>
                                                                                        <th class="text-center">Additional Info</th>
                                                                                        <th class="text-center">Type</th>
                                                                                        <th class="text-center">Status</th>
                                                                                        <th class="text-center">Requirement</th>
                                                                                        <th class="text-center">Action</th>
                                                                                    </tr>
                                                                                    </thead>

                                                                                    <tbody>
                                                                                        @if($questions != null)
                                                                                            @foreach($questions as $key=>$question)
                                                                                                <tr>
                                                                                                    <td>{{$question->id ?? ''}}</td>
                                                                                                    <td>{{$question->body ?? ''}}</td>
                                                                                                    <td class="text-center">
                                                                                                        @if($question->additional_info == 1)
                                                                                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">
                                                                                                                Active
                                                                                                            </span>
                                                                                                        @elseif($question->additional_info == 0)
                                                                                                            <span class="label label-lg font-weight-bold label-light-success label-inline">
                                                                                                                Deactivated
                                                                                                             </span>
                                                                                                        @endif
                                                                                                    </td>
                                                                                                    <td class="text-center">{{$question->type ?? ''}}</td>

                                                                                                    <td class="text-center">
                                                                                                        @if($question->status == 1)
                                                                                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">
                                                                                                                Active
                                                                                                             </span>
                                                                                                        @elseif($question->status == 0)
                                                                                                            <span class="label label-lg font-weight-bold label-light-success label-inline">
                                                                                                                Deactivated
                                                                                                             </span>
                                                                                                        @endif
                                                                                                    </td>
                                                                                                    <td class="text-center">
                                                                                                        @if($question->requirement == 1)
                                                                                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">
                                                                                                                Required
                                                                                                            </span>
                                                                                                        @elseif($question->requirement == 0)
                                                                                                            <span class="label label-lg font-weight-bold label-light-success label-inline">
                                                                                                                Optional
                                                                                                            </span>
                                                                                                        @endif
                                                                                                    </td>
                                                                                                    <td class="text-center" style='white-space: nowrap'>
                                                                                                        <a href="{{url("questions/$question->id/copy")}}"><i
                                                                                                                class="flaticon2-copy text-info mr-5"></i></a>
                                                                                                        <a href="{{url("questions/$question->id/edit")}}"><i
                                                                                                                class="far fa-edit text-warning mr-5"></i></a>
                                                                                                        <a href="{{url("questions/$question->id/delete")}}"><i
                                                                                                                class="fas fa-trash-alt text-danger mr-5"></i></a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            @endforeach
                                                                                        @endif
                                                                                    </tbody>

                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>




                                                    </div>
                                                    <!--end::Accordion-->
{{--                                                    <div class="overflow-auto">--}}

{{--                                                        <table class="table table-bordered table-checkable"--}}
{{--                                                               id="kt_datatable">--}}
{{--                                                            <thead>--}}
{{--                                                            <tr>--}}
{{--                                                                <th>#</th>--}}
{{--                                                                <th>Question</th>--}}
{{--                                                                <th class="text-center">Additional Info</th>--}}
{{--                                                                <th class="text-center">Type</th>--}}
{{--                                                                <th class="text-center">Status</th>--}}
{{--                                                                <th class="text-center">Requirement</th>--}}
{{--                                                                <th class="text-center">Action</th>--}}
{{--                                                            </tr>--}}
{{--                                                            </thead>--}}

{{--                                                            <tbody>--}}
{{--                                                            @foreach($quiz->question as $key=>$question)--}}
{{--                                                                @if($question->type == 'title')--}}
{{--                                                                    <tr>--}}
{{--                                                                        <td>{{$question->id ?? ''}}</td>--}}
{{--                                                                        <td>{{$question->body ?? ''}}</td>--}}
{{--                                                                        <td class="text-center"--}}
{{--                                                                            style='white-space: nowrap'>--}}
{{--                                                                            <a href="{{url("questions/$question->id/editTitle")}}"><i--}}
{{--                                                                                    class="far fa-edit text-warning mr-5"></i></a>--}}
{{--                                                                            <a href="{{url("questions/$question->id/delete")}}"><i--}}
{{--                                                                                    class="fas fa-trash-alt text-danger mr-5"></i></a>--}}
{{--                                                                        </td>--}}
{{--                                                                    </tr>--}}
{{--                                                                @else--}}
{{--                                                                    <tr>--}}
{{--                                                                        <td>{{$question->id ?? ''}}</td>--}}
{{--                                                                        <td>{{$question->body ?? ''}}</td>--}}
{{--                                                                        <td class="text-center">--}}
{{--                                                                            @if($question->additional_info == 1)--}}
{{--                                                                                <span--}}
{{--                                                                                    class="label label-lg font-weight-bold label-light-primary label-inline">--}}
{{--                                                                                Active--}}
{{--                                                                            </span>--}}
{{--                                                                            @elseif($question->additional_info == 0)--}}
{{--                                                                                <span--}}
{{--                                                                                    class="label label-lg font-weight-bold label-light-success label-inline">--}}
{{--                                                                                Deactivated--}}
{{--                                                                             </span>--}}
{{--                                                                            @endif--}}
{{--                                                                        </td>--}}
{{--                                                                        <td class="text-center">{{$question->type ?? ''}}</td>--}}

{{--                                                                        <td class="text-center">--}}
{{--                                                                            @if($question->status == 1)--}}
{{--                                                                                <span--}}
{{--                                                                                    class="label label-lg font-weight-bold label-light-primary label-inline">--}}
{{--                                                                                Active--}}
{{--                                                                             </span>--}}
{{--                                                                            @elseif($question->status == 0)--}}
{{--                                                                                <span--}}
{{--                                                                                    class="label label-lg font-weight-bold label-light-success label-inline">--}}
{{--                                                                                Deactivated--}}
{{--                                                                             </span>--}}
{{--                                                                            @endif--}}
{{--                                                                        </td>--}}
{{--                                                                        <td class="text-center">--}}
{{--                                                                            @if($question->requirement == 1)--}}
{{--                                                                                <span--}}
{{--                                                                                    class="label label-lg font-weight-bold label-light-primary label-inline">--}}
{{--                                                                                Required--}}
{{--                                                                            </span>--}}
{{--                                                                            @elseif($question->requirement == 0)--}}
{{--                                                                                <span--}}
{{--                                                                                    class="label label-lg font-weight-bold label-light-success label-inline">--}}
{{--                                                                                Optional--}}
{{--                                                                            </span>--}}
{{--                                                                            @endif--}}
{{--                                                                        </td>--}}
{{--                                                                        <td class="text-center"--}}
{{--                                                                            style='white-space: nowrap'>--}}
{{--                                                                            <a href="{{url("questions/$question->id/copy")}}"><i--}}
{{--                                                                                    class="flaticon2-copy text-info mr-5"></i></a>--}}
{{--                                                                            <a href="{{url("questions/$question->id/edit")}}"><i--}}
{{--                                                                                    class="far fa-edit text-warning mr-5"></i></a>--}}
{{--                                                                            <a href="{{url("questions/$question->id/delete")}}"><i--}}
{{--                                                                                    class="fas fa-trash-alt text-danger mr-5"></i></a>--}}
{{--                                                                        </td>--}}
{{--                                                                    </tr>--}}
{{--                                                                @endif--}}
{{--                                                            @endforeach--}}
{{--                                                            </tbody>--}}

{{--                                                        </table>--}}

{{--                                                        <div class="btn-group">--}}
{{--                                                            <a href="{{url("questions/$quiz->id/create")}}"--}}
{{--                                                               class="btn btn-outline-success font-weight-bolder p-2 mb-2 mr-3 d-inline-block">--}}
{{--                                                                <i class="la la-plus p-0"></i> Add New Quotation</a>--}}

{{--                                                        </div>--}}

{{--                                                    </div>--}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <!--end::Example-->
                            </div>
                        </div>
                        <!--end::Card-->


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
