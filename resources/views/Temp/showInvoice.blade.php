@extends('layouts.customer.master')
@section('content')
    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">


        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">
                <!-- begin::Card-->
                <div class="card card-custom overflow-hidden">
                    <div class="card-body p-0">
                        <!-- begin: Invoice-->
                        <!-- begin: Invoice header-->
                        <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-10 px-8 px-md-0" style="">
                            <div class="col-md-10">
                                <h1 class="display-4 text-black font-weight-boldest mb-30 mb-md-0">Invoice No : # {{$invoice->id}}</h1>
                                <div class="border-bottom w-100 opacity-20"></div>

                            </div>
                        </div>
                        <!-- end: Invoice header-->

                        <!-- begin: Invoice body-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-10">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr class="text-center">
                                            <th class="pl-0 font-weight-bold text-muted  text-uppercase">Product Title</th>
                                            <th class="font-weight-bold text-muted text-uppercase">Label</th>
                                            <th class="font-weight-bold text-muted text-uppercase">Address</th>
                                            <th class="font-weight-bold text-muted text-uppercase">Quantity</th>
                                            <th class="pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($invoice->order as $order)
                                            <tr class="font-weight-boldest font-size-lg text-center">
                                                <td class="pl-0 pt-4">
                                                    <a href="{{url("orders/$order->id/show")}}"><h5>{{$order->product->title ?? ''}}</h5></a>
                                                    <p class="mt-4 mb-0 font-weight-lighter">{{$order->product->description ?? ''}}</p>
                                                    <p class="m-0 font-weight-lighter">{{$order->product->material ?? ''}}</p>
                                                    <p class="m-0 font-weight-lighter">{{$order->product->dimension ?? ''}}</p>
                                                </td>
                                                <td class=" pt-4">
                                                    <div class="image-input image-input-outline"  id="kt_image_1">
                                                        <a href="{{asset($order->label_picture)}}" target="_blank"><div class="image-input-wrapper" style="background-image: url({{asset($order->label_picture)}}); width: 50px;height: 50px"></div></a>
                                                        <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                            <i class="ki ki-bold-close icon-xs text-muted"></i>
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="pt-4">
                                                    <div class="font-weight-bolder font-size-lg mb-3">{{$order->address->name ?? ''}}</div>
                                                    <span class="">{{$order->address->address ?? ''}}</span>
                                                    <br>
                                                    <span class="">{{$order->address->tel ?? ''}}</span>
                                                    <br>
                                                    <span class="">{{$order->address->zip_code ?? ''}}</span>
                                                    <br>
                                                    <span class=""></span>
                                                </td>
                                                <td class=" pt-4">{{$order->quantity ?? ''}}</td>
                                                <td class="text-danger pr-0 pt-4 ">${{$order->total_price ?? ''}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice body-->

                        <!-- begin: Invoice footer-->
                        <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="d-flex justify-content-between flex-column flex-md-row font-size-lg">
                                    <div class="d-flex flex-column mb-10 mb-md-0">

                                    </div>
                                    <div class="d-flex flex-column text-md-right">
                                        <span class="font-size-lg font-weight-bolder mb-1">TOTAL AMOUNT</span>
                                        <span class="font-size-h2 font-weight-boldest text-danger mb-1">$ {{$invoice->total_price}}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- end: Invoice footer-->

                        <!-- begin: Invoice action-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-9">
                                <div class="row mb-4 justify-content-between">
                                    @if($invoice->status == 1)
                                        <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>
                                        <a href="{{url('/invoices/pay')}}" class="btn btn-light-success font-weight-bold col-lg-2">Pay</a>
                                    @elseif($invoice->status == 2)
                                        <p> Status : <h1 class="text-primary">Order Placed</h1></p>
                                    @elseif($invoice->status == 3)
                                        <p> Status : <h1 class="text-warning">Order Accepted</h1></p>
                                    @elseif($invoice->status == 4)
                                        <p> Status : <h1 class="text-info">Order Shipped</h1></p>
                                    @elseif($invoice->status == 5)
                                        <p> Status : <h1 class="text-success">Order Delivered</h1></p>
                                    @elseif($invoice->status == 6)
                                        <p> Status : <h1 class="text-danger">Order Canceled</h1></p>
                                    @endif

                                </div>



                            </div>
                        </div>
                        <!-- end: Invoice action-->

                        <!-- end: Invoice-->
                    </div>
                </div>
                <!-- end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->

    @endsection
