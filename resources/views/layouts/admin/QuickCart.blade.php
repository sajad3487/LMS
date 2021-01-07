
<!--begin::Quick Cart-->
<div id="kt_quick_cart" class="offcanvas offcanvas-right p-10">
    <!--begin::Header-->
    <div class="offcanvas-header d-flex align-items-center justify-content-between pb-7">
        <h4 class="font-weight-bold m-0">
            Shopping Cart
        </h4>
        <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_cart_close">
            <i class="ki ki-close icon-xs text-muted"></i>
        </a>
    </div>
    <!--end::Header-->
    <!--begin::Content-->
    <div class="offcanvas-content">
        @foreach($carts ?? '' as $cart)
        <!--begin::Wrapper-->
        <div class="offcanvas-wrapper mb-5 scroll-pull">
            <!--begin::Item-->
            <div class="d-flex align-items-center justify-content-between py-8">
                <div class="d-flex flex-column mr-2">
                    <a href="{{url("orders/$cart->id/show")}}" class="font-weight-bold text-dark-75 font-size-lg text-hover-primary">
                        {{$cart->product->title}}
                    </a>
                    <span class="text-muted">
                        To : {{$cart->address->name}}
                    </span>
                    <div class="d-flex align-items-center mt-2">
                        <span class="font-weight-bold mr-1 text-dark-75 font-size-lg">$ {{$cart->total_price}} </span>
                        <span class="text-muted ml-2"> for </span>
                        <span class="font-weight-bold mr-2 text-dark-75 font-size-lg ml-2">{{$cart->quantity}}</span>
                        <span class="text-muted ml-2"> pieces </span>
                        <a href="{{"/orders/deleteOrder/$cart->id"}}" class="btn btn-xs btn-light-danger btn-icon ml-4"><i class="flaticon-delete"></i></a>
                    </div>
                </div>
                <a href="{{url("orders/$cart->id/show")}}" class="symbol symbol-70 flex-shrink-0">
                    <img src="{{asset($cart->product->picture)}}" title="" alt=""/>
                </a>
            </div>
            <!--end::Item-->

            <!--begin::Separator-->
            <div class="separator separator-solid"></div>
            <!--end::Separator-->
            @endforeach
        </div>
        <!--end::Wrapper-->

        <!--begin::Purchase-->
        <div class="offcanvas-footer">
{{--            <div class="d-flex align-items-center justify-content-between mb-4">--}}
{{--                <span class="font-weight-bold text-muted font-size-sm mr-2">Total</span>--}}
{{--                <span class="font-weight-bolder text-dark-50 text-right">$1840.00</span>--}}
{{--            </div>--}}
            <div class="d-flex align-items-center justify-content-between mb-7">
                <span class="font-weight-bold text-muted font-size-sm mr-2">Total</span>
                <span class="font-weight-bolder text-primary text-right">$  {{$total_cart}}</span>
            </div>
            <div class="text-right">
                <a href="{{url('invoices/cart')}}" class="btn btn-primary text-weight-bold">Place Order</a>
            </div>
        </div>
        <!--end::Purchase-->
    </div>
    <!--end::Content-->
</div>
<!--end::Quick Cart-->
