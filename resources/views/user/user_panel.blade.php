@extends('layouts.user.master')
@section('content')
    <!--begin::Profile Email Settings-->
    <div class="d-flex flex-row">
        @include('layouts.user.sidebar')

        <!--begin::Content-->
        <div class="flex-row-fluid ml-lg-8">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">Dashboard</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1"></span>
                    </div>

                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form class="form" action="{{url("/participant/updateProfile")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body row">
                        <div class="col-lg-12">
                            @include('fragment.error')
                            <h5>
                                Client Panel
                            </h5>


                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="row">

                        </div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
        </div>
        <!--end::Content-->
    </div>
    <!--end::Profile Email Settings-->



@endsection
