@extends('layouts.client.master')
@section('content')
    <!--begin::Profile Email Settings-->
    <div class="d-flex flex-row">
    @include('layouts.client.sidebar')

    <!--begin::Content-->
        <div class="flex-row-fluid ml-lg-8">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">Jac Evaluation</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Please answer the questions</span>
                    </div>

                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form class="form" action="{{url("/admin/users/updateProfile")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body row">
                        <div class="col-lg-12">
                            @include('fragment.error')

                            <div class="form-group px-10 m-0 mb-2">
                                <label class="row col-form-label h6">1) Please briefly describe your role/realm of responsibilities?
                                </label>
                                <p class="row text-muted m-0 ">{{$question->description ?? ''}}</p>
                                <input type="text" name="answer" style="width: 100%" class="form-control mt-2"  placeholder="Answer"/>
                            </div>
                            <div class="form-group px-10 m-0 mb-2">
                                <label class="row col-form-label h6">2) How would you describe the vision for your team, as articulated by (fill in the same name as the supporting executive above)?
                                </label>
                                <input type="text" name="answer" style="width: 100%" class="form-control mt-2"  placeholder="Answer"/>
                            </div>
                            <div class="form-group px-10 m-0 mb-2">
                                <label class="row col-form-label h6">3) From the above vision, what do you believe are the top 3-5 strategic priorities currently pursued by the team?
                                </label>
                                <input type="text" name="answer" style="width: 100%" class="form-control mt-2"  placeholder="Answer"/>
                            </div>
                            <div class="form-group px-10 m-0 mb-2">
                                <label class="row col-form-label h6">4) What are some things going well in (executive’s name) business today?
                                </label>
                                <input type="text" name="answer" style="width: 100%" class="form-control mt-2"  placeholder="Answer"/>
                            </div>
                            <div class="form-group px-10 m-0 mb-2">
                                <label class="row col-form-label h6">5) What are the top areas in need of improvement?
                                </label>
                                <input type="text" name="answer" style="width: 100%" class="form-control mt-2"  placeholder="Answer"/>
                            </div>
                            <div class="form-group px-10 m-0 mb-2">
                                <label class="row col-form-label h6">6) How would you describe the (Executive’s name) team culture?
                                </label>
                                <input type="text" name="answer" style="width: 100%" class="form-control mt-2"  placeholder="Answer"/>
                            </div>
                            <div class="form-group px-10 m-0 mb-2">
                                <label class="row col-form-label h6">7) How about (executive’s name) communication, collaboration, and leadership style?
                                </label>
                                <input type="text" name="answer" style="width: 100%" class="form-control mt-2"  placeholder="Answer"/>
                            </div>
                            <div class="form-group px-10 m-0 mb-2">
                                <label class="row col-form-label h6">8) If you were king/queen for a day, what one thing would you address/fix?
                                </label>
                                <input type="text" name="answer" style="width: 100%" class="form-control mt-2"  placeholder="Answer"/>
                            </div>
                            <div class="form-group px-10 m-0 mb-2">
                                <label class="row col-form-label h6">9) What specific behavior would you recommend (executive name) to highlight/do more of or otherwise elevate?
                                </label>
                                <input type="text" name="answer" style="width: 100%" class="form-control mt-2"  placeholder="Answer"/>
                            </div>
                            <div class="form-group px-10 m-0 mb-2">
                                <label class="row col-form-label h6">10) Which behavior changes do you believe (executive name) needs to consider to become even more effective/impactful?
                                </label>
                                <input type="text" name="answer" style="width: 100%" class="form-control mt-2"  placeholder="Answer"/>
                            </div>


                        </div>

                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-lg-4"></div>
                            <div class="col-lg-8">
                                <a href="{{url('/admin/users')}}" type="reset" class="btn btn-secondary col-md-3 mr-2">Cancel</a>
                                <button type="submit" class="btn btn-success col-md-3">Submit</button>
                            </div>
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

