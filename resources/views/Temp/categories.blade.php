@extends('layouts.admin.master')

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
                                <h3 class="card-label">Category </h3>
                            </div>
                            <div class="card-toolbar">

                                <a href="{{url('/admin/categories/create')}}" class="btn btn-primary font-weight-bolder">
                                    <i class="la la-plus p-0"></i>
                                    New Category
                                </a>

                            </div>

                        </div>
                        <div class="card-body">
                            <!--begin::Accordion-->
                            <div class="accordion accordion-solid accordion-toggle-plus" id="accordion3">
                                @foreach($categories as $category)
                                    <div class="card">
                                        <div class="card-header" id="category-{{$category->id}}">
                                            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse-{{$category->id}}">
                                                {{$category->title}}
                                            </div>
                                        </div>
                                        <div id="collapse-{{$category->id}}" class="collapse"  data-parent="#category-{{$category->id}}">
                                            <div class="card-body">
                                                <div class="overflow-auto">

                                                <div class="btn-group">

                                                    <form  method="post">
                                                        <a href="{{url("/admin/products/createWithCat/$category->id")}}" class="btn btn-outline-success font-weight-bolder p-1 mb-2 mr-3 d-inline-block">
                                                            <i class="la la-plus p-0"></i></a>
                                                        <a href="{{url("/admin/categories/$category->id/edit")}}" class="btn btn-outline-warning font-weight-bolder p-1 mb-2 mr-3 d-inline-block">
                                                            <i class="la la-edit p-0"></i></a>
                                                        <a href="{{url("/admin/categories/$category->id/delete")}}" class="btn btn-outline-danger font-weight-bolder p-1 mb-2 mr-3 d-inline-block">
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
                                                    @foreach($category->product as $product)
                                                        <tr>
                                                            <td>{{$product->id}}</td>
                                                            <td>{{$product->title}}</td>
                                                            <td>{{$product->description}}</td>
                                                            <td>{{$product->material}}</td>
                                                            <td>{{$product->dimension}}</td>
                                                            <td>{{$product->image}}</td>
                                                            <td>{{$product->price}}</td>
                                                            <td style='white-space: nowrap'>
                                                                <a href="{{url("/admin/products/$product->id/edit")}}"><i class="far fa-edit text-warning mr-5"></i></a>
                                                                <a href="{{url("/admin/products/$product->id/delete")}}"><i class="fas fa-trash-alt text-danger mr-5"></i></a>
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
