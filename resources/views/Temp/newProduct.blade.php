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

                                <div class="card-body row">
                                    <div class=" {{isset($product) ? "col-lg-8" : 'col-lg-12'}}">
                                        @include('fragment.error')
                                        <form class="form" action="
                                            @if(isset($product))
                                            {{url("/admin/products/$product->id/update")}}
                                            @else
                                            {{url('/admin/products/store')}}
                                            @endif
                                                " method="post" enctype="multipart/form-data">
                                                @csrf
                                                @if(isset($product))
                                                    @method('put')
                                                @endif
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-right">Title :</label>
                                            <div class="col-lg-3">
                                                <input type="text" name="title" class="form-control" placeholder="Enter product title" value="{{old('title') ?? $product->title  ?? ''}}" required/>
                                            </div>
                                            <label class="col-lg-2 col-form-label text-right">Picture :</label>
                                            <div class="col-lg-3">
                                                <div class="input-group">
                                                    <input type="file" name="file" class="custom-file-input" id="customFile"/>
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-right">Description :</label>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" name="description" class="form-control" placeholder="Enter product description" value="{{old('description') ?? $product->description  ?? ''}}" />
                                                    <div class="input-group-append"><span class="input-group-text"><i class="fas fa-audio-description"></i></span></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-right">Tags :</label>
                                            <div class="col-lg-8">
                                                <div class="input-group">
                                                    <input type="text" name="tag" class="form-control" value="{{old('tag') ?? $product->tag  ?? ''}}" placeholder="Separate tags with space" />
                                                    <div class="input-group-append"><span class="input-group-text"><i class="la la-bookmark-o"></i></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-2 col-form-label text-right">Status :</label>
                                            <div class="col-lg-3">
                                                <div class="input-group">
                                                    <select name="status" required class="form-control">
                                                        <option value="">Select</option>
                                                        <option value="1" selected>Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <label class="col-lg-2 col-form-label text-right">Category :</label>
                                            <div class="col-lg-3">
                                                <div class="input-group">
                                                    <select name="category_id" class="form-control">
                                                        <option value="">Select</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{$category->id}}" @if(isset($category_id) && $category_id == $category->id) selected @endif>{{$category->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        @if(!isset($product))
                                            <div class="form-group row">
                                                <label class="col-lg-2 col-form-label text-right">Price :</label>
                                                <div class="col-lg-3">
                                                    <input type="number" name="price" class="form-control" placeholder="Enter product title" required/>
                                                </div>
                                            </div>
                                            @else
                                                <input type="number" class="d-none" name="price" value="1">
                                        @endif
                                        <div class="row">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-9 ">
                                                <a href="{{url('/admin/products')}}" type="reset" class="btn btn-secondary  col-md-3">Back</a>
                                                <button type="submit" class="btn btn-success  col-md-3">Save</button>
                                            </div>
                                        </div>
                                        </form>


                                        @if(isset($product))
                                            <hr>
                                            <h4 class="mb-2">Specifications:</h4>
                                            @foreach($product->specification as $key=>$spec)
                                                <form action="{{url("/admin/specification/$spec->id/update")}}" method="post" id="spec-{{$key}}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row mt-2">
                                                        <label class="col-lg-3 col-form-label text-right">Specification {{$key +1}} :</label>
                                                        <div class="col-lg-3">
                                                            <input type="text" form="spec-{{$key}}" name="title" class="form-control" placeholder="Enter title of specification " value="{{ $spec->title  ?? ''}}" required/>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="text" form="spec-{{$key}}" name="specification" class="form-control" placeholder="Enter body of specification " value="{{ $spec->specification  ?? ''}}" required/>
                                                        </div>
                                                        <input type="number" name="product_id" value="{{$product->id}}" class="d-none">
                                                        <button type="submit" class="btn btn-warning" form="spec-{{$key}}"> Save </button>
                                                        <a href="{{url("/admin/specification/$spec->id/delete")}}" class="btn btn-outline-danger ml-2"><i class="fas fa-trash-alt text-danger"></i></a>
                                                    </div>
                                                </form>

                                            @endforeach
                                            <form action="{{url('/admin/specification/store')}}" method="post">
                                                @csrf
                                                <div class="row mt-8">
                                                    <label class="col-lg-3 col-form-label text-right">Add New Specification:</label>
                                                    <div class="col-lg-3">
                                                        <input type="text" name="title" class="form-control" placeholder="Enter title of specification"  required/>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="text" name="specification" class="form-control" placeholder="Enter body of specification"  required/>
                                                    </div>
                                                    <input type="number" name="product_id" value="{{$product->id}}" class="d-none">
                                                    <button type="submit" class="btn btn-success ">Save</button>
                                                </div>
                                            </form>
                                            <hr>
                                            <h4 class="mb-2">Quantity & price:</h4>
                                            @foreach($product->quantity as $key=>$quantity)
                                                <form action="{{url("/admin/quantity/$quantity->id/update")}}" method="post" id="qty-{{$key}}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="row mt-2">
                                                        <label class="col-lg-3 col-form-label text-right">Qty & Price {{$key +1}} :</label>
                                                        <div class="col-lg-3">
                                                            <input type="number" form="qty-{{$key}}" name="quantity" class="form-control" placeholder="Enter quantity " value="{{ $quantity->quantity  ?? ''}}" required/>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input type="number" form="qty-{{$key}}" name="price" class="form-control" placeholder="Enter price " value="{{ $quantity->price  ?? ''}}" required/>
                                                        </div>
                                                        <input type="number" name="product_id" value="{{$product->id}}" class="d-none">
                                                        <button type="submit" class="btn btn-warning" form="qty-{{$key}}"> Save </button>
                                                        @if($quantity->quantity != 1)
                                                        <a href="{{url("/admin/quantity/$quantity->id/delete")}}" class="btn btn-outline-danger ml-2"><i class="fas fa-trash-alt text-danger"></i></a>
                                                            @endif
                                                    </div>
                                                </form>

                                            @endforeach
                                            <form action="{{url('/admin/quantity/store')}}" method="post">
                                                @csrf
                                                <div class="row mt-8">
                                                    <label class="col-lg-3 col-form-label text-right">Add New Qty & Price:</label>
                                                    <div class="col-lg-3">
                                                        <input type="number" name="quantity" class="form-control" placeholder="Enter quantity"  required/>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <input type="number" name="price" class="form-control" placeholder="Enter price"  required/>
                                                    </div>
                                                    <input type="number" name="product_id" value="{{$product->id}}" class="d-none">
                                                    <button type="submit" class="btn btn-success ">Save</button>
                                                </div>
                                            </form>
                                        @endif


                                    </div>
                                    @if(isset($product->picture))
                                    <div class="col-lg-4">
                                        <img src="{{url($product->picture)}}" alt="" style="width: 100%">
                                    </div>
                                        @endif
                                </div>
                                <div class="card-footer">

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
