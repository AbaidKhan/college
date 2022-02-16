@extends('voyager::master')
@php  $customerset=App\Customer::first(); @endphp
@can('read',$customerset)


@section('page_header')
    <h1 class="page-title">
        <i class=""></i> {{ __('voyager::generic.viewing') }}

            <a href="{{url('admin/customers/'.$customer->id.'/edit')}}" class="btn btn-info customBtn">
                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                {{ __('voyager::generic.edit') }}
            </a>


            {{--<a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger customBtn" data-id="" id="">--}}
                {{--<i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>--}}
            {{--</a>--}}


        <a href="{{url('admin/customers')}}" class="btn btn-warning customBtn">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager::generic.return_to_list') }}
        </a>
    </h1>

@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered" style="padding-bottom:0px;">
                    <!-- form start -->
                        <div class="panel-heading" style="border-bottom:0;">
                            <h3 class="panel-title">
                                Company Name
                            </h3>
                        </div>
                        <div class="panel-body" style="padding-top:0;">
                                {{$customer->company_name}}
                                        <br/>
                                <p></p>
                        </div><!-- panel-body -->
                            <hr style="margin:0;">
                </div>
                <div class="panel panel-bordered" style="padding-bottom:0px;">
                    <!-- form start -->
                    <div class="panel-heading" style="border-bottom:0;">
                        <h3 class="panel-title">
                            Customer Name
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{$customer->name}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                    <hr style="margin:0;">
                </div>
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                        Customer Phone NO
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{$customer->phone_no}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                </div>
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                            Customer Email
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{$customer->email}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                </div>
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                            Customer Address
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{$customer->address}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                </div>
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                            Customer City
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{$customer->city}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                </div>
                <div class="panel panel-body-bordered" style="padding-bottom:5px;">
                    <!--form start -->
                    <div class="panel-heading" style="border-bottom: 0">
                        <h3 class="panel-title">
                            Customer Type
                        </h3>
                    </div>
                    <div class="panel-body" style="padding-top:0;">
                        {{$customer->customer_type}}
                        <br/>
                        <p></p>
                    </div><!-- panel-body -->
                </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager::generic.delete_confirm') }} ">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
@section('javascript')

        <script>
            $(document).ready(function () {
                $('.side-body').multilingual();
            });
        </script>
        <script src="{{ voyager_asset('js/multilingual.js') }}"></script>

    <script>
        var deleteFormAction;
        $('.delete').on('click', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) {
                // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');

            $('#delete_modal').modal('show');
        });

    </script>
@stop
