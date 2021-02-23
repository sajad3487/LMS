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
                                    <h3 class="card-label">Super Quiz No: {{$quiz->id ?? ''}}
                                        <span class="d-block text-muted pt-2 font-size-sm">Quiz title : {{$quiz->title ?? ''}}</span>
                                    </h3>
                                @else
                                    <h3 class="card-label">New Super Quiz </h3>
                                @endif
                            </div>
{{--                            <div class="card-toolbar">--}}
{{--                                <!--begin::Button-->--}}
{{--                                    <a href="{{url('/superQuizzes/create')}}" class="btn btn-warning font-weight-bolder">--}}
{{--                                    <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg--}}
{{--                                            xmlns="http://www.w3.org/2000/svg"--}}
{{--                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                            viewBox="0 0 24 24" version="1.1">--}}
{{--                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                        <rect x="0" y="0" width="24" height="24"/>--}}
{{--                                        <circle fill="#000000" cx="9" cy="15" r="6"/>--}}
{{--                                        <path--}}
{{--                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"--}}
{{--                                            fill="#000000" opacity="0.3"/>--}}
{{--                                    </g>--}}
{{--                                </svg><!--end::Svg Icon--></span>--}}
{{--                                        New Section--}}
{{--                                    </a>--}}

{{--                            <!--end::Button-->--}}
{{--                            </div>--}}
                        </div>
                        <div class="card-body">
                            <div class="pl-5 pl-md-30 mb-5">
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
                                                <input type="text" name="type" class="d-none" value="super" />
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
                            <!--begin::Accordion-->
                            <div class="accordion accordion-solid accordion-toggle-plus" id="accordion3">

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

                                <div class="card">
                                        <div class="card-header" id="category-footer">
                                            <div class="card-title collapsed bg-success-o-50" data-toggle="collapse" data-target="#collapse-footer">
                                                New Section
                                            </div>
                                        </div>
                                        <div id="collapse-footer" class="collapse"  data-parent="#category-footer">
                                            <div class="card-body">
                                                <div class="pl-5 pl-md-30">
                                                    <!--begin::Form-->
                                                    <form class="form" action="{{url("quizzes/$quiz->id/update")}}" method="post" enctype="multipart/form-data">

                                                        @csrf
                                                        @method('PUT')
                                                        <div class="">
                                                            @include('fragment.error')
                                                            <div class="form-group row align-center">
                                                                <label class="col-form-label text-center">Section Title :</label>
                                                                <div class=" mx-5 ">
                                                                    <input type="text" name="title" class="form-control" placeholder="Enter section title" />
                                                                </div>
                                                                <button type="submit" class="btn btn-success w-100px">Save</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
