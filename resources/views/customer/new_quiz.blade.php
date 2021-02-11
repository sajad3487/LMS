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
                                        <span class="d-block text-muted pt-2 font-size-sm">Quiz title : {{$quiz->title ?? ''}}</span>
                                    </h3>
                                @else
                                    <h3 class="card-label">New Quiz </h3>
                                @endif
                            </div>

                        </div>
                        <div class="card-body">
                            <!--begin::Accordion-->
                            <div class="accordion accordion-solid accordion-toggle-plus" id="accordion3">
                                <div class="card">
                                        <div class="card-header" id="category-header">
                                            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse-header">
                                                Quiz Header
                                            </div>
                                        </div>
                                        <div id="collapse-header" class="collapse @if(!isset($quiz)) show @endif"  data-parent="#category-header">
                                            <div class="card-body">
                                                <div class="pl-5 pl-md-30">
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
                                                        @endif
                                                        <div class="">
                                                            @include('fragment.error')
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-center">Quiz title :</label>
                                                                <div class="col-lg-8">
                                                                    <input type="text" name="title" class="form-control" placeholder="Enter quiz title" value="{{$quiz->title  ?? ''}}" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-center" for="exampleTextarea">Description :</label>
                                                                <div class="col-lg-8">
{{--                                                                    <textarea class="form-control" name="description" id="exampleTextarea" rows="3">{{$quiz->description  ?? ''}}</textarea>--}}
                                                                    <textarea name="description" id="kt-ckeditor-1">
                                                                        {{old('description') ?? $segment->description  ?? ''}}
                                                                    </textarea>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-center">First Name Label:</label>
                                                                <div class="col-lg-3">
                                                                    <input type="text" name="first_name_label" class="form-control" placeholder="Enter your first name label" value="{{$quiz->first_name_label  ?? ''}}" />
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="first_name_requirement" value="1" @if(isset($quiz) && $quiz->first_name_requirement == 0)  @else checked="checked" @endif />
                                                                        <span></span>
                                                                        Required
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="first_name_requirement" value="0" @if(isset($quiz) && $quiz->first_name_requirement == 0) checked="checked" @endif/>
                                                                        <span></span>
                                                                        Optional
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-center">Last Name Label:</label>
                                                                <div class="col-lg-3">
                                                                    <input type="text" name="last_name_label" class="form-control" placeholder="Enter your last name label" value="{{$quiz->last_name_label  ?? ''}}" />
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="last_name_requirement" value="1" @if(isset($quiz) && $quiz->last_name_requirement == 0)  @else checked="checked" @endif />
                                                                        <span></span>
                                                                        Required
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="last_name_requirement" value="0" @if(isset($quiz) && $quiz->last_name_requirement == 0) checked="checked" @endif/>
                                                                        <span></span>
                                                                        Optional
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-center">Email Label:</label>
                                                                <div class="col-lg-3">
                                                                    <input type="text" name="email_label" class="form-control" placeholder="Enter your email label" value="{{$quiz->email_label  ?? ''}}" />
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="email_requirement" value="1" @if(isset($quiz) && $quiz->email_requirement == 0)  @else checked="checked" @endif />
                                                                        <span></span>
                                                                        Required
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="email_requirement" value="0" @if(isset($quiz) && $quiz->email_requirement == 0) checked="checked" @endif/>
                                                                        <span></span>
                                                                        Optional
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="placeholder" value="1" @if(isset($quiz) && $quiz->placeholder == 0)  @else checked="checked" @endif />
                                                                        <span></span>
                                                                        Use Placeholder
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="placeholder" value="0" @if(isset($quiz) && $quiz->placeholder == 0) checked="checked" @endif/>
                                                                        <span></span>
                                                                        Don't Use Placeholder
                                                                    </label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <button type="submit" class="btn btn-success mx-auto w-100px">Save</button>
                                                        </div>
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @if(isset($quiz))

                                <div class="card">
                                    <div class="card-header" id="category-questions">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse-questions">
                                            Questions
                                        </div>
                                    </div>
                                    <div id="collapse-questions" class="collapse @if(isset($quiz)) show @endif"  data-parent="#category-questions">
                                        <div class="card-body">
                                            <div class="overflow-auto">

                                                <table class="table table-bordered table-checkable" id="kt_datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Question</th>
                                                            <th class="text-center" >Additional Info</th>
                                                            <th class="text-center" >Type</th>
                                                            <th class="text-center" >Status</th>
                                                            <th class="text-center" >Requirement</th>
                                                            <th class="text-center" >Action</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                         @foreach($quiz->question as $key=>$question)
                                                             @if($question->type == 'question')
                                                                 <tr>
                                                                     <td>{{$question->id ?? ''}}</td>
                                                                     <td>{{$question->body ?? ''}}</td>
                                                                     <td class="text-center" >
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

                                                                     <td class="text-center" >
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
                                                                     <td class="text-center" >
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
                                                                     <td class="text-center"  style='white-space: nowrap'>
                                                                         <a href="{{url("questions/$question->id/copy")}}"><i class="flaticon2-copy text-info mr-5"></i></a>
                                                                         <a href="{{url("questions/$question->id/edit")}}"><i class="far fa-edit text-warning mr-5"></i></a>
                                                                         <a href="{{url("questions/$question->id/delete")}}"><i class="fas fa-trash-alt text-danger mr-5"></i></a>
                                                                     </td>
                                                                 </tr>
                                                                 @elseif($question->type == 'title')
                                                                 <tr>
                                                                     <td>{{$question->id ?? ''}}</td>
                                                                     <td>{{$question->body ?? ''}}</td>



                                                                     <td class="text-center"  style='white-space: nowrap'>
                                                                         <a href="{{url("questions/$question->id/editTitle")}}"><i class="far fa-edit text-warning mr-5"></i></a>
                                                                         <a href="{{url("questions/$question->id/delete")}}"><i class="fas fa-trash-alt text-danger mr-5"></i></a>
                                                                     </td>
                                                                 </tr>
                                                                 @endif

                                                          @endforeach
                                                    </tbody>

                                                </table>

                                                <div class="btn-group">
                                                    <a href="{{url("questions/$quiz->id/create")}}" class="btn btn-outline-success font-weight-bolder p-2 mb-2 mr-3 d-inline-block">
                                                        <i class="la la-plus p-0"></i> Add New Quotation</a>

                                                </div>
                                                <div class="btn-group">
                                                    <a href="{{url("questions/$quiz->id/createTitle")}}" class="btn btn-outline-warning font-weight-bolder p-2 mb-2 mr-3 d-inline-block">
                                                        <i class="la la-plus p-0"></i> Add New Title</a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

