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
                        <h3 class="card-label font-weight-bolder text-dark">James Evaluation</h3>
{{--                        <span class="text-muted font-weight-bold font-size-sm mt-1">Please answer the questions</span>--}}
                    </div>

                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form class="form" action="{{url("/admin/users/updateProfile")}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body row">
                        <div class="col-lg-12">
                            @include('fragment.error')




                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Answer</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Please briefly describe your role/realm of responsibilities?</td>
                                    <td>Your Answer will be appeared here</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>How would you describe the vision for your team, as articulated by (fill in the same name as the supporting executive above)?</td>
                                    <td>Your Answer will be appeared here</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>From the above vision, what do you believe are the top 3-5 strategic priorities currently pursued by the team?</td>
                                    <td>Your Answer will be appeared here</td>
                                </tr>
                                <tr>
                                    <th scope="row">4</th>
                                    <td>what are some things going well in (executive’s name) business today?</td>
                                    <td>Your Answer will be appeared here</td>
                                </tr>
                                <tr>
                                    <th scope="row">5</th>
                                    <td>What are the top areas in need of improvement?</td>
                                    <td>Your Answer will be appeared here</td>
                                </tr>
                                <tr>
                                    <th scope="row">6</th>
                                    <td>How would you describe the (Executive’s name) team culture?</td>
                                    <td>Your Answer will be appeared here</td>
                                </tr>
                                <tr>
                                    <th scope="row">7</th>
                                    <td>How about (executive’s name) communication, collaboration, and leadership style?</td>
                                    <td>Your Answer will be appeared here</td>
                                </tr>
                                <tr>
                                    <th scope="row">8</th>
                                    <td>If you were king/queen for a day, what one thing would you address/fix?</td>
                                    <td>Your Answer will be appeared here</td>
                                </tr>
                                <tr>
                                    <th scope="row">9</th>
                                    <td>What specific behavior would you recommend (executive name) to highlight/do more of or otherwise elevate?</td>
                                    <td>Your Answer will be appeared here</td>
                                </tr>
                                <tr>
                                    <th scope="row">10</th>
                                    <td>Which behavior changes do you believe (executive name) needs to consider to become even more effective/impactful?</td>
                                    <td>Your Answer will be appeared here</td>
                                </tr>
                                </tbody>
                            </table>
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

