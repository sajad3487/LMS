@extends('layouts.customer.master')
@section('content')
    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">

        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <div class="row">
                    <div class="col-lg-12">
                        <!--begin::Card-->
                        <div class="card card-custom">
                            <div class="card-header">
                                <h3 class="card-title">
                                    @if(isset($question)) Question No : {{$question->position }} @else New Question @endif
                                </h3>
                            </div>
                            <!--begin::Form-->

                                <div class="card-body px-md-10">
                                    <form class="form" action="{{url("/questions/store")}}" method="post" enctype="multipart/form-data">
                                        @csrf
                                    <div class="">
                                        @include('fragment.error')
                                        <div class="form-group row">
                                            <label class="col-lg-3 col-form-label text-center">Question body :</label>
                                            <div class="col-lg-9">
                                                <input type="text" name="body" class="form-control" placeholder="Enter your question" value="{{$question->body  ?? ''}}" />
                                            </div>
                                            <input type="number" name="form_id" value="{{$quiz->id}}" class="d-none">
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-3 col-form-label text-center">Other Options :</label>
                                            <div class="col-md-9 col-form-label">
                                                <div class="checkbox-inline">
                                                    <label class="checkbox checkbox-success" >
                                                        <input type="checkbox" name="requirement" value="1" @if(isset($question) && $question->requirement == 1) checked="checked" @endif />
                                                        <span></span>
                                                        Required
                                                    </label>
                                                    <label class="checkbox checkbox-success">
                                                        <input type="checkbox" name="additional_info" value="1"  @if(isset($question) && $question->requirement == 1) checked="checked" @endif />
                                                        <span></span>
                                                        Additional information
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success col-md-2">Save</button>
                                        </div>
                                    </div>
                                    </form>
                                    <hr>
                                    <div class="">

                                        <div class="row">
                                            <h6 class="ml-7 mt-3">Choices : </h6>
                                            <a href="" class="btn btn-light-primary font-weight-bold mb-3 mr-3 ml-auto" data-toggle="modal" data-target="#option_form">Add New Choice</a>
                                        </div>
                                        <!--begin::Modal-->
                                        <div class="modal fade" id="option_form" role="dialog"  aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Add New Choice</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                        </button>
                                                    </div>
                                                    <form class="form" action="{{url("options/store")}}" method="post">
                                                        <div class="modal-body">

                                                                <!--begin::Form-->
                                                                    @csrf
                                                                    <div class="card-body">
                                                                        <div class="form-group">
                                                                            <label>Answer:</label>
                                                                            <input type="text" name="body" class="form-control form-control-solid" placeholder="Enter the answer"/>
                                                                        </div>
                                                                        <div class="form-group row">
                                                                            <div class="col-md-6">
                                                                                <label>Score :</label>
                                                                                <input type="number" name="score" class="form-control form-control-solid" placeholder="Enter score of answer"/>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label>Status :</label>
                                                                                <select name="status" class="form-control form-control-solid">
                                                                                    <option value="1">on</option>
                                                                                    <option value="0">off</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <input type="number" name="question_id" value="{{$question->id ?? ''}}" class="d-none">
                                                                        <input type="number" name="form_id" value="{{$question->form_id ?? ''}}" class="d-none">
                                                                    </div>
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
                                        <table class="table table-bordered table-checkable" id="kt_datatable">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Answer</th>
                                                <th>Status</th>
                                                <th>Score</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>

                                            <tbody>
                                            @if(isset($question))
                                                @foreach($question->option as $key=>$option)
                                                    <tr>
                                                        <td>{{$option->id ?? ''}}</td>
                                                        <td>{{$option->body ?? ''}}</td>
                                                        <td>{{$option->status ?? ''}}</td>
                                                        <td>{{$option->score ?? ''}}</td>
                                                        <td style='white-space: nowrap'>
                                                            <a href="" data-toggle="modal" data-target="#option_form_{{$key}}"><i class="far fa-edit text-warning mr-5"></i></a>
                                                            <a href="{{url("/questions/options/$option->id/delete")}}"><i class="fas fa-trash-alt text-danger mr-5"></i></a>
{{--                                                            <a href="" class="btn btn-light-primary font-weight-bold mb-3 mr-3 ml-auto" data-toggle="modal" data-target="#option_form_{{$key}}">A</a>--}}

                                                        </td>
                                                    </tr>
                                                    <!--begin::Modal-->
                                                    <div class="modal fade" id="option_form_{{$key}}" role="dialog"  aria-hidden="true">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Choice</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <i aria-hidden="true" class="ki ki-close"></i>
                                                                    </button>
                                                                </div>
                                                                <form class="form" action="{{url("options/$option->id/update")}}" method="post">
                                                                    <div class="modal-body">

                                                                        <!--begin::Form-->
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="card-body">
                                                                            <div class="form-group">
                                                                                <label>Answer:</label>
                                                                                <input type="text" name="body" value="{{$option->body ?? ''}}" class="form-control form-control-solid" placeholder="Enter the answer"/>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <div class="col-md-6">
                                                                                    <label>Score :</label>
                                                                                    <input type="number" name="score" value="{{$option->score ?? ''}}" class="form-control form-control-solid" placeholder="Enter score of answer"/>
                                                                                </div>
                                                                                <div class="col-md-6">
                                                                                    <label>Status :</label>
                                                                                    <select name="status" class="form-control form-control-solid">
                                                                                        <option @if($option->status == 1) selected @endif value="1">on</option>
                                                                                        <option @if($option->status == 0) selected @endif value="0">off</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <input type="number" name="question_id" value="{{$question->id ?? ''}}" class="d-none">
                                                                            <input type="number" name="form_id" value="{{$question->form_id ?? ''}}" class="d-none">
                                                                        </div>
                                                                        <div class="card-footer text-center">
                                                                            <button type="submit" class="btn btn-primary mr-2 w-100px">Save</button>
                                                                            {{--                                                                        <button type="reset" class="btn btn-secondary">Cancel</button>--}}
                                                                        </div>
                                                                        <!--end::Form-->

                                                                    </div>

                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end::Modal-->
                                                @endforeach
                                            @endif
                                            </tbody>

                                        </table>
                                        <div class="text-center">
                                            <a href="{{url("quizzes/$quiz->id/edit")}}" class="btn btn-warning col-md-2">Back</a>
                                        </div>
                                    </div>
                                </div>

                            <!--end::Form-->
                        </div>
                        <!--end::Card-->

                    </div>
                </div>
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

    @endsection
