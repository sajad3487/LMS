@extends('layouts.admin.master')
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
                                    New Product
                                </h3>
                            </div>
                            <!--begin::Form-->
                            <form class="form" action="
                                @if(isset($category))
                                    {{url("/admin/categories/$category->id/update")}}
                                    @else
                                    {{url('/admin/categories/store')}}
                                @endif
                                " method="post" enctype="multipart/form-data">
                                @csrf
                                @if(isset($category))
                                    @method('put')
                                @endif
                                <div class="card-body row">
                                    <div class=" {{isset($category) ? "col-lg-8" : 'col-lg-12'}}">
                                        @include('fragment.error')

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-right">Category Title :</label>
                                            <div class="col-lg-3">
                                                <input type="text" name="title" class="form-control" placeholder="Enter category title" value="{{old('title') ?? $category->title  ?? ''}}" required/>
                                            </div>
                                            <label class="col-lg-2 col-form-label text-right">Description :</label>
                                            <div class="col-lg-3">
                                                <input type="text" name="description" class="form-control" placeholder="Enter category description" value="{{old('description') ?? $category->description  ?? ''}}"/>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-lg-5"></div>
                                        <div class="col-lg-7">
                                            <a href="{{url('/admin/categories')}}" type="reset" class="btn btn-secondary mr-2">Cancel</a>
                                            <button type="submit" class="btn btn-success ">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
