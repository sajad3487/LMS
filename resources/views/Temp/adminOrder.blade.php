@extends('layouts.admin.master')
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
                        <div class="row justify-content-center bgi-size-cover bgi-no-repeat py-8 px-8 py-md-27 px-md-0" style="background-image: url({{asset($order->product->picture)}});background-size: contain; background-position: center;min-height: 400px">
                            <div class="col-md-9">
                                <h1 class="display-4 text-black font-weight-boldest mb-30 mb-md-0 mt-20"></h1>

                                {{--                                <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row">--}}
{{--                                    <div class="d-flex flex-column align-items-md-end px-0">--}}
{{--                                        <!--begin::Logo-->--}}
{{--                                        <a href="#" class="mb-5">--}}
{{--                                            <img src="{{asset('media/logos/logo-light.png')}}" alt=""/>--}}
{{--                                        </a>--}}
{{--                                        <!--end::Logo-->--}}
{{--                                        <span class="text-white d-flex flex-column align-items-md-end opacity-70">--}}
{{--                        </span>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
                                <div class="border-bottom w-100 opacity-20"></div>
                                <div class="d-flex justify-content-between text-white pt-6">
                                    <div class="d-flex flex-column flex-root">

                                    </div>
                                    <div class="d-flex flex-column flex-root align-items-center">
                                        <img src="{{asset($order->label_picture) ?? ''}}" alt="" style="width: 100px; height: 100px"/>

                                    </div>
                                    <div class="d-flex flex-column flex-root">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice header-->

                        <!-- begin: Invoice body-->
                        <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                            <div class="col-md-11">
                                <div class="table-responsive">
                                    <table class="table ">
                                        <thead>
                                        <tr class="text-center">
                                            <th class="pl-0 font-weight-bold text-muted  text-uppercase">Product Title</th>
                                            <th class="font-weight-bold text-muted text-uppercase">Address</th>
                                            <th class="font-weight-bold text-muted text-uppercase">Quantity</th>
                                            <th class="pr-0 font-weight-bold text-muted text-uppercase">Amount</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr class="font-weight-boldest font-size-lg text-center">
                                            <td class="pl-0 pt-3">
                                                <h5>{{$order->product->title ?? ''}}</h5>
                                                <p class="mt-4 mb-0 font-weight-lighter">{{$order->product->description ?? ''}}</p>
                                                <p class="m-0 font-weight-lighter">{{$order->product->material ?? ''}}</p>
                                                <p class="m-0 font-weight-lighter">{{$order->product->dimension ?? ''}}</p>
                                            </td>
                                            <td class=" pt-3">
                                                <div class="font-weight-bolder font-size-lg mb-3">{{$order->address->name ?? ''}}</div>
                                                <span class="text-right">{{$order->address->address ?? ''}}</span>
                                                <br>
                                                <span class="text-right">{{$order->address->tel ?? ''}}</span>
                                                <br>
                                                <span class="text-right">{{$order->address->zip_code ?? ''}}</span>
                                                <br>
                                                <span class="text-right"></span>
                                            </td>
                                            <td class=" pt-3">{{$order->quantity ?? ''}}</td>
                                            <td class="text-danger pr-0 pt-3">${{$order->total_price ?? ''}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end: Invoice body-->

                        <!-- begin: Invoice action-->
                        <div class="row py-8 px-8 py-md-10 px-md-25">
                                <a href="{{url("/admin/invoices/$order->invoice_id/show")}}" class="btn btn-light-warning col-3 font-weight-bold">Back</a>
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
