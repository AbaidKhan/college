@extends('voyager::master')

@php($data=App\Models\Session::first())
@can('browse',$data)
@section('page_header')
    <p class="page-title">
        <i class=""></i>
        Add new Subject
    </p>

@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form action="" id="form"  enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                    <!-- CSRF TOKEN -->
                        {{ csrf_field() }}
                        <div class="panel-body">
                                {{--<div class="alert alert-danger">--}}
                                    {{--<ul>--}}
                                            {{--<li></li>--}}
                                    {{--</ul>--}}
                                {{--</div>--}}
                        <!-- Adding / Editing -->
                            <!-- GET THE DISPLAY OPTIONS -->
                                    <legend class="" style="">Subject Info</legend>
                                    {{--<div class="row">--}}

                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Name:<span class="color">*</span></label>
                                            <input type="text" required class="form-control" name="name" placeholder="Enter Name">
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="shotName">Short Name:<span class="color">*</span></label>
                                                <input type="text" required class="form-control" name="shortName" placeholder="Enter Short Name">
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="code">Code:<span class="color">*</span></label>
                                                <input type="text" required class="form-control" name="code" placeholder="Enter Code">
                                            </div>
                                        </div>

                                    <div class="col-md-6">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="creditHours">Credit Hours:<span class="color">*</span></label>
                                                <input type="number" required class="form-control" name="creditHours" placeholder="Enter Credit Hours">
                                            </div>
                                        </div>

                                    <div class="col-md-6">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="lecturePerWeek">Lectures Per Week:<span class="color">*</span></label>
                                                <input type="number" required class="form-control" name="lecturePerWeek" placeholder="Enter Credit Hours">
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="session">Session:<span class="color">*</span></label>
                                            <select name="sessionId" class="form-control " id="">
                                                <option value="">-Select One-</option>
                                                @foreach($sessions as $session)
                                                <option value="{{$session->id}}">{{$session->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="status">Status:<span class="color">*</span></label>
                                            <select name="status" class="form-control " id="">
                                                <option value="">-Select One-</option>
                                                <option value="1">Active</option>
                                                <option value="2">In Active</option>
                                            </select>
                                        </div>
                                    </div>



                                    {{--</div>--}}


                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit" id="save" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                            <a href="{{url()->previous()}}">
                                <button type="button" class="btn btn-dark save">Back</button>
                            </a>
                        </div>
                    </form>

                    {{--<iframe id="form_target" name="form_target" style="display:none"></iframe>--}}
                    {{--<form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"--}}
                          {{--enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">--}}
                        {{--<input name="image" id="upload_file" type="file"--}}
                               {{--onchange="$('#my_form').submit();this.value='';">--}}
                        {{--<input type="hidden" name="type_slug" id="type_slug" value="">--}}
                        {{--{{ csrf_field() }}--}}
                    {{--</form>--}}

                </div>
            </div>
        </div>
    </div>

    {{--<div class="modal fade modal-danger" id="confirm_delete_modal">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}

                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal"--}}
                            {{--aria-hidden="true">&times;</button>--}}
                    {{--<h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>--}}
                {{--</div>--}}

                {{--<div class="modal-body">--}}
                    {{--<h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>--}}
                {{--</div>--}}

                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>--}}
                    {{--<button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <!-- End Delete File Modal -->
@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
@section('js')
<script>
$(document).ready(function (){




    $('#form').on('submit', function (e) {
        e.preventDefault();
        // check if the input is valid using a 'valid' property
        if (!$('#form').valid() ) {
            return false;
        }
        // $('#save').attr('disabled',true);
        let route = "{{url('admin/subjects/store')}}";
        console.log(route)
        $.ajax({
            type: 'POST',
            url: route,
            data: new FormData(this),
            contentType: false,
            data_type: 'json',
            cache: false,
            processData: false,
            beforeSend: function () {
                loader();
            },
            success: function (response) {

                swal.close();
                console.log(response)
                alertMsg(response.message, response['status']);
                if (response['status']=== 'success'){

                    window.location.replace("{{url('admin/subjects')}}");
                }
                // }

            },
            error: function (xhr, error, status) {
                // console.log(xhr.responseJSON.errors.name[0])
                swal.close();
                var response = xhr.responseJSON;
                // alertMsg(response.message, 'error');
                alertMsg(response.message, 'error');
            }
        });
    });
    $('#form').validate({
        rules: {
            name: {
                required: true,
            },
            shortName: {
                required: true,
            },
            code: {
                required: true,
            },
            creditHours: {
                required: true,
            },
            lecturePerWeek: {
                required: true,
            },
            sessionId: {
                required: true,
            },
            status: {
                required: true,
            },

        },
        messages: {
            name:'Name No is required',
            shortName:'Short Name Capacity is required',
            code:'Code is required',
            creditHours:'Credit Hours is required',
            lecturePerWeek:'Lecture Per Week is required',
            sessionId:'Session is required',
            status:'Status is required',
        },
    });
})
</script>
@stop
