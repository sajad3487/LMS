@extends('layouts.admin.master')

@section('content')


    <!--begin::Content-->
    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">


        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class=" container ">

                <!--begin::Card-->
                <div class="card card-custom">
                    <div class="card-header flex-wrap py-5">
                        <div class="card-title">
                            <h3 class="card-label">
                                @if(isset($status))
                                    @if($status == 0)
                                        Orders
                                    <span class="d-block text-muted pt-2 font-size-sm">All Order</span>
                                    @elseif($status == 2)
                                        Placed Orders
                                    @elseif($status == 3)
                                        Accepted Orders
                                    @elseif($status == 4)
                                        Shipped Orders
                                    @elseif($status == 5)
                                        Delivered Orders
                                    @elseif($status == 6)
                                        <p class="text-danger"> Canceled Orders</p>
                                        @endif

                                @endif
                                    @if(isset($customer))
                                        {{$customer->name}}
                                        @endif
                            </h3>
                        </div>
                        <div class="card-toolbar">


                            <!--begin::Button-->

                            <!--end::Button-->
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="overflow-auto">
                            <!--begin: Datatable-->
                            <table class="table table-separate table-head-custom table-checkable" id="kt_datatable">
                                <thead>
                                <tr class="text-center">
                                    <th>Order ID</th>
                                    <th>Customer Name</th>
                                    <th>Date</th>
                                    <th>Total price</th>
                                    @if(isset($status) && $status == 0)
                                    <th>Status</th>
                                    @endif
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($invoices as $invoice)
                                <tr class="text-center">
                                    <td>{{$invoice->id ?? ''}}</td>
                                    <td>{{$invoice->user->name ?? ''}}</td>
                                    <td>{{$invoice->created_at ?? ''}}</td>
                                    <td>{{$invoice->total_price ?? ''}}</td>

                                    @if(isset($status) && $status == 0)
                                        <td>
                                        @if($invoice->status == 2)
                                            <span class="label label-lg font-weight-bold label-light-primary label-inline">
                                                Placed
                                            </span>
                                        @elseif($invoice->status == 3)
                                            <span class="label label-lg font-weight-bold label-light-success label-inline">
                                                Accepted
                                            </span>
                                        @elseif($invoice->status == 4)
                                            <span class="label label-lg font-weight-bold label-light-warning label-inline">
                                                Shipped
                                            </span>
                                        @elseif($invoice->status == 5)
                                            <span class="label label-lg font-weight-bold label-light-success label-inline">
                                                Delivered
                                            </span>
                                        @elseif($invoice->status == 6)
                                            <span class="label label-lg font-weight-bold label-light-danger label-inline">
                                                Canceled
                                            </span>
                                        @endif
                                        </td>
                                    @endif
                                    <td>
                                        <a href="{{url("admin/invoices/$invoice->id/show")}}"><i class="far fa-edit text-warning mr-5"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>

                            </table>
                            <!--end: Datatable-->
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Entry-->
    </div>
    <!--end::Content-->


@endsection



