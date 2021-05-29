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

{{--                                                            <div class="form-group row">--}}
{{--                                                                <label class="col-lg-2 col-form-label text-right">Contact Name:</label>--}}
{{--                                                                <div class="col-lg-8">--}}
{{--                                                                    <input type="text" name="contact" class="form-control"--}}
{{--                                                                           placeholder="Enter contact name"--}}
{{--                                                                           value="{{$evaluation->contact  ?? ''}}"/>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
                                                            <div class="form-group row">
                                                                <label class="col-form-label text-right col-lg-2 col-sm-12">Select User</label>
                                                                <div class="col-lg-4 col-md-10 col-sm-12">
                                                                    <select  name="user_id" class="form-control selectpicker" data-size="7" data-live-search="true">
{{--                                                                        <option value="">Select</option>--}}
                                                                        @foreach($targets as $target)
                                                                        <option value="{{$target->id}}">{{$target->name ?? ''}} - {{$target->email ?? ''}}</option>
                                                                            @endforeach
                                                                    </select>
                                                                    <span class="form-text text-muted">Select user of evaluation</span>
                                                                    <a href="#" class="btn btn-outline-success mx-auto" data-toggle="modal" data-target="#new_user_target">Add New User
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
                                            <!--begin::Modal-->
                                            <div class="modal fade" id="new_user_target" role="dialog"  aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Add New User</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <i aria-hidden="true" class="ki ki-close"></i>
                                                            </button>
                                                        </div>
                                                        <form class="form" action="{{url("user/store")}}" method="post">
                                                            <div class="modal-body">

                                                                <!--begin::Form-->
                                                                @csrf

                                                                <div class="form-group row">
                                                                    <div class="col-md-6">
                                                                        <label>Name:</label>
                                                                        <input type="text" name="name" class="form-control form-control-solid" placeholder="Enter body of the scroller" required/>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Email</label>
                                                                        <input type="email" name="email" class="form-control form-control-solid" placeholder="Enter body of the scroller" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <div class="col-md-6">
                                                                        <label>Position:</label>
                                                                        <input type="text" name="position" class="form-control form-control-solid" placeholder="Enter body of the scroller" required/>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label>Password:</label>
                                                                        <input type="password" name="password" class="form-control form-control-solid" placeholder="Enter body of the scroller" required/>
                                                                    </div>
                                                                </div>
                                                                <input type="text" name="business_name" value="{{$evaluation->company ?? ''}}" class="d-none">
                                                                <input type="number" name="user_type" value="2" class="d-none">
                                                                <div class="card-footer">
                                                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                                    {{--                                                                        <button type="reset" class="btn btn-secondary">Cancel</button>--}}
                                                                </div>
                                                                <!--end::Form-->

                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Modal-->

                                            @if(isset($evaluation))
                                                <div class="tab-pane fade @if(isset($evaluation)) show active @endif" id="profile" role="tabpanel"
                                                     aria-labelledby="profile-tab">
                                                    <!--begin::Accordion-->
                                                    <div class="row">
                                                        <div class="btn-group ml-auto">
                                                            <div class="row">
                                                                <a href="" class="btn btn-light-info font-weight-bold mb-3 mr-8" data-toggle="modal" data-target="#new_circle">Add New Circle</a>
                                                            </div>
                                                            <!--begin::Modal-->
                                                            <div class="modal fade" id="new_circle" role="dialog"  aria-hidden="true">
                                                                <div class="modal-dialog modal-lg" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title">Add New Circle</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <i aria-hidden="true" class="ki ki-close"></i>
                                                                            </button>
                                                                        </div>
                                                                        <form class="form" action="{{url("circle/store")}}" method="post">
                                                                            <div class="modal-body">

                                                                                <!--begin::Form-->
                                                                                @csrf
                                                                                <div class="card-body">
                                                                                    <div class="form-group">
                                                                                        <label>Circle Title:</label>
                                                                                        <input type="text" name="title" class="form-control form-control-solid" placeholder="Enter the circle title" required/>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="form-group col-md-6 col-lg-6">
                                                                                            <label>Starting Time</label>
                                                                                            <input type="date" name="start_date" class="form-control form-control-solid" />
                                                                                        </div>
                                                                                        <div class="form-group col-md-6 col-lg-6">
                                                                                            <label>Deadline</label>
                                                                                            <input type="date" name="end_date" class="form-control form-control-solid" />
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="form-group row">
                                                                                        <div class="col-md-6">
                                                                                            <label>Status :</label>
                                                                                            <select name="status" class="form-control form-control-solid">
                                                                                                <option value="1">Active</option>
                                                                                                <option value="0">Schedule</option>
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>

                                                                                    <input type="number" name="evaluation_id" value="{{$evaluation->id ?? ''}}" class="d-none">
                                                                                    <input type="number" name="user_id" value="{{$evaluation->user_id ?? ''}}" class="d-none">
                                                                                </div>
                                                                                <div class="card-footer">
                                                                                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                                                                                    {{--                                                                        <button type="reset" class="btn btn-secondary">Cancel</button>--}}
                                                                                </div>
                                                                                <!--end::Form-->

                                                                            </div>

                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end::Modal-->
                                                        </div>
                                                    </div>
                                                    <div class="accordion accordion-solid accordion-toggle-plus" id="accordion3">
                                                            @foreach($circles as $key=>$circle)
                                                                <div class="card">
                                                                    <div class="card-header" id="category-{{$circle->id ?? ''}}">
                                                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse-{{$circle->id ?? ''}}">
                                                                            {{$circle->title ?? ''}}
                                                                            <div class="ml-10">
                                                                                @if($circle->status == 1 )
                                                                                    <span class="label font-weight-bold label-lg label-light-primary label-inline">Created</span>

                                                                                @elseif($circle->status == 2)
                                                                                    <span class="label font-weight-bold label-lg label-light-danger label-inline">Ready to Send</span>

                                                                                @elseif($circle->status == 3)
                                                                                    <span class="label font-weight-bold label-lg label-light-warning label-inline">User Answering </span>

                                                                                @elseif($circle->status == 4)
                                                                                    <span class="label font-weight-bold label-lg label-light-info label-inline">Ready to Send Report</span>

                                                                                @elseif($circle->status == 5)
                                                                                    <span class="label font-weight-bold label-lg label-light-dark label-inline">Report Sent</span>

                                                                                @elseif($circle->status == 6)
                                                                                    <span class="label font-weight-bold label-lg label-light-success label-inline">Client Checked</span>

                                                                                @endif
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                    <div id="collapse-{{$circle->id ?? ''}}" class="collapse"  data-parent="#category-{{$circle->id ?? ''}}">
                                                                        <div class="card-body">
                                                                            <div class="overflow-auto">
                                                                            @include('fragment.error')
                                                                                <div class="btn-group">

                                                                                        <div class="row">
                                                                                            <a href="" class="btn btn-light-success font-weight-bold mb-3 mr-3 ml-5" data-toggle="modal" data-target="#new_question{{$key}}">Add New Question</a>
                                                                                        </div>
                                                                                        <!--begin::Modal-->
                                                                                        <div class="modal fade" id="new_question{{$key}}" role="dialog"  aria-hidden="true">
                                                                                            <div class="modal-dialog modal-lg" role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <h5 class="modal-title">Add New Question</h5>
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <form class="form" action="{{url("circle/new_question")}}" method="post">
                                                                                                        <div class="modal-body">

                                                                                                            <!--begin::Form-->
                                                                                                            @csrf
                                                                                                                <div class="form-group">
                                                                                                                    <label>Question:</label>
                                                                                                                    <input type="text" name="title" class="form-control form-control-solid" placeholder="Enter the body of question" required/>
                                                                                                                </div>
                                                                                                                <div class="form-group row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <label>Status :</label>
                                                                                                                        <select name="status" class="form-control form-control-solid">
                                                                                                                            <option value="1">on</option>
                                                                                                                            <option value="0">off</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <input type="number" name="circle_id" value="{{$circle->id ?? ''}}" class="d-none">
                                                                                                            <div class="card-footer">
                                                                                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                                                                                {{--                                                                        <button type="reset" class="btn btn-secondary">Cancel</button>--}}
                                                                                                            </div>
                                                                                                            <!--end::Form-->

                                                                                                        </div>

                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--end::Modal-->
                                                                                        <div class="row">
                                                                                            <a href="" class="btn btn-light-warning font-weight-bold mb-3 mr-3 ml-8" data-toggle="modal" data-target="#new_scroller{{$key}}">Add New Scroller</a>
                                                                                        </div>
                                                                                        <!--begin::Modal-->
                                                                                        <div class="modal fade" id="new_scroller{{$key}}" role="dialog"  aria-hidden="true">
                                                                                            <div class="modal-dialog modal-lg" role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <h5 class="modal-title">Add New Scroller</h5>
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <form class="form" action="{{url("circle/new_scroller")}}" method="post">
                                                                                                        <div class="modal-body">

                                                                                                            <!--begin::Form-->
                                                                                                            @csrf
                                                                                                                <div class="form-group">
                                                                                                                    <label>Body:</label>
                                                                                                                    <input type="text" name="title" class="form-control form-control-solid" placeholder="Enter body of the scroller" required/>
                                                                                                                </div>
                                                                                                                <div class="form-group row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <label>Minimum :</label>
                                                                                                                        <input type="number" name="min_range" class="form-control form-control-solid" placeholder="Enter minimum" required/>
                                                                                                                    </div>
                                                                                                                    <div class="col-md-6">
                                                                                                                        <label>Maximum :</label>
                                                                                                                        <input type="number" name="max_range" class="form-control form-control-solid" placeholder="Enter maximum" required/>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <input type="number" name="circle_id" value="{{$circle->id ?? ''}}" class="d-none">
                                                                                                            <div class="card-footer">
                                                                                                                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                                                                                {{--                                                                        <button type="reset" class="btn btn-secondary">Cancel</button>--}}
                                                                                                            </div>
                                                                                                            <!--end::Form-->

                                                                                                        </div>

                                                                                                    </form>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--end::Modal-->

                                                                                </div>
                                                                                <table class="table table-bordered table-checkable" id="kt_datatable">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>#</th>
                                                                                        <th class="text-center">Question</th>
                                                                                        <th class="text-center">Type</th>
                                                                                        <th class="text-center">Status</th>
                                                                                        <th class="text-center">Range</th>
                                                                                        <th class="text-center">Action</th>
                                                                                    </tr>
                                                                                    </thead>

                                                                                    <tbody>
                                                                                    @foreach($circle->questions as $question_key=>$question)
                                                                                        <tr>
                                                                                            <td class="text-center">{{$question_key+1 ?? ''}}</td>
                                                                                            <td class="text-center">{{$question->title ?? ''}}</td>
                                                                                            <td class="text-center">{{$question->type ?? ''}}</td>
                                                                                            <td class="text-center">{{$question->status ?? ''}}</td>

                                                                                            <td class="text-center">
                                                                                                @if($question->type == "scroller")
                                                                                                 {{$question->min_range}} / {{$question->max_range}}
                                                                                                    @else
                                                                                                -
                                                                                                @endif
                                                                                            </td>
                                                                                            <td class="text-center" style='white-space: nowrap'>
                                                                                                <a href="#" data-toggle="modal" data-target="#question{{$question_key}}"><i
                                                                                                        class="far fa-edit text-warning mr-5"></i></a>
                                                                                                <a href="{{url("circle/$question->id/delete")}}"><i
                                                                                                        class="fas fa-trash-alt text-danger mr-5"></i></a>
                                                                                            </td>
                                                                                            <!--begin::Modal-->
                                                                                            <div class="modal fade" id="question{{$question_key}}" role="dialog"  aria-hidden="true">
                                                                                                <div class="modal-dialog modal-lg" role="document">
                                                                                                    <div class="modal-content">
                                                                                                        <div class="modal-header">
                                                                                                            <h5 class="modal-title">Edit</h5>
                                                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                <i aria-hidden="true" class="ki ki-close"></i>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                        @if($question->type == 'question')
                                                                                                        <form class="form" action="{{url("circle/$question->id/edit_question")}}" method="post">
                                                                                                            <div class="modal-body">
                                                                                                                @method('PUT')
                                                                                                                <!--begin::Form-->
                                                                                                                @csrf
                                                                                                                <div class="form-group">
                                                                                                                    <label>Body:</label>
                                                                                                                    <input type="text" name="title" class="form-control form-control-solid" value="{{$question->title ?? ''}}" placeholder="Enter body of the scroller" required/>
                                                                                                                </div>
                                                                                                                <div class="form-group row">
                                                                                                                    <div class="col-md-6">
                                                                                                                        <label>Status :</label>
                                                                                                                        <select name="status" class="form-control form-control-solid">
                                                                                                                            <option @if($question->status == 1) selected @endif value="1">on</option>
                                                                                                                            <option @if($question->status == 0) selected @endif value="0">off</option>
                                                                                                                        </select>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div class="card-footer">
                                                                                                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                                                                                    {{--                                                                        <button type="reset" class="btn btn-secondary">Cancel</button>--}}
                                                                                                                </div>
                                                                                                                <!--end::Form-->
                                                                                                            </div>
                                                                                                        </form>
                                                                                                            @elseif($question->type == 'scroller')
                                                                                                            <form class="form" action="{{url("circle/$question->id/edit_scroller")}}" method="post">
                                                                                                                <div class="modal-body">
                                                                                                                    @method('PUT')
                                                                                                                    <!--begin::Form-->
                                                                                                                    @csrf
                                                                                                                    <div class="form-group">
                                                                                                                        <label>Body:</label>
                                                                                                                        <input type="text" name="title" class="form-control form-control-solid"  value="{{$question->title ?? ''}}" placeholder="Enter body of the scroller" required/>
                                                                                                                    </div>
                                                                                                                    <div class="form-group row">
                                                                                                                        <div class="col-md-6">
                                                                                                                            <label>Minimum :</label>
                                                                                                                            <input type="number" name="min_range" class="form-control form-control-solid"  value="{{$question->min_range ?? ''}}" placeholder="Enter minimum" required/>
                                                                                                                        </div>
                                                                                                                        <div class="col-md-6">
                                                                                                                            <label>Maximum :</label>
                                                                                                                            <input type="number" name="max_range" class="form-control form-control-solid"  value="{{$question->max_range ?? ''}}" placeholder="Enter maximum" required/>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="card-footer">
                                                                                                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                                                                                        {{--                                                                        <button type="reset" class="btn btn-secondary">Cancel</button>--}}
                                                                                                                    </div>
                                                                                                                    <!--end::Form-->

                                                                                                                </div>

                                                                                                            </form>

                                                                                                        @endif
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <!--end::Modal-->
                                                                                        </tr>
                                                                                        @endforeach
                                                                                    </tbody>

                                                                                </table>
                                                                            </div>
                                                                            <div class="overflow-auto">

                                                                                <div class="btn-group">
                                                                                        <div class="row">
                                                                                            <a href="" class="btn btn-light-primary font-weight-bold mb-3 mr-3 ml-5" data-toggle="modal" data-target="#new_user{{$key}}">Add New User</a>
                                                                                        </div>
                                                                                        <!--begin::Modal-->
                                                                                        <div class="modal fade" id="new_user{{$key}}" role="dialog"  aria-hidden="true">
                                                                                            <div class="modal-dialog modal-lg" role="document">
                                                                                                <div class="modal-content">
                                                                                                    <div class="modal-header">
                                                                                                        <h5 class="modal-title">Add New User</h5>
                                                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                                                                        </button>
                                                                                                    </div>
                                                                                                    <form class="form" action="{{url("circle/new_user")}}" method="post">
                                                                                                        <div class="modal-body">

                                                                                                            <!--begin::Form-->
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

                                                                                                    </form>
                                                                                                    <!--begin::Modal-->
                                                                                                    <div class="modal fade" id="new_user_client{{$key}}" role="dialog"  aria-hidden="true">
                                                                                                        <div class="modal-dialog modal-lg" role="document">
                                                                                                            <div class="modal-content">
                                                                                                                <div class="modal-header">
                                                                                                                    <h5 class="modal-title">Add New User</h5>
                                                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                                                                    </button>
                                                                                                                </div>
                                                                                                                <form class="form" action="{{url("user/store")}}" method="post">
                                                                                                                    <div class="modal-body">

                                                                                                                        <!--begin::Form-->
                                                                                                                        @csrf

                                                                                                                        <div class="form-group row">
                                                                                                                            <div class="col-md-6">
                                                                                                                                <label>Name:</label>
                                                                                                                                <input type="text" name="name" class="form-control form-control-solid" placeholder="Enter body of the scroller" required/>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-6">
                                                                                                                                <label>Email</label>
                                                                                                                                <input type="email" name="email" class="form-control form-control-solid" placeholder="Enter body of the scroller" required/>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <div class="form-group row">
                                                                                                                            <div class="col-md-6">
                                                                                                                                <label>Position:</label>
                                                                                                                                <input type="text" name="position" class="form-control form-control-solid" placeholder="Enter body of the scroller" required/>
                                                                                                                            </div>
                                                                                                                            <div class="col-md-6">
                                                                                                                                <label>Password:</label>
                                                                                                                                <input type="password" name="password" class="form-control form-control-solid" placeholder="Enter body of the scroller" required/>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                        <input type="text" name="business_name" value="{{$evaluation->company ?? ''}}" class="d-none">
                                                                                                                        <input type="number" name="user_type" value="3" class="d-none">
                                                                                                                        <div class="card-footer">
                                                                                                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                                                                                                            {{--                                                                        <button type="reset" class="btn btn-secondary">Cancel</button>--}}
                                                                                                                        </div>
                                                                                                                        <!--end::Form-->

                                                                                                                    </div>

                                                                                                                </form>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <!--end::Modal-->
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!--end::Modal-->
                                                                                </div>
                                                                                <table class="table table-bordered table-checkable" id="kt_datatable">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>#</th>
                                                                                        <th>User</th>
                                                                                        <th class="text-center">Email</th>
                                                                                        <th class="text-center">Company</th>
                                                                                        <th class="text-center">Action</th>
                                                                                    </tr>
                                                                                    </thead>

                                                                                    <tbody>
                                                                                    @foreach($circle->users as $users_key=>$user)
                                                                                        <tr>
                                                                                            <td class="text-center">{{$users_key+1 ?? ''}}</td>
                                                                                            <td class="text-center">{{$user->name ?? ''}}</td>
                                                                                            <td class="text-center">{{$user->email ?? ''}}</td>
                                                                                            <td class="text-center">{{$user->business_name ?? ''}}</td>
                                                                                            <td class="text-center" style='white-space: nowrap'>
                                                                                                <form action="{{url("circle/delete_user")}}" method="post">
                                                                                                    @csrf
                                                                                                    <input type="number" value="{{$user->id}}" name="user_id" class="d-none">
                                                                                                    <input type="number" value="{{$circle->id}}" name="circle_id" class="d-none">
                                                                                                    <button class="btn btn-link" type="submit"><i class="fas fa-trash-alt text-danger mr-5"></i></button>
                                                                                                </form>
                                                                                            </td>
                                                                                        </tr>
                                                                                        @endforeach
                                                                                    </tbody>

                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            @endforeach



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
