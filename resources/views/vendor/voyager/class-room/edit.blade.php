@extends('voyager::master')
@php  $customerset=App\Customer::first(); @endphp
@can('edit',$customerset)

@section('page_header')
    <p class="page-title">
        <i class=""></i>
        Edit Customer
    </p>

@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form" class="form-edit-add" action="{{url('admin/customers/'.$customer->id)}}" method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}
                        {{method_field('PUT')}}
                        <div class="panel-body">
                        {{--<div class="alert alert-danger">--}}
                        {{--<ul>--}}
                        {{--<li></li>--}}
                        {{--</ul>--}}
                        {{--</div>--}}
                        <!-- Adding / Editing -->
                            <!-- GET THE DISPLAY OPTIONS -->
                            <legend class="" style="">Edit Customer Info</legend>
                            {{--<div class="row">--}}
                            <div class="col-md-12">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">Customer Type:<span class="color">*</span></label>
                                    <select required class="form-control select2" name="customer_type">
                                        <option>None</option>
                                        <option @if($customer->customer_type=='Walk_IN') selected @endif value="Walk_IN">Walk_IN</option>
                                        <option @if($customer->customer_type=='Potential') selected @endif value="Potential">Potential</option>
                                        <option @if($customer->customer_type=='Trader') selected @endif value="Trader">Trader</option>
                                        {{--<option value="audi">Audi</option>--}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">Company Name:<span class="color">*</span></label>
                                    <input type="text" required class="form-control" value="{{$customer->company_name}}" name="company_name" placeholder="Enter Company Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">Customer Name:<span class="color">*</span></label>
                                    <input type="text" required class="form-control" value="{{$customer->name}}" name="name" placeholder="Enter Customer Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">Customer Phone#:<span class="color">*</span></label>
                                    <input type="text" required class="form-control" value="{{$customer->phone_no}}" name="phone_no" placeholder="Enter Customer Phone NO">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">Customer Email:</label>
                                    <input type="email" class="form-control" value="{{$customer->email}}" name="email" placeholder="Enter Customer Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">Customer Address:</label>
                                    <input type="text" class="form-control" name="address" value="{{$customer->address}}" placeholder="Enter Customer Address">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" >
                                    <label class="font-weight-bold" for="name">Customer City:</label>
                                    <input type="text" class="form-control" name="city" value="{{$customer->city}}" placeholder="Enter Customer City">
                                </div>
                            </div>
                            {{--</div>--}}


                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                          enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                               onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
@section('javascript')

@stop
