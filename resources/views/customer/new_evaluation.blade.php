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
                                    @if(isset($evaluation))
                                        <h3 class="card-label">Evaluation No: {{$evaluation->id ?? ''}}
                                            <span
                                                class="d-block text-muted pt-2 font-size-sm">Evaluation Name : {{$evaluation->name ?? ''}}</span>
                                        </h3>
                                    @else
                                        <h3 class="card-label">New Evaluation </h3>
                                    @endif
                                </div>
                            </div>
                            <div class="card-body">
                                <!--begin::Example-->
                                <div class="example">

                                    <div>
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link @if(!isset($evaluation)) active @endif" id="home-tab" data-toggle="tab" href="#home">
                                                    <span class="nav-icon"><i class="flaticon-exclamation-square "></i></span>
                                                    <span class="nav-text">Evaluation Information</span>
                                                </a>
                                            </li>
                                            @if(isset($evaluation))
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="profile-tab" data-toggle="tab"
                                                       href="#profile" aria-controls="profile">
                                                        <span class="nav-icon"><i class="flaticon2-layers-1"></i></span>
                                                        <span class="nav-text">Circles</span>
                                                    </a>
                                                </li>
                                            @endif

                                        </ul>
                                        <div class="tab-content mt-5" id="myTabContent">
                                            <div class="tab-pane fade  @if(!isset($evaluation)) show active @endif" id="home" role="tabpanel"
                                                 aria-labelledby="home-tab">
                                                <div class="px-5 px-md-30">

                                                    <!--begin::Form-->
                                                    <form class="form" action="
                                                        @if(isset($evaluation))
                                                    {{url("evaluation/$evaluation->id/update")}}
                                                    @else
                                                    {{url("evaluation/store")}}
                                                    @endif
                                                        " method="post" enctype="multipart/form-data">

                                                        @csrf
                                                        @if(isset($evaluation))
                                                            @method('PUT')

                                                        @endif
                                                        <div class="">
                                                            @include('fragment.error')
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right">Evaluation Name:</label>
                                                                <div class="col-lg-8">
                                                                    <input type="text" name="name" class="form-control"
                                                                           placeholder="Enter evaluation Name"
                                                                           value="{{$evaluation->name  ?? ''}}"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right"
                                                                       for="exampleTextarea">Description :</label>
                                                                <div class="col-lg-8">
                                                                    {{--                                                                    <textarea class="form-control" name="description" id="exampleTextarea" rows="3">{{$quiz->description  ?? ''}}</textarea>--}}
                                                                    <textarea name="description" id="kt-ckeditor-1">
                                                                        {!! $evaluation->description  ?? ''!!}
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right">Company:</label>
                                                                <div class="col-lg-8">
                                                                    <input type="text" name="company" class="form-control"
                                                                           placeholder="Enter company name"
                                                                           value="{{$evaluation->company  ?? ''}}"/>
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right">Contact Name:</label>
                                                                <div class="col-lg-8">
                                                                    <input type="text" name="contact" class="form-control"
                                                                           placeholder="Enter contact name"
                                                                           value="{{$evaluation->contact  ?? ''}}"/>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-form-label text-right col-lg-2 col-sm-12">Select User</label>
                                                                <div class="col-lg-4 col-md-10 col-sm-12">
                                                                    <select class="form-control selectpicker" data-size="7" data-live-search="true">
                                                                        <option value="">Select</option>
                                                                        @foreach($users as $user)
                                                                        <option value="{{$user->id}}">{{$user->name ?? ''}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                    <span class="form-text text-muted">Select user of evaluation</span>
                                                                    <a href="#"
                                                                            class="btn btn-outline-success mx-auto">Add New User
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="form-group col-md-6 col-lg-6">
                                                                    <label>Starting Time</label>
                                                                    <input type="date" name="start" value="{{$evaluation->start ?? ''}}" class="form-control form-control-solid" />
                                                                </div>
                                                                <div class="form-group col-md-6 col-lg-6">
                                                                    <label>Deadline</label>
                                                                    <input type="date" name="deadline" value="{{$evaluation->deadline ?? ''}}" class="form-control form-control-solid" />
                                                                </div>
                                                            </div>


                                                        </div>


                                                        <div class="row">
                                                            <button type="submit"
                                                                    class="btn btn-success mx-auto w-100px">Save
                                                            </button>
                                                        </div>
                                                        @if(isset($evaluation))
                                                            <img class="img-fluid mt-5" src="{{asset($evaluation->result_banner)}}"
                                                                 alt="">
                                                        @endif
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                            </div>

                                            @if(isset($evaluation))
                                                <div class="tab-pane fade @if(isset($evaluation)) show active @endif" id="profile" role="tabpanel"
                                                     aria-labelledby="profile-tab">
                                                    <!--begin::Accordion-->
                                                    <div class="row">
                                                        <div class="btn-group ml-auto">
                                                            <a href="{{url("")}}"
                                                               class="btn btn-outline-warning font-weight-bolder p-2 mb-2 mr-3 d-inline-block">
                                                                <i class="la la-plus p-0"></i> Add New Circle</a>
                                                        </div>
                                                    </div>
                                                    <div class="accordion accordion-solid accordion-toggle-plus" id="accordion3">
{{--                                                            @foreach($sections as $key=>$section)--}}
                                                                <div class="card">
                                                                    <div class="card-header" id="category-{{$section->id ?? ''}}">
                                                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse-{{$section->id ?? ''}}">
                                                                            {{$section->body ?? ''}}First Circle
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
                                                                                        <a href="{{url("/questions/section/create")}}" class="btn btn-outline-success font-weight-bolder p-1 mb-2 mr-3 d-inline-block">
                                                                                            <i class="la la-plus p-0"></i>Add New Question</a>
                                                                                        <a href="{{url("/questions/section/create")}}" class="btn btn-outline-primary font-weight-bolder p-1 mb-2 mr-3 d-inline-block">
                                                                                            <i class="la la-plus p-0"></i>Add New Scroller</a>
{{--                                                                                        <a href="{{url("/admin/categories/$section->id/delete")}}" class="btn btn-outline-danger font-weight-bolder p-1 mb-2 mr-3 d-inline-block">--}}
{{--                                                                                            <i class="la la-trash p-0"></i></a>--}}
                                                                                    </form>
                                                                                </div>
                                                                                <table class="table table-bordered table-checkable" id="kt_datatable">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>#</th>
                                                                                        <th>Question</th>
                                                                                        <th class="text-center">Type</th>
                                                                                        <th class="text-center">Status</th>
                                                                                        <th class="text-center">Range</th>
                                                                                        <th class="text-center">Action</th>
                                                                                    </tr>
                                                                                    </thead>

                                                                                    <tbody>

                                                                                                <tr>
                                                                                                    <td class="text-center">{{$question->id ?? ''}}1</td>
                                                                                                    <td class="text-center">{{$question->body ?? ''}}Action Plan</td>
                                                                                                    <td class="text-center">Text
{{--                                                                                                        @if($question->additional_info == 1)--}}
{{--                                                                                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">--}}
{{--                                                                                                                Active--}}
{{--                                                                                                            </span>--}}
{{--                                                                                                        @elseif($question->additional_info == 0)--}}
{{--                                                                                                            <span class="label label-lg font-weight-bold label-light-success label-inline">--}}
{{--                                                                                                                Deactivated--}}
{{--                                                                                                             </span>--}}
{{--                                                                                                        @endif--}}
                                                                                                    </td>
                                                                                                    <td class="text-center">{{$question->type ?? ''}} -</td>

                                                                                                    <td class="text-center">-
{{--                                                                                                        @if($question->status == 1)--}}
{{--                                                                                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">--}}
{{--                                                                                                                Active--}}
{{--                                                                                                             </span>--}}
{{--                                                                                                        @elseif($question->status == 0)--}}
{{--                                                                                                            <span class="label label-lg font-weight-bold label-light-success label-inline">--}}
{{--                                                                                                                Deactivated--}}
{{--                                                                                                             </span>--}}
{{--                                                                                                        @endif--}}
                                                                                                    </td>
{{--                                                                                                    <td class="text-center">--}}
{{--                                                                                                        @if($question->requirement == 1)--}}
{{--                                                                                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">--}}
{{--                                                                                                                Required--}}
{{--                                                                                                            </span>--}}
{{--                                                                                                        @elseif($question->requirement == 0)--}}
{{--                                                                                                            <span class="label label-lg font-weight-bold label-light-success label-inline">--}}
{{--                                                                                                                Optional--}}
{{--                                                                                                            </span>--}}
{{--                                                                                                        @endif--}}
{{--                                                                                                    </td>--}}
                                                                                                    <td class="text-center" style='white-space: nowrap'>
                                                                                                        <a href="{{url("questions/copy")}}"><i
                                                                                                                class="flaticon2-copy text-info mr-5"></i></a>
                                                                                                        <a href="{{url("questions/edit")}}"><i
                                                                                                                class="far fa-edit text-warning mr-5"></i></a>
                                                                                                        <a href="{{url("questions/delete")}}"><i
                                                                                                                class="fas fa-trash-alt text-danger mr-5"></i></a>
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr>
                                                                                                    <td class="text-center">{{$question->id ?? ''}}1</td>
                                                                                                    <td class="text-center">{{$question->body ?? ''}}Score</td>
                                                                                                    <td class="text-center">{{$question->body ?? ''}}Scroll Bar</td>
                                                                                                    <td class="text-center">{{$question->body ?? ''}}-</td>
                                                                                                    <td class="text-center">{{$question->body ?? ''}}-3 / +3</td>
                                                                                                    <td class="text-center" style='white-space: nowrap'>
                                                                                                        <a href="{{url("questions/copy")}}"><i
                                                                                                                class="flaticon2-copy text-info mr-5"></i></a>
                                                                                                        <a href="{{url("questions/edit")}}"><i
                                                                                                                class="far fa-edit text-warning mr-5"></i></a>
                                                                                                        <a href="{{url("questions/delete")}}"><i
                                                                                                                class="fas fa-trash-alt text-danger mr-5"></i></a>
                                                                                                    </td>
                                                                                                </tr>

                                                                                    </tbody>

                                                                                </table>
                                                                            </div>
                                                                            <div class="overflow-auto">

                                                                                <div class="btn-group">

                                                                                    <form  method="post">
                                                                                        <a href="{{url("/questions/section/create")}}" class="btn btn-outline-success font-weight-bolder p-1 mb-2 mr-3 d-inline-block">
                                                                                            <i class="la la-plus p-0"></i>Add New User</a>

                                                                                        {{--                                                                                        <a href="{{url("/admin/categories/$section->id/delete")}}" class="btn btn-outline-danger font-weight-bolder p-1 mb-2 mr-3 d-inline-block">--}}
                                                                                        {{--                                                                                            <i class="la la-trash p-0"></i></a>--}}
                                                                                    </form>
                                                                                </div>
                                                                                <table class="table table-bordered table-checkable" id="kt_datatable">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>#</th>
                                                                                        <th>User</th>
                                                                                        <th class="text-center">Email</th>
                                                                                        <th class="text-center">Position</th>
                                                                                        <th class="text-center">Status</th>
                                                                                    </tr>
                                                                                    </thead>

                                                                                    <tbody>

                                                                                    <tr>
                                                                                        <td class="text-center">{{$question->id ?? ''}}1</td>
                                                                                        <td class="text-center">{{$question->body ?? ''}}David Nour</td>
                                                                                        <td class="text-center">{{$question->body ?? ''}}davidnour@gmail.com</td>
                                                                                        <td class="text-center">{{$question->body ?? ''}}Technical Manager</td>
                                                                                        <td class="text-center">{{$question->body ?? ''}}Active</td>
                                                                                        <td class="text-center" style='white-space: nowrap'>
                                                                                            <a href="{{url("questions/copy")}}"><i
                                                                                                    class="flaticon2-copy text-info mr-5"></i></a>
                                                                                            <a href="{{url("questions/edit")}}"><i
                                                                                                    class="far fa-edit text-warning mr-5"></i></a>
                                                                                            <a href="{{url("questions/delete")}}"><i
                                                                                                    class="fas fa-trash-alt text-danger mr-5"></i></a>
                                                                                        </td>
                                                                                    </tr>

                                                                                    </tbody>

                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

{{--                                                            @endforeach--}}

                                                                <div class="card">
                                                                    <div class="card-header" id="category-none">
                                                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse-none">
                                                                            Second Circle
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
                                                                                <div class="overflow-auto">

                                                                                    <div class="btn-group">

                                                                                        <form  method="post">
                                                                                            <a href="{{url("/questions/section/create")}}" class="btn btn-outline-success font-weight-bolder p-1 mb-2 mr-3 d-inline-block">
                                                                                                <i class="la la-plus p-0"></i>Add New Question</a>
                                                                                            <a href="{{url("/questions/section/create")}}" class="btn btn-outline-primary font-weight-bolder p-1 mb-2 mr-3 d-inline-block">
                                                                                                <i class="la la-plus p-0"></i>Add New Scroller</a>
                                                                                            {{--                                                                                        <a href="{{url("/admin/categories/$section->id/delete")}}" class="btn btn-outline-danger font-weight-bolder p-1 mb-2 mr-3 d-inline-block">--}}
                                                                                            {{--                                                                                            <i class="la la-trash p-0"></i></a>--}}
                                                                                        </form>
                                                                                    </div>
                                                                                    <table class="table table-bordered table-checkable" id="kt_datatable">
                                                                                        <thead>
                                                                                        <tr>
                                                                                            <th>#</th>
                                                                                            <th>Question</th>
                                                                                            <th class="text-center">Type</th>
                                                                                            <th class="text-center">Status</th>
                                                                                            <th class="text-center">Range</th>
                                                                                            <th class="text-center">Action</th>
                                                                                        </tr>
                                                                                        </thead>

                                                                                        <tbody>

                                                                                        <tr>
                                                                                            <td class="text-center">{{$question->id ?? ''}}1</td>
                                                                                            <td class="text-center">{{$question->body ?? ''}}Action Plan</td>
                                                                                            <td class="text-center">Text
                                                                                                {{--                                                                                                        @if($question->additional_info == 1)--}}
                                                                                                {{--                                                                                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">--}}
                                                                                                {{--                                                                                                                Active--}}
                                                                                                {{--                                                                                                            </span>--}}
                                                                                                {{--                                                                                                        @elseif($question->additional_info == 0)--}}
                                                                                                {{--                                                                                                            <span class="label label-lg font-weight-bold label-light-success label-inline">--}}
                                                                                                {{--                                                                                                                Deactivated--}}
                                                                                                {{--                                                                                                             </span>--}}
                                                                                                {{--                                                                                                        @endif--}}
                                                                                            </td>
                                                                                            <td class="text-center">{{$question->type ?? ''}} -</td>

                                                                                            <td class="text-center">-
                                                                                                {{--                                                                                                        @if($question->status == 1)--}}
                                                                                                {{--                                                                                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">--}}
                                                                                                {{--                                                                                                                Active--}}
                                                                                                {{--                                                                                                             </span>--}}
                                                                                                {{--                                                                                                        @elseif($question->status == 0)--}}
                                                                                                {{--                                                                                                            <span class="label label-lg font-weight-bold label-light-success label-inline">--}}
                                                                                                {{--                                                                                                                Deactivated--}}
                                                                                                {{--                                                                                                             </span>--}}
                                                                                                {{--                                                                                                        @endif--}}
                                                                                            </td>
                                                                                            {{--                                                                                                    <td class="text-center">--}}
                                                                                            {{--                                                                                                        @if($question->requirement == 1)--}}
                                                                                            {{--                                                                                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">--}}
                                                                                            {{--                                                                                                                Required--}}
                                                                                            {{--                                                                                                            </span>--}}
                                                                                            {{--                                                                                                        @elseif($question->requirement == 0)--}}
                                                                                            {{--                                                                                                            <span class="label label-lg font-weight-bold label-light-success label-inline">--}}
                                                                                            {{--                                                                                                                Optional--}}
                                                                                            {{--                                                                                                            </span>--}}
                                                                                            {{--                                                                                                        @endif--}}
                                                                                            {{--                                                                                                    </td>--}}
                                                                                            <td class="text-center" style='white-space: nowrap'>
                                                                                                <a href="{{url("questions/copy")}}"><i
                                                                                                        class="flaticon2-copy text-info mr-5"></i></a>
                                                                                                <a href="{{url("questions/edit")}}"><i
                                                                                                        class="far fa-edit text-warning mr-5"></i></a>
                                                                                                <a href="{{url("questions/delete")}}"><i
                                                                                                        class="fas fa-trash-alt text-danger mr-5"></i></a>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td class="text-center">{{$question->id ?? ''}}1</td>
                                                                                            <td class="text-center">{{$question->body ?? ''}}Score</td>
                                                                                            <td class="text-center">{{$question->body ?? ''}}Scroll Bar</td>
                                                                                            <td class="text-center">{{$question->body ?? ''}}-</td>
                                                                                            <td class="text-center">{{$question->body ?? ''}}-3 / +3</td>
                                                                                            <td class="text-center" style='white-space: nowrap'>
                                                                                                <a href="{{url("questions/copy")}}"><i
                                                                                                        class="flaticon2-copy text-info mr-5"></i></a>
                                                                                                <a href="{{url("questions/edit")}}"><i
                                                                                                        class="far fa-edit text-warning mr-5"></i></a>
                                                                                                <a href="{{url("questions/delete")}}"><i
                                                                                                        class="fas fa-trash-alt text-danger mr-5"></i></a>
                                                                                            </td>
                                                                                        </tr>

                                                                                        </tbody>

                                                                                    </table>
                                                                                </div>
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
{{--                                                            @foreach($evaluation->question as $key=>$question)--}}
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
{{--                                                            <a href="{{url("questions/$evaluation->id/create")}}"--}}
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

    <script !src="">


        // Class definition

        var KTBootstrapSelect = function () {

            // Private functions
            var demos = function () {
                // minimum setup
                $('.kt-selectpicker').selectpicker();
            }

            return {
                // public functions
                init: function() {
                    demos();
                }
            };
        }();

        jQuery(document).ready(function() {
            KTBootstrapSelect.init();
        });


    </script>

    <script src="{{asset('js/pages/crud/forms/widgets/bootstrap-select.js')}}"></script>

@endsection
