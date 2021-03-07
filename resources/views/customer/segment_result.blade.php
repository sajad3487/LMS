@extends('layouts.customer.master')

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
                            @if($quiz->type != 'quiz')
                                <a href="{{url("super_result/")}}" class="btn btn-icon btn-outline-warning mr-5">
                                    <i class="flaticon2-fast-back "></i>
                                </a>
                            @endif
                            <h3 class="card-label">
                            Quiz Segments
{{--                                <span class="d-block text-muted pt-2 font-size-sm">This page shows Customers info</span>--}}
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
                            <button  type="button" data-toggle="modal" data-target="#chart" class="btn btn-primary font-weight-bolder">
                                <i class="flaticon-pie-chart "></i> Chart
                            </button>
                            <div class="modal fade" id="chart" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Segments Result</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i aria-hidden="true" class="ki ki-close"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body" >
                                            <div data-scroll="true" data-height="350">
                                                <div class="row">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold ml-auto mr-5" onclick="printdiv();">Print Chart</button>
                                                </div>
                                                {{--                                                            <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>--}}
                                                <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                                                <div id="print-this">
                                                    <main class="d-block">
                                                        <div class="col-12 mx-auto text-center">
                                                            <h5>{{$question['body'] ?? ''}}</h5>
                                                            <div class="col-md-6 mx-auto">
                                                                <div id="pie-chart" ></div>
                                                            </div>
                                                        </div>
                                                    </main>
                                                </div>

                                                <script>
                                                    google.load("visualization", "1", {packages:["corechart"]});
                                                    google.setOnLoadCallback(drawCharts);
                                                    function drawCharts() {

                                                        // BEGIN PIE CHART

                                                        // pie chart data
                                                        var pieData = google.visualization.arrayToDataTable([
                                                            ['Segments', 'Taken'],
                                                            @foreach($segments as $key=>$segment)
                                                            ["{{$segment['segment_title'] ?? ''}}",      {{$segment['achieved'] ?? ''}}],
                                                            @endforeach

                                                            // ['Canada',   4563],
                                                            // ['Mexico',   5000],
                                                            // ['Sweden',    946],
                                                            // ['Sweden',    946],
                                                            // ['Germany',  2150]
                                                        ]);
                                                        // pie chart options
                                                        var pieOptions = {
                                                            backgroundColor: 'transparent',
                                                            pieHole: 0.4,
                                                            colors: [ "cornflowerblue",
                                                                "olivedrab",
                                                                "orange",
                                                                "tomato",
                                                                "crimson",
                                                                "purple",
                                                                "turquoise",
                                                                "forestgreen",
                                                                "navy",
                                                                "gray"],
                                                            pieSliceText: 'value',
                                                            tooltip: {
                                                                text: 'percentage'
                                                            },
                                                            fontName: 'Open Sans',
                                                            chartArea: {
                                                                width: '100%',
                                                                height: '94%'
                                                            },
                                                            legend: {
                                                                textStyle: {
                                                                    fontSize: 13
                                                                }
                                                            }
                                                        };
                                                        // draw pie chart
                                                        var pieChart = new google.visualization.PieChart(document.getElementById('pie-chart'));
                                                        pieChart.draw(pieData, pieOptions);
                                                    }
                                                </script>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--end::Button-->
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="overflow-auto">
                            <!--begin: Datatable-->
                            <table class="table table-separate table-head-custom table-checkable " id="kt_datatable">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Segment Title</th>
                                    <th>Min & Max Score</th>
                                    <th>Users</th>
                                    <th>Average Score</th>
                                    <th>Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($segments as $key=>$segment)
                                <tr class="">
                                    <td>{{$key + 1 ?? ''}}</td>
                                    <td>{{$segment['segment_title'] ?? ''}}</td>
                                    <td>{{$segment['min_score'] ?? ''}} - {{$segment['max_score'] ?? ''}}</td>
                                    <td>{{$segment['achieved'] ?? ''}}</td>
                                    <td>{{$segment['average_score'] ?? ''}}</td>
                                    <td>
                                        <!-- Button trigger modal-->
                                        <button type="button" class="btn btn-light-info font-weight-bold" data-toggle="modal" data-target="#users-{{$key}}">
                                            Users
                                        </button>
{{--                                        <button type="button" class="btn btn-light-success font-weight-bold" data-toggle="modal" data-target="#option-{{$key}}">--}}
{{--                                            Options--}}
{{--                                        </button>--}}

                                        <!-- Modal-->
                                        <div class="modal fade" id="users-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">User of this range : {{$segment['min_score'] ?? ''}} - {{$segment['max_score'] ?? ''}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div data-scroll="true" data-height="300">
                                                            <table class="table table-separate table-head-custom table-checkable " id="kt_datatable">
                                                                <thead>
                                                                <tr>
                                                                    <th>#</th>
                                                                    <th>First Name</th>
                                                                    <th>Last Name</th>
                                                                    <th>Email</th>
                                                                    <th>Score</th>
                                                                    <th>Date</th>

                                                                </tr>
                                                                </thead>

                                                                <tbody>
                                                                @foreach($segment['users'] as $users_key => $visitor)
                                                                    <tr class="">
                                                                        <td>{{$users_key +1 ?? ''}}</td>
                                                                        <td>{{$visitor['first_name'] ?? ''}}</td>
                                                                        <td>{{$visitor['last_name'] ?? ''}}</td>
                                                                        <td>{{$visitor['email'] ?? ''}}</td>
                                                                        <td>{{$visitor['score'] ?? ''}}</td>
                                                                        <td>{{ \Carbon\Carbon::parse($visitor['created_at'])->format('Y-m-d - H:i')?? ''}}</td>
                                                                    </tr>
                                                                @endforeach

                                                                </tbody>

                                                            </table>
                                                            <div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
{{--                                        <div class="modal fade" id="option-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">--}}
{{--                                            <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%" role="document">--}}
{{--                                                <div class="modal-content">--}}
{{--                                                    <div class="modal-header">--}}
{{--                                                        <h5 class="modal-title" id="exampleModalLabel">Question : {{$segment['body'] ?? ''}}</h5>--}}
{{--                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                            <i aria-hidden="true" class="ki ki-close"></i>--}}
{{--                                                        </button>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="modal-body">--}}
{{--                                                        <div data-scroll="true" data-height="300">--}}
{{--                                                            <table class="table table-separate table-head-custom table-checkable " id="kt_datatable">--}}
{{--                                                                <thead>--}}
{{--                                                                <tr>--}}
{{--                                                                    <th>#</th>--}}
{{--                                                                    <th>Option Body</th>--}}
{{--                                                                    <th>Score</th>--}}
{{--                                                                    <th>Choosed</th>--}}
{{--                                                                    <th>Average Percentage (%)</th>--}}
{{--                                                                    <th>Status</th>--}}

{{--                                                                </tr>--}}
{{--                                                                </thead>--}}

{{--                                                                <tbody>--}}
{{--                                                                @foreach($segment['option'] as $option_key => $option)--}}
{{--                                                                    <tr class="">--}}
{{--                                                                        <td>{{$option_key+1 ?? ''}}</td>--}}
{{--                                                                        <td>{{$option['body']?? ''}}</td>--}}
{{--                                                                        <td>{{$option['score'] ?? ''}}</td>--}}
{{--                                                                        <td>{{$option['choosed'] ?? ''}}</td>--}}
{{--                                                                        <td>{{$option['average_percentage'] ?? ''}} %</td>--}}
{{--                                                                        <td>{{$option['status'] ?? ''}}</td>--}}
{{--                                                                    </tr>--}}
{{--                                                                @endforeach--}}

{{--                                                                </tbody>--}}

{{--                                                            </table>--}}
{{--                                                            <div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

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
    <script>
        function printdiv()
        {
            var printContents = document.getElementById('print-this').innerHTML;

            var myWindow = window.open('','','width=800,height=800');
            myWindow.document.write(printContents);
            myWindow.print();


            // document.body.innerHTML = printContents;
            // window.print();
            // document.body.innerHTML = originalContents;
        }
    </script>

@endsection



