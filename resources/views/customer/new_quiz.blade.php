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
                                    <h3 class="card-label">Quiz No: {{$quiz->id}}</h3>
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
                                                    <form class="form" action="{{url("quizzes/store")}}" method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="">
                                                            @include('fragment.error')
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-center">Quiz title :</label>
                                                                <div class="col-lg-8">
                                                                    <input type="text" name="title" class="form-control" placeholder="Enter quiz title" value="{{$quiz->title  ?? ''}}" />
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-lg-2 col-form-label text-center">First Name Label:</label>
                                                                <div class="col-lg-3">
                                                                    <input type="text" name="first_name_label" class="form-control" placeholder="Enter your first name label" value="{{$quiz->first_name_label  ?? ''}}" />
                                                                </div>
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="first_name_requirement" value="1" checked="checked" />
                                                                        <span></span>
                                                                        Required
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="first_name_requirement" value="0"/>
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
                                                                        <input type="radio" name="last_name_requirement" value="1" checked="checked" />
                                                                        <span></span>
                                                                        Required
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="last_name_requirement" value="0"/>
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
                                                                        <input type="radio" name="email_requirement" value="1" checked="checked" />
                                                                        <span></span>
                                                                        Required
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="email_requirement" value="0"/>
                                                                        <span></span>
                                                                        Optional
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <div class="radio-inline ml-md-10 pl-5 mt-3 mt-md-0">
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="use_placeholder" value="1" checked="checked" />
                                                                        <span></span>
                                                                        Use Placeholder
                                                                    </label>
                                                                    <label class="radio radio-rounded radio-success">
                                                                        <input type="radio" name="use_placeholder" value="0"/>
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
                                    <div id="collapse-questions" class="collapse"  data-parent="#category-questions">
                                        <div class="card-body">
                                            <div class="overflow-auto">

                                                <div class="btn-group">
                                                     <a href="{{url("questions/$quiz->id/create")}}" class="btn btn-outline-success font-weight-bolder p-2 mb-2 mr-3 d-inline-block">
                                                            <i class="la la-plus p-0"></i> Add New Quotation</a>

                                                </div>
                                                <table class="table table-bordered table-checkable" id="kt_datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>Question</th>
                                                            <th>Additional Info</th>
                                                            <th>Status</th>
                                                            <th>Requirement</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                         @foreach($quiz->question as $question)
                                                             <tr>
                                                                 <td>{{$question->id ?? ''}}</td>
                                                                 <td>{{$question->body ?? ''}}</td>
                                                                 <td>{{$question->additional_info ?? ''}}</td>
                                                                 <td>{{$question->status ?? ''}}</td>
                                                                 <td>{{$question->requirement ?? ''}}</td>
                                                                 <td style='white-space: nowrap'>
                                                                     <a href="{{url("questions/$question->id/edit")}}"><i class="far fa-edit text-warning mr-5"></i></a>
                                                                     <a href="{{url("questions/$question->id/delete")}}"><i class="fas fa-trash-alt text-danger mr-5"></i></a>
                                                                 </td>
                                                              </tr>
                                                          @endforeach
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                <div class="card">
                                    <div class="card-header" id="category-footer">
                                        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse-footer">
                                            Footer
                                        </div>
                                    </div>
                                    <div id="collapse-footer" class="collapse"  data-parent="#category-footer">
                                        <div class="card-body">
                                            <div class="overflow-auto">

                                                <div class="btn-group">

                                                    <form  method="post">
                                                        <a href="{{url("/admin/products/createWithCat/'test'")}}" class="btn btn-outline-success font-weight-bolder p-1 mb-2 mr-3 d-inline-block">
                                                            <i class="la la-plus p-0"></i></a>
                                                        <a href="{{url("/admin/categories/'test'/edit")}}" class="btn btn-outline-warning font-weight-bolder p-1 mb-2 mr-3 d-inline-block">
                                                            <i class="la la-edit p-0"></i></a>
                                                        <a href="{{url("/admin/categories/'test'/delete")}}" class="btn btn-outline-danger font-weight-bolder p-1 mb-2 mr-3 d-inline-block">
                                                            <i class="la la-trash p-0"></i></a>
                                                    </form>
                                                </div>
                                                <table class="table table-bordered table-checkable" id="kt_datatable">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Material</th>
                                                        <th>Dimension</th>
                                                        <th>Image</th>
                                                        <th>Price</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    {{--                                                    @foreach($category->product as $product)--}}
                                                    {{--                                                        <tr>--}}
                                                    {{--                                                            <td>{{$product->id}}</td>--}}
                                                    {{--                                                            <td>{{$product->title}}</td>--}}
                                                    {{--                                                            <td>{{$product->description}}</td>--}}
                                                    {{--                                                            <td>{{$product->material}}</td>--}}
                                                    {{--                                                            <td>{{$product->dimension}}</td>--}}
                                                    {{--                                                            <td>{{$product->image}}</td>--}}
                                                    {{--                                                            <td>{{$product->price}}</td>--}}
                                                    {{--                                                            <td style='white-space: nowrap'>--}}
                                                    {{--                                                                <a href="{{url("/admin/products/$product->id/edit")}}"><i class="far fa-edit text-warning mr-5"></i></a>--}}
                                                    {{--                                                                <a href="{{url("/admin/products/$product->id/delete")}}"><i class="fas fa-trash-alt text-danger mr-5"></i></a>--}}
                                                    {{--                                                            </td>--}}
                                                    {{--                                                         </tr>--}}
                                                    {{--                                                     @endforeach--}}
                                                    </tbody>

                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
