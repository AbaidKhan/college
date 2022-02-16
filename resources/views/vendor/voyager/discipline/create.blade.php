@extends('voyager::master')

@php($data=App\Models\Subject::first())
@can('browse',$data)
@section('page_header')
    <p class="page-title">
        <i class=""></i>
        Add new Discipline
    </p>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />

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
                                    <legend class="" style="">Discipline Info</legend>
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
                                            <label class="font-weight-bold" for="subjects">Subjects:<span class="color">*</span></label>
                                            <select name="subjects[]" class="form-control selectpicker " multiple data-live-search="true" id="">
{{--                                                <option value="">-Select One-</option>--}}
                                                @foreach($subjects as $subject)
                                                    <option value="{{$subject->id}}">{{$subject->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="department">Department:<span class="color">*</span></label>
                                            <select name="department" class="form-control " id="">
                                                <option value="">-Select One-</option>
                                                @foreach($departments as $department)
                                                <option value="{{$department->id}}">{{$department->name}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="shift">Shift:<span class="color">*</span></label>
                                            <select name="shift" class="form-control " id="">
                                                <option value="">-Select One-</option>
                                                @foreach($shifts as $shift)
                                                <option value="{{$shift->id}}">{{$shift->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="affiliatedFrom">Affiliated From:<span class="color">*</span></label>
                                                <input type="text" required class="form-control" name="affiliatedFrom" placeholder="Enter Block">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script>
$(document).ready(function (){




    $('#form').on('submit', function (e) {
        e.preventDefault();
        // check if the input is valid using a 'valid' property
        if (!$('#form').valid() ) {
            return false;
        }
        $('#save').attr('disabled',true);
        let route = "{{url('admin/disciplines/store')}}";
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

                    window.location.replace("{{url('admin/disciplines')}}");
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
            name:{
                required:true,
            },
            shortName:{
                required:true,
            },
            subjects:{
                required:true,
            },
            department:{
                required:true,
            },
            shift:{
                required:true,
            },
            affiliatedFrom:{
                required:true,
            },

        },
        messages: {
            name:'Name No is required',
            shortName:'Short Name Capacity is required',
            subjects:'Subjects are required',
            department:'Department is required',
            shift:'SHift is required',
            affiliatedFrom:'Affiliated From is required',
        },
    });
})
</script>
@stop
