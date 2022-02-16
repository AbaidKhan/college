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
        Add New Teacher
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
                                    <legend class="" style="">Teacher Info</legend>
                                    {{--<div class="row">--}}

                                    <div class="col-md-5">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Name:<span class="color">*</span></label>
                                            <input type="text" required class="form-control" name="name" placeholder="Enter Name">
                                        </div>
                                    </div>
                                        <div class="col-md-5">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="name">Father Name:<span class="color">*</span></label>
                                                <input type="text" required class="form-control" name="fatherName" placeholder="Enter Father Name">
                                            </div>
                                        </div>
                                    <div class="col-md-2">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="gender">Gender:<span class="color">*</span></label>
                                                <select name="gender" class="form-control " id="">
                                                    <option value="">-Select One-</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="email">Email:</label>
                                            <input type="email" class="form-control" name="email" placeholder="Enter Email">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Registration Id:<span class="color">*</span></label>
                                            <input type="number" required class="form-control" name="regId" placeholder="Enter Registration Id">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="name">Marital Status:<span class="color">*</span></label>
                                            <select name="maritalStatus" class="form-control " id="">
                                                <option value="">-Select One-</option>
                                                <option value="single">Single</option>
                                                <option value="married">Married</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="mobileNo">Mobile No:</label>
                                            <input type="text" class="form-control" name="mobileNo" placeholder="Enter Mobile No">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="phoneNo">Phone No:</label>
                                            <input type="text" class="form-control" name="phoneNo" placeholder="Enter Phone No">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="department">Departments:<span class="color">*</span></label>
                                            <select required class="form-control select2" name="department">
                                                <option value="">-Select One-</option>
                                                @foreach($departments as $department)
                                                    <option value="{{$department->id}}">{{$department->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="designation">Designations:<span class="color">*</span></label>
                                            <select required class="form-control select2" name="designation">
                                                <option value="">-Select One-</option>
                                                @foreach($designations as $designation)
                                                    <option value="{{$designation->id}}">{{$designation->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                        <div class="col-md-6">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="name">CNIC:<span class="color">*</span></label>
                                                <input type="text" required class="form-control" name="cnic" placeholder="Enter CNIC">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="name">Join Date:<span class="color">*</span></label>
                                                <input type="date" required class="form-control" name="joinDate" placeholder="Enter Join Date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group" >
                                                <label class="font-weight-bold" for="name">Date in Service:</label>
                                                <input type="date" class="form-control" name="dateInService" placeholder="Enter Date in Service">
                                            </div>
                                        </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="dob">DOB:</label>
                                            <input type="date" class="form-control" name="dob" placeholder="Enter DOB ">
                                        </div>
                                    </div>



                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="lastQualification">Last Qualification:</label>
                                            <input type="text" class="form-control" name="lastQualification" placeholder="Enter Last Qualification">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="address">Address:</label>
                                            <input type="email" class="form-control" name="address" placeholder="Enter Address">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group" >
                                            <label class="font-weight-bold" for="img">Image:</label>
                                            <input type="file" class="form-control" name="img" >
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
        let route = "{{url('admin/teachers/store')}}";
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

                    window.location.replace("{{url('admin/teachers')}}");
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
            gender:{
                required:true,
            },
            maritalStatus:{
                required:true,
            },
            name:{
                required:true,
            },
            fatherName:{
                required:true,
            },
            email:{
                required:true,
            },
            regId:{
                required:true,
            },
            mobileNo:{
                required:true,
            },
            phoneNo:{
                required:true,
            },
            department:{
                required:true,
            },
            designation:{
                required:true,
            },
            cnic:{
                required:true,
            },
            joinDate:{
                required:true,
            },
            dateInService:{
                required:true,
            },
            dob:{
                required:true,
            },
            lastQualification:{
                required:true,
            },
            address:{
                required:true,
            },
            img:{
                required:true,
            },

        },
        messages: {
            name:'Name is required',
            fatherName:'Father Name is required',
            email:'Email is required',
            regId:'Registration ID is required',
            mobileNo:'Mobile No is required',
            phoneNo:'Phone No is required',
            department:'Department is required',
            designation:'Designation is required',
            cnic:'CNIC is required',
            joinDate:'Join Date is required',
            dateInService:'Date In Service is required',
            dob:'DOB is required',
            lastQualification:'Last Qualification is required',
            address:'Address is required',
            img:'Image is required',
            gender:'Gender is required',
            maritalStatus:'Marital Status is required',

        },
    });
})
</script>
@stop
