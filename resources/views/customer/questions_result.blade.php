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
                            <h3 class="card-label">
                            Quiz No : {{$quiz->id ?? '' }}
                                <span class="d-block text-muted pt-2 font-size-sm">Quiz Title : {{$quiz->title ?? '' }}</span>
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <!--begin::Button-->
{{--                            <a href="{{url('/')}}" class="btn btn-primary font-weight-bolder">--}}
{{--                                    <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg--><svg--}}
{{--                                            xmlns="http://www.w3.org/2000/svg"--}}
{{--                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"--}}
{{--                                            viewBox="0 0 24 24" version="1.1">--}}
{{--                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                                        <rect x="0" y="0" width="24" height="24"/>--}}
{{--                                        <circle fill="#000000" cx="9" cy="15" r="6"/>--}}
{{--                                        <path--}}
{{--                                            d="M8.8012943,7.00241953 C9.83837775,5.20768121 11.7781543,4 14,4 C17.3137085,4 20,6.6862915 20,10 C20,12.2218457 18.7923188,14.1616223 16.9975805,15.1987057 C16.9991904,15.1326658 17,15.0664274 17,15 C17,10.581722 13.418278,7 9,7 C8.93357256,7 8.86733422,7.00080962 8.8012943,7.00241953 Z"--}}
{{--                                            fill="#000000" opacity="0.3"/>--}}
{{--                                    </g>--}}
{{--                                </svg><!--end::Svg Icon--></span> Export--}}
{{--                            </a>--}}
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
                                    <th>Question Title</th>
                                    <th>Average Score</th>
                                    <th>Taken</th>
                                    <th>Requirement</th>
                                    <th>Additional Info</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($questions as $key=>$question)
                                    @if($question['type'] != 'title')
                                        <tr class="">
                                    <td>{{$key ?? ''}}</td>
                                    <td>{{$question['body'] ?? ''}}</td>
                                    <td>{{$question['average_score'] ?? ''}}</td>
                                    <td>{{$question['taken'] ?? ''}}</td>
                                    <td>
                                        @if($question['requirement'] == 1)
                                            <span class="label label-lg font-weight-bold label-light-success label-inline">
                                                Required
                                            </span>
                                        @elseif($question['requirement'] == 0)
                                            <span class="label label-lg font-weight-bold label-light-warning label-inline">
                                                Optional
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($question['additional_info'] == 1)
                                            <span class="label label-lg font-weight-bold label-light-success label-inline">
                                                Enable
                                            </span>
                                        @elseif($question['additional_info'] == 0)
                                            <span class="label label-lg font-weight-bold label-light-warning label-inline">
                                                Disable
                                            </span>
                                        @endif
                                    </td>
                                    <td>
                                        <!-- Button trigger modal-->
                                        <button type="button" class="btn btn-light-info font-weight-bold ml-2 my-1" data-toggle="modal" data-target="#users-{{$key}}">
                                            Answers Details
                                        </button>
                                        @if($question['type'] == 'question')
                                        <button type="button" class="btn btn-light-success font-weight-bold ml-2 my-1" data-toggle="modal" data-target="#option-{{$key}}">
                                            <i class="flaticon-pie-chart"></i>Options
                                        </button>
                                        @endif

                                        <!-- Modal-->
                                        <div class="modal fade" id="users-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Question : {{$question['body'] ?? ''}}</h5>
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
                                                                    <th>Answer</th>
                                                                    @if($question['type'] != 'text')
                                                                    <th>Score</th>
                                                                    <th>Additional Info</th>
                                                                    @endif
                                                                    <th>Date</th>

                                                                </tr>
                                                                </thead>

                                                                <tbody>
                                                                @foreach($question['answer'] as $answer_key => $answer)
                                                                    <tr class="">
                                                                        <td>{{$answer_key+1 ?? ''}}</td>
                                                                        <td>{{$answer['taken']['first_name'] ?? ''}}</td>
                                                                        <td>{{$answer['taken']['last_name'] ?? ''}}</td>
                                                                        <td>{{$answer['taken']['email'] ?? ''}}</td>
                                                                        <td>{{$answer['answer'] ?? ''}}</td>
                                                                        @if($question['type'] != 'text')
                                                                        <td>{{$answer['option']['score'] ?? ''}}</td>
                                                                        <td>{{$answer['additional_info'] ?? ''}}</td>
                                                                        @endif
                                                                        <td>{{ \Carbon\Carbon::parse($answer['taken']['created_at'])->format('Y-m-d - H:i') ?? ''}}</td>
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
                                        @if($question['type'] == 'question')
                                        <div class="modal fade" id="option-{{$key}}" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable" style="max-width: 90%" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Question : {{$question['body'] ?? ''}}</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <i aria-hidden="true" class="ki ki-close"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" >
                                                        <div data-scroll="true" data-height="500">
                                                            <div class="row">
                                                                <button type="button" class="btn btn-light-primary font-weight-bold ml-auto mr-5" onclick="printdiv({{$key}});">Print Chart</button>
                                                            </div>
{{--                                                            <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>--}}
                                                            <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                                                            <div id="print-this-{{$key}}">
                                                                <main class="d-block">
                                                                    <div class="col-12 mx-auto text-center">
                                                                        <h5>{{$question['body'] ?? ''}}</h5>
                                                                        <div class="col-md-6 mx-auto">
                                                                            <div id="pie-chart-{{$key}}" ></div>
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
                                                                            ['Country', 'Page Hits'],
                                                                            @foreach($question['option'] as $option_key => $option)
                                                                            ["{{$option['body']?? ''}}",      {{$option['average_percentage'] ?? ''}}],
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
                                                                        var pieChart = new google.visualization.PieChart(document.getElementById('pie-chart-{{$key}}'));
                                                                        pieChart.draw(pieData, pieOptions);
                                                                    }
                                                                </script>
                                                                <table class="table table-separate table-head-custom table-checkable " id="kt_datatable">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Option Body</th>
                                                                        <th>Score</th>
                                                                        <th>Choosed</th>
                                                                        <th>Average Percentage (%)</th>
                                                                        <th>Status</th>

                                                                    </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                    @foreach($question['option'] as $option_key => $option)
                                                                        <tr class="">
                                                                            <td>{{$option_key+1 ?? ''}}</td>
                                                                            <td>{{$option['body']?? ''}}</td>
                                                                            <td>{{$option['score'] ?? ''}}</td>
                                                                            <td>{{$option['choosed'] ?? ''}}</td>
                                                                            <td>{{$option['average_percentage'] ?? ''}} %</td>
                                                                            <td>
                                                                                @if($option['status'] == 1)
                                                                                    <span class="label label-lg font-weight-bold label-light-primary label-inline">
                                                                                    Active
                                                                                </span>
                                                                                @elseif($option['status'] == 0)
                                                                                    <span class="label label-lg font-weight-bold label-light-success label-inline">
                                                                                    Deactivated
                                                                                </span>
                                                                                @endif
                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                    </tbody>

                                                                </table>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                            @endif

                                    </td>
                                </tr>
                                    @endif
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
        function printdiv(key)
        {
            var printContents = document.getElementById('print-this-'+key).innerHTML;

            var myWindow = window.open('','','width=800,height=800');
            myWindow.document.write(printContents);
            myWindow.print();


            // document.body.innerHTML = printContents;
            // window.print();
            // document.body.innerHTML = originalContents;
        }
    </script>
@endsection



