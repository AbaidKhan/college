@extends('voyager::master')

@php($teacher=App\Models\Teacher::first())
@can('browse',$teacher)
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .color{
            color: red;
        }
    </style>
@stop



@section('page_header')
    <p class="page-title">
        <i class=""></i>
        Add new Class Room
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
                                    <legend class="" style="">Class Room Info</legend>
                                    {{--<div class="row">--}}

                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="roomNo">Room No:<span class="color">*</span></label>
                                            <input type="text" required class="form-control" name="roomNo" placeholder="Enter Room No">
                                        </div>
                                    </div>
                                        <div class="col-md-6">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="seatingCapacity">Seating Capacity:<span class="color">*</span></label>
                                                <input type="number" required class="form-control" name="seatingCapacity" placeholder="Enter Seating Capacity">
                                            </div>
                                        </div>
                                    <div class="col-md-12">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="block">Block:<span class="color">*</span></label>
                                                <input type="text" required class="form-control" name="block" placeholder="Enter Block">
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
        $('#save').attr('disabled',true);
        let route = "{{url('admin/class-rooms/store')}}";
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

                    window.location.replace("{{url('admin/class-rooms')}}");
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
            roomNo:{
                required:true,
            },
            seatingCapacity:{
                required:true,
            },
            block:{
                required:true,
            },

        },
        messages: {
            roomNo:'Room No is required',
            seatingCapacity:'Seating Capacity is required',
            block:'Block is required',
        },
    });
})
</script>
@stop
