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
                        <h3 class="card-label font-weight-bolder text-dark">{{$quiz_answer->quiz->title ?? ''}}</h3>
{{--                        <span class="text-muted font-weight-bold font-size-sm mt-1">{!! $quiz_answer->quiz->description ?? ''!!}</span>--}}

                    </div>
                    <div class="card-toolbar">
                        <button onclick="window.print()" class="btn btn-sm btn-light-info font-weight-bold">
                            <i class="flaticon2-print"></i> Print
                        </button>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                    @csrf
                    <div class="card-body row">
                        <div class="col-lg-12">
                            @include('fragment.error')
                            @if(isset($quiz_answer))
                                @foreach($quiz_answer->question_answer as $key=>$answer)
                                    @if($answer->type == 'text')
                                    <div class="">
                                        <form action="{{url("participant/edit_answer/$answer->id/update_answer")}}" method="post" id="form-{{$answer->id}}">
                                            @csrf
                                            @method('put')
                                            <div class="form-group pl-10">
                                                <label class="m-0">{{$key+1}} ) {{$answer->question->body ?? '' }} </label>
                                                <span class="form-text text-muted ml-5 mb-2">{{$answer->question->description ?? ''}}</span>

                                                <div class="row ml-1">
                                                    <input type="text"  name="answer" id="{{$answer->id}}" onchange="discardChange(this,{{$answer->id}})" class="form-control col-9" oninput="changeAnswer({{$answer->id}})" value="{{$answer->answer ?? ''}}"/>
                                                    <button type="submit" id="save-{{$answer->id}}"  class="btn btn-icon btn-light-success ml-2" style="display: none">
                                                        <i class="flaticon2-checkmark"></i>
                                                    </button>

{{--                                                    <!-- Button trigger modal-->--}}
{{--                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">--}}
{{--                                                        Launch demo modal--}}
{{--                                                    </button>--}}

{{--                                                    <!-- Modal-->--}}
{{--                                                    <div class="modal fade" id="exampleModal-{{$answer->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                                        <div class="modal-dialog" role="document">--}}
{{--                                                            <div class="modal-content">--}}
{{--                                                                <div class="modal-header">--}}
{{--                                                                    <h5 class="modal-title" id="exampleModalLabel">Do you want to save changes ?</h5>--}}
{{--                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                                        <i aria-hidden="true" class="ki ki-close"></i>--}}
{{--                                                                    </button>--}}
{{--                                                                </div>--}}
{{--                                                                <div class="modal-body">--}}
{{--                                                                    --}}
{{--                                                                </div>--}}
{{--                                                                <div class="modal-footer">--}}
{{--                                                                    <h5 class="d-block mr-auto">Do you want to save changes ?</h5>--}}
{{--                                                                    <div class="d-block row">--}}
{{--                                                                        <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Discard</button>--}}
{{--                                                                        <button type="button" class="btn btn-success font-weight-bold">Save</button>--}}
{{--                                                                    </div>--}}

{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <button type="submit" class="btn btn-success ml-2 col-2" style="display: none">Save</button>--}}
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                        @else
                                        <div class="form-group px-10 m-0 mb-2">
                                            <label class="row col-form-label h6">{{$key+1}}) {{$answer->question->body ?? ''}}
                                            </label>
                                            <p class="row text-muted m-0 ">{{$answer->question->description ?? ''}}</p>
                                            <p class="row text-success m-0 ">Your Answer : {{$answer->answer ?? ''}}</p>
                                        </div>
                                    @endif
                                    <hr>
                                @endforeach
                            @endif
                        </div>
                    </div>

{{--                    <div class="card-footer">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-lg-4"></div>--}}
{{--                            <div class="col-lg-8">--}}
{{--                                <a href="{{url('/admin/users')}}" type="reset" class="btn btn-secondary col-md-3 mr-2">Cancel</a>--}}
{{--                                <button type="submit" class="btn btn-success col-md-3">Submit</button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                <!--end::Form-->
            </div>
        </div>
        <!--end::Content-->
    </div>

    <!--end::Profile Email Settings-->
    <script>
        function changeAnswer(id) {
            // alert("save-"+id);
            var saveButton = document.getElementById("save-"+id);
            saveButton.style.display = "block";
        }

        function discardChange(element,id) {
            alertify.confirm('Save changes','Do you want to save your changes', function(){
                    document.getElementById("form-"+id).submit();
                    alertify.success('Saved')
                }
                , function(){
                    const defValue = element.defaultValue;
                    var changedItem = document.getElementById(id).value = defValue;
                    var saveButton = document.getElementById("save-"+id);
                    saveButton.style.display = "none";
                    alertify.error('Discard')
            });

            // if (confirm("Do you want to save your changes ?")) {
            //     document.getElementById("form-"+id).submit();
            // } else {
            //     const defValue = element.defaultValue;
            //     var changedItem = document.getElementById(id).value = defValue;
            //     var saveButton = document.getElementById("save-"+id);
            //     saveButton.style.display = "none";
            // }
            // document.getElementById("exampleModal-"+id).style.display = "block";

        }
    </script>


@endsection