{{--                                <div class="card">--}}
{{--                                        <div class="card-header" id="category-footer">--}}
{{--                                            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse-footer">--}}
{{--                                                Footer--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div id="collapse-footer" class="collapse"  data-parent="#category-footer">--}}
{{--                                            <div class="card-body">--}}
{{--                                                <div class="pl-5 pl-md-30">--}}
{{--                                                    <!--begin::Form-->--}}
{{--                                                    <form class="form" action="{{url("quizzes/$quiz->id/update")}}" method="post" enctype="multipart/form-data">--}}

{{--                                                        @csrf--}}
{{--                                                        @method('PUT')--}}
{{--                                                        <div class="">--}}
{{--                                                            @include('fragment.error')--}}
{{--                                                            <div class="form-group row align-center">--}}
{{--                                                                <label class="col-form-label text-center">Button Text :</label>--}}
{{--                                                                <div class=" mx-5 ">--}}
{{--                                                                    <input type="text" name="button_text" class="form-control" placeholder="Enter quiz title" value="{{$quiz->button_text  ?? ''}}" />--}}
{{--                                                                </div>--}}
{{--                                                                <button type="submit" class="btn btn-success w-100px">Save</button>--}}

{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </form>--}}
{{--                                                    <!--end::Form-->--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                @endif

                            </div>
                            <!--end::Accordion-->

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
