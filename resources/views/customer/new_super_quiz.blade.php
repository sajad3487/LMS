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
                                    @if(isset($super_quiz))
                                        <h3 class="card-label">Quiz No: {{$super_quiz->id ?? ''}}
                                            <span
                                                class="d-block text-muted pt-2 font-size-sm">Quiz title : {{$super_quiz->title ?? ''}}</span>
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
                                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home">
                                                    <span class="nav-icon"><i class="flaticon-exclamation-square "></i></span>
                                                    <span class="nav-text">Super Quiz Information</span>
                                                </a>
                                            </li>
                                            @if(isset($super_quiz))
                                                @foreach($super_quiz->quiz as $quiz)
                                                    <li class="nav-item">
                                                        <a class="nav-link" id="subQuiz-{{$quiz->id}}-tab" data-toggle="tab"
                                                           href="#subQuiz-{{$quiz->id}}" aria-controls="subQuiz-{{$quiz->id}}">
                                                            <span class="nav-icon"><i class="flaticon-interface-5"></i></span>
                                                            <span class="nav-text">{{$quiz->title ?? ''}}</span>
                                                        </a>
                                                    </li>
                                                    @endforeach
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab"
                                                       href="#newSubQuiz" aria-controls="newSubQuiz">
                                                        <span class="nav-icon"><i class="flaticon-plus"></i></span>
                                                        <span class="nav-text">New Sub Quiz</span>
                                                    </a>
                                                </li>
                                            @endif

                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="home" role="tabpanel"
                                                 aria-labelledby="home-tab">
                                                <div class="px-5 px-md-30 mt-5">

                                                    <!--begin::Form-->
                                                    <form class="form" action="
                                                        @if(isset($super_quiz))
                                                    {{url("superQuizzes/$super_quiz->id/update")}}
                                                    @else
                                                    {{url("superQuizzes/store")}}
                                                    @endif
                                                        " method="post" enctype="multipart/form-data">

                                                        @csrf
                                                        @if(isset($super_quiz))
                                                            @method('PUT')
                                                            <img class="img-fluid mb-5 mt-5" src="{{asset($super_quiz->banner)}}"
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
                                                                           value="{{$super_quiz->title  ?? ''}}"/>
                                                                    <input type="text" name="type" value="super" class="d-none">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right"
                                                                       for="exampleTextarea">Description :</label>
                                                                <div class="col-lg-8">
                                                                    {{--                                                                    <textarea class="form-control" name="description" id="exampleTextarea" rows="3">{{$super_quiz->description  ?? ''}}</textarea>--}}
                                                                    <textarea name="description" id="kt-ckeditor-1">
                                                                        {!! $super_quiz->description  ?? ''!!}
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
                                                                               for="customFile">Choose file</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-right">First
                                                                    Name Label:</label>
                                                                <div class="col-lg-3">
                                                                    <input type="text" name="first_name_label"
                                                                           class="form-control"
                                                                           placeholder="Enter your first name label"
                                                                           value="{{$super_quiz->first_name_label  ?? ''}}"/>
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio"
                                                                               name="first_name_requirement" value="1"
                                                                               @if(isset($super_quiz) && $super_quiz->first_name_requirement == 0)  @else checked="checked" @endif />
                                                                        <span></span>
                                                                        Required
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio"
                                                                               name="first_name_requirement" value="0"
                                                                               @if(isset($super_quiz) && $super_quiz->first_name_requirement == 0) checked="checked" @endif/>
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
                                                                           value="{{$super_quiz->last_name_label  ?? ''}}"/>
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="last_name_requirement"
                                                                               value="1"
                                                                               @if(isset($super_quiz) && $super_quiz->last_name_requirement == 0)  @else checked="checked" @endif />
                                                                        <span></span>
                                                                        Required
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="last_name_requirement"
                                                                               value="0"
                                                                               @if(isset($super_quiz) && $super_quiz->last_name_requirement == 0) checked="checked" @endif/>
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
                                                                           value="{{$super_quiz->email_label  ?? ''}}"/>
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="email_requirement"
                                                                               value="1"
                                                                               @if(isset($super_quiz) && $super_quiz->email_requirement == 0)  @else checked="checked" @endif />
                                                                        <span></span>
                                                                        Required
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="email_requirement"
                                                                               value="0"
                                                                               @if(isset($super_quiz) && $super_quiz->email_requirement == 0) checked="checked" @endif/>
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
                                                                           value="{{$super_quiz->first_info_label  ?? ''}}"/>
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="first_info_status"
                                                                               value="1"
                                                                               @if(isset($super_quiz) && $super_quiz->first_info_status == 1)  checked="checked" @endif />
                                                                        <span></span>
                                                                        Active
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="first_info_status"
                                                                               value="0"
                                                                               @if(isset($super_quiz) && $super_quiz->first_info_status == 1) @else checked="checked" @endif/>
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
                                                                           value="{{$super_quiz->second_info_label  ?? ''}}"/>
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="second_info_status"
                                                                               value="1"
                                                                               @if(isset($super_quiz) && $super_quiz->second_info_status == 1)  checked="checked" @endif />
                                                                        <span></span>
                                                                        Active
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="second_info_status"
                                                                               value="0"
                                                                               @if(isset($super_quiz) && $super_quiz->second_info_status == 1) @else checked="checked" @endif/>
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
                                                                           value="{{$super_quiz->date_info_label  ?? ''}}"/>
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="date_info_status"
                                                                               value="1"
                                                                               @if(isset($super_quiz) && $super_quiz->date_info_status == 1)  checked="checked" @endif />
                                                                        <span></span>
                                                                        Active
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="date_info_status"
                                                                               value="0"
                                                                               @if(isset($super_quiz) && $super_quiz->date_info_status == 1) @else checked="checked" @endif/>
                                                                        <span></span>
                                                                        Deactive
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="placeholder" value="1"
                                                                               @if(isset($super_quiz) && $super_quiz->placeholder == 0)  @else checked="checked" @endif />
                                                                        <span></span>
                                                                        Use Placeholder
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="placeholder" value="0"
                                                                               @if(isset($super_quiz) && $super_quiz->placeholder == 0) checked="checked" @endif/>
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
                                                                           id="customFile"/>
                                                                    <label class="custom-file-label"
                                                                           for="customFile">Choose file</label>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">
                                                            <button type="submit"
                                                                    class="btn btn-success mx-auto w-100px">Save
                                                            </button>
                                                        </div>
                                                        @if(isset($super_quiz))
                                                            <img class="img-fluid mt-5" src="{{asset($super_quiz->result_banner)}}"
                                                                 alt="">
                                                        @endif
                                                    </form>
                                                    <!--end::Form-->
                                                </div>
                                            </div>

                                            @if(isset($super_quiz))
                                                @foreach($super_quiz->quiz as $quiz)
                                                <div class="tab-pane fade" id="subQuiz-{{$quiz->id}}" role="tabpanel"
                                                     aria-labelledby="subQuiz-{{$quiz->id}}-tab">
                                                    <!--begin::Accordion-->
                                                    <div class="card-body">
                                                        <div class="overflow-auto">


                                                            <form class="form" action="{{url("quizzes/$quiz->id/update")}}" method="post" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="card-body py-0">
                                                                    <div class="form-group row">
                                                                        <div class="col-lg-6">
                                                                            <label>SubQuiz title:</label>
                                                                            <input type="text" class="form-control" name="title" placeholder="Enter title of sub quiz" value="{{$quiz->title ?? ''}}"/>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <label>Description:</label>
                                                                            <input type="text" class="form-control" name="description" placeholder="Enter description" value="{{$quiz->description ?? ''}}"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <button type="submit" class="btn btn-success mx-auto col-md-2">Save</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                            <hr>


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
                                                                @if($quiz->question != null)
                                                                    @foreach($quiz->question as $key=>$question)
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
                                                @endforeach
                                                <div class="tab-pane fade" id="newSubQuiz" role="tabpanel"
                                                         aria-labelledby="newSubQuiz-tab">


                                                        <div class="px-5 px-md-30 mt-5">

                                                            <!--begin::Form-->
                                                            <form class="form" action="{{url("quizzes/store")}}" method="post" enctype="multipart/form-data">

                                                                @csrf
                                                                <div class="">
                                                                    @include('fragment.error')
                                                                    <input type="number" name="parent_id" value="{{$super_quiz->id}}" class="d-none">
                                                                    <input type="text" name="type" value="subquiz" class="d-none">
                                                                    <div class="form-group row">
                                                                        <label class="col-lg-2 col-form-label text-right">Sub Quiz
                                                                            title :</label>
                                                                        <div class="col-lg-8">
                                                                            <input type="text" name="title" class="form-control"
                                                                                   placeholder="Enter sub quiz title"/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label class="col-lg-2 col-form-label text-right"
                                                                               for="exampleTextarea">Description :</label>
                                                                        <div class="col-lg-8">
                                                                            {{--                                                                    <textarea class="form-control" name="description" id="exampleTextarea" rows="3">{{$super_quiz->description  ?? ''}}</textarea>--}}
                                                                            <textarea name="description" id="kt-ckeditor-2"></textarea>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row">
                                                                    <button type="submit" class="btn btn-success mx-auto w-100px">Save</button>
                                                                </div>
                                                            </form>
                                                            <!--end::Form-->
                                                        </div>


                                                        {{--                                                <div class="row">--}}
                                                        {{--                                                    <div class="btn-group ml-auto">--}}
                                                        {{--                                                        <a href="{{url("questions/$super_quiz->id/createTitle")}}"--}}
                                                        {{--                                                           class="btn btn-outline-warning font-weight-bolder p-2 mb-2 mr-3 d-inline-block">--}}
                                                        {{--                                                            <i class="la la-plus p-0"></i> Add New Title</a>--}}
                                                        {{--                                                    </div>--}}
                                                        {{--                                                </div>--}}

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
