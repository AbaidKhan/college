@extends('voyager::master')

@php  $customerset=App\Customer::first(); @endphp
@can('browse',$customerset)

{{--    {{$str=}}--}}
@section('page_header')

    <style>
        .nav-tabs>li.active>a, .nav-tabs>li.active>a:focus, .nav-tabs>li.active>a:hover {
            color: grey;
            background-color: white;
            border-color: transparent transparent white;
            font-size: 20px;
        }
        .nav-tabs>li.active>a{
            background: white;
            font-weight: bold;
        }
        .nav-tabs>li.hover>a:hover {
            font-weight: bold;
            background-color: red;
        }
        element.style {
            padding-right: 0px !important;
        }
        .fixPadding{
            padding-right: 0px !important;
        }
        .table-hover>tbody>tr:hover, .table>tbody>tr.active>td, .table>tbody>tr.active>th, .table>tbody>tr>td.active, .table>tbody>tr>th.active, .table>tfoot>tr.active>td, .table>tfoot>tr.active>th, .table>tfoot>tr>td.active, .table>tfoot>tr>th.active, .table>thead>tr.active>td, .table>thead>tr.active>th, .table>thead>tr>td.active, .table>thead>tr>th.active {
            background-color: #fcfbfb;
        }
        .purchaseReturn-tab-color{
            background-color: #f3ffff!important;
            border-color: #f3ffff!important;
        }
        .form-control {
            border: 1px solid #000000;
        }

    </style>

{{--    <div class="container-fluid">--}}
{{--        <div class="row" style="padding-bottom: 0px">--}}
{{--            <div class="col-md-6" style="margin-bottom: 0px">--}}
{{--                <p class="page-title">--}}
{{--                    <i class="voyager-page"></i>--}}
{{--                    Invoices--}}
{{--                </p>--}}

{{--                <a href="{{url('admin/invoice/create-invoice')}}" class="btn btn-success btn-add-new">--}}
{{--                    <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--            <div class="col-md-6" style="margin-bottom: 0px">--}}
{{--                @if ($message = Session::get('info'))--}}
{{--                    <div class="alert alert-success alert-block" style="opacity: 0.7">--}}
{{--                        <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">×</button>--}}
{{--                        <strong>{{ $message }}</strong>--}}
{{--                    </div>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}

{{--    </div>--}}
@stop

@section('content')
    <div class="page-content browse container-fluid">

        {{--@include('voyager::alerts')--}}


        <div class="row" >
            <div class="col-md-12">

                <div class="panel panel-bordered">

                    <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-size: 20px;">
                        <li class="nav-item">
                            <a class="nav-link active navInvoice" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="invoice" aria-selected="true">Invoice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="purchaseReturn-tab" data-toggle="tab" href="#purchaseReturn" role="tab" aria-controls="purchaseReturn" aria-selected="false">Purchase Return</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
{{--               =========================         Invoice View =====================================--}}
                        <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">

                            <div class="panel-heading" style="margin-bottom: 70px;">

                                <div class="container-fluid">
                                    <div class="row" style="padding-bottom: 0px">
                                        <div class="col-md-12" style="margin-bottom: 0px">
                                            <p class="page-title">
                                                <i class="voyager-basket"></i>
                                                Invoice
                                            </p>

                                            <a href="{{url('admin/invoice/create-invoice')}}" class="btn btn-success btn-add-new">
                                                <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
                                            </a>

                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 0px">

                                            @if ($message = Session::get('info'))
                                                <div class="alert alert-success alert-block" style="opacity: 0.7">
                                                    <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">×</button>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="panel-body">

                                <style>
                                    .dataTables_wrapper .dataTables_filter input{


                                    }
                                </style>

                                <div class="table-responsive">
                                    <table id="example" class="table table-hover"  >
                                        <thead>
                                        <tr>

                                            <th>
                                                <input type="checkbox" class="select_all">
                                            </th>

                                            <th>
                                                ID
                                            </th>

                                            <th>
                                                Reference Number
                                            </th>
                                            <th width="250px">Product Name</th>
                                            {{--                                    <th>UOM</th>--}}
                                            <th>
                                                Vendor Name
                                            </th>

                                            <th>
                                                Invoice Number
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            {{--                                    <th>--}}
                                            {{--                                        Quantity--}}
                                            {{--                                    </th>--}}
                                            {{--                                    <th>--}}
                                            {{--                                        Total--}}
                                            {{--                                    </th>--}}
                                            {{--<th>--}}
                                            {{--Address--}}
                                            {{--</th>--}}

                                            <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

{{--                                                                        {{dd($invoice)}}--}}
                                        @if(count($invoice)>0)
                                            @foreach($invoice as $invoices)

                                                <tr id="myTable1">

                                                    <td>
                                                        <input type="checkbox" name="row_id" id="checkbox" value="">
                                                    </td>
                                                    <td>
                                                        {{$invoices->id}}
                                                    </td>

                                                    <td>
                                                        {{sprintf('%04d',$invoices->reference_number).date('-Y-m',strtotime($invoices->date))}}
                                                    </td>
                                                    <td>
                                                        @foreach($invoices->invoiceDetails as $key=> $inv_details )

                                                            {{--                                                    {{$inv_details->product_name}}--}}
                                                        @if($key<2)
                                                        @if($inv_details->product_name)
                                                            <a style="text-decoration: none; color: grey;" title="{{$inv_details->product_name}}" data-toggle="popover" data-trigger="hover" data-content="{{$inv_details->product_name[$key]}}">
                                                                {{ \Illuminate\Support\Str::limit($inv_details->product_name, 10, $end='...') }},</a>
                                                            {{--                                                                                               <a href="#" title="Remarks" data-toggle="popover" style="" data-content="{{$requisition->remarks}}"></a>{{$requisition->remarks}}--}}
                                                        @endif
                                                        @endif
                                                        @endforeach
                                                            etc
                                                    </td>
                                                    {{--                                            <td>--}}
                                                    {{--                                            @foreach($invoices->invoice_details as $details)--}}
                                                    {{--                                            {{$details->uom}}--}}
                                                    {{--                                            @endforeach--}}
                                                    {{--                                            </td>--}}
                                                    <td>{{$invoices->vendor_name}}</td>
                                                    <td>{{$invoices->invoiceNumber}}</td>
                                                    <td>{{($invoices->date)}}</td>

                                                    {{--                                            <td></td>--}}

                                                    <td class="no-sort no-click text-right" id="bread-actions">

                                                        <div class="btn-toolbar">
                                                            <div class="inline-block">
                                                                @if(Auth::user()->hasRole('admin'))
                                                                    <button dataid="{{$invoices->id}}"  class="btn btn-danger deleteInvoiceBtn pull-right customBtn deleteCustom" style="text-decoration: none; font-size: 12px;padding: 5px 7px  ;margin-left: 5px;">
                                                                        <i class="voyager-trash"></i> <span></span>
                                                                    </button>
                                                                    <div class="modal fade" id="deleteInvoiceModal" role="dialog">
                                                                        <div class="modal-dialog">

                                                                            <!-- Modal content-->
                                                                            <div class="modal-content">
                                                                                <div class="modal-header" style="background-color:#FA2A00;color:#fff;">
                                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                    <h4 class="modal-title" style="text-align: left"><i class="voyager-trash"></i>&nbsp;Are you sure you want to delete this Event ?</h4>
                                                                                </div>
                                                                                <div class="modal-footer">

                                                                                    <form action="{{url('admin/invoice/delete_invoice')}}" method="post">
                                                                                        {{csrf_field()}}
                                                                                        {{method_field('DELETE')}}
                                                                                        <input type="hidden" name="deleteid" id="deleteid">
                                                                                        <button type="submit" class="btn btn-default pull-right" style="background-color:#FA2A00 ; color:#fff; border-color:#FA2A00;">Yes, Delete it!</button>
                                                                                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal" >Close</button>

                                                                                    </form>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <a href='{{url("admin/invoice_view/{$invoices->id}")}}'  class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                                    <i class="voyager-eye"></i> <span></span>
                                                                </a>
                                                                    <a href='{{url("admin/invoice/edit_invoice/{$invoices->id}")}}' class="btn btn-primary pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px; margin-right: 5px;">
                                                                        <i class="voyager-edit"></i><span></span>
                                                                    </a>
                                                            </div>
                                                            </br>
{{--                                                            <div class="inline-block">--}}
{{--                                                                @if($invoices->returnStatus == 0)--}}
{{--                                                                    <a href='{{url("admin/supply-purchase-return/create/{$invoices->id}")}}'>--}}
{{--                                                                        <button class="btn btn-success" style="height: 28px; font-size: 12px; width: 55px; margin-right:23px;     padding: 6px 1px;">Return</button>--}}
{{--                                                                    </a>--}}
{{--                                                                @endif--}}
{{--                                                                <a href='{{url("admin/invoice/edit_invoice/{$invoices->id}")}}' class="btn btn-primary pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">--}}
{{--                                                                    <i class="voyager-edit"></i><span></span>--}}
{{--                                                                </a>--}}
{{--                                                            </div>--}}

                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
{{--               ===========================         end Invoice view =================================--}}

{{--               =============================    Purchase Return View  ================================--}}
                        <div class="tab-pane fade" id="purchaseReturn" role="tabpanel" aria-labelledby="purchaseReturn-tab" style="background: #f3ffff;">
                            <div class="panel-heading" style="margin-bottom: 70px;">

                                <div class="container-fluid">
                                    <div class="row" style="padding-bottom: 0px">
                                        <div class="col-md-12" style="margin-bottom: 0px">
                                            <p class="page-title">
                                                <i class="voyager-basket"></i>
                                                Purchase Return
                                            </p>

                                            <a href="{{url('admin/supply-purchase-return/create')}}" class="btn btn-success btn-add-new">
                                                <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
                                            </a>

                                        </div>
                                        <div class="col-md-6" style="margin-bottom: 0px">
                                            @if ($message = Session::get('info'))
                                                <div class="alert alert-success alert-block" style="opacity: 0.7">
                                                    <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">×</button>
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="panel-body">
                                <style>
                                    .dataTables_wrapper .dataTables_filter input{


                                    }
                                </style>

                                <div class="table-responsive">
                                    <table id="example1" class="table table-hover"  >
                                        <thead>
                                        <tr>

                                            <th>
                                                <input type="checkbox" class="select_all">
                                            </th>

                                            <th>
                                                ID
                                            </th>

                                            <th>
                                                Reference Number
                                            </th>
                                            <th>Product Name</th>
                                            {{--                                    <th>UOM</th>--}}
                                            <th>
                                                Vendor Name
                                            </th>

                                            <th>
                                                Invoice Number
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            {{--                                    <th>--}}
                                            {{--                                        Quantity--}}
                                            {{--                                    </th>--}}
                                            {{--                                    <th>--}}
                                            {{--                                        Total--}}
                                            {{--                                    </th>--}}
                                            {{--<th>--}}
                                            {{--Address--}}
                                            {{--</th>--}}

                                            <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        {{--                                {{dd($invoice)}}--}}
                                        @if(count($returnPurchase)>0)
                                            @foreach($returnPurchase as $invoices)

                                                <tr id="myTable">

                                                    <td>
                                                        <input type="checkbox" name="row_id" id="checkbox" value="">
                                                    </td>
                                                    <td>
                                                        {{$invoices->id}}
                                                    </td>

                                                    <td>
                                                        {{sprintf('%04d',$invoices->reference_number).date('-Y-m',strtotime($invoices->date))}}
                                                    </td>
                                                    <td>
                                                        @foreach($invoices->returnDetails as $key=> $inv_details )

                                                            @if($key<2)
                                                            {{--                                                    {{$inv_details->product_name}}--}}
                                                            <a style="text-decoration: none; color: grey;" title="{{$inv_details->product_name}}" data-toggle="popover" data-trigger="hover" data-content="{{$inv_details->product_name[$key]}}">
                                                                {{ \Illuminate\Support\Str::limit($inv_details->product_name, 10, $end='...') }},</a>
                                                            {{--                                                                                               <a href="#" title="Remarks" data-toggle="popover" style="" data-content="{{$requisition->remarks}}"></a>{{$requisition->remarks}}--}}
                                                            @endif
                                                        @endforeach
                                                        etc

                                                    </td>
                                                    {{--                                            <td>--}}
                                                    {{--                                            @foreach($invoices->invoice_details as $details)--}}
                                                    {{--                                            {{$details->uom}}--}}
                                                    {{--                                            @endforeach--}}
                                                    {{--                                            </td>--}}
                                                    <td>{{$invoices->vendor_name}}</td>
                                                    <td>{{$invoices->invoiceNumber}}</td>
                                                    <td>{{($invoices->date)}}</td>

                                                    {{--                                            <td></td>--}}

                                                    <td class="no-sort no-click text-right" id="bread-actions">

                                                        <div class="btn-toolbar">
{{--                                                            @if(Auth::user()->hasRole('admin'))--}}
                                                                <button dataid="{{$invoices->id}}" class="btn btn-danger pull-right customBtn deleteReturn deleteCustom" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                                    <i class="voyager-trash"></i> <span></span>
                                                                </button>
                                                                <div class="modal fade" id="returnModal" role="dialog">
                                                                    <div class="modal-dialog">

                                                                        <!-- Modal content-->
                                                                        <div class="modal-content">
                                                                            <div class="modal-header" style="background-color:#FA2A00;color:#fff;">
                                                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                                <h4 class="modal-title" style="text-align: left"><i class="voyager-trash"></i>&nbsp;Are you sure you want to delete this Event ?</h4>
                                                                            </div>
                                                                            <div class="modal-footer">

                                                                                <form action="{{url('admin/supply-purchase-return/destroy')}}" method="post">
                                                                                    {{csrf_field()}}
                                                                                    <input type="hidden" name="deleteReturn" id="deleteReturn">
                                                                                    <button type="submit" class="btn btn-default pull-right" style="background-color:#FA2A00 ; color:#fff; border-color:#FA2A00;">Yes, Delete it!</button>
                                                                                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal" >Close</button>

                                                                                </form>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
{{--                                                            @endif--}}
                                                            <a href='{{url("admin/supply-purchase-return/show/{$invoices->id}")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                                <i class="voyager-eye"></i> <span></span>
                                                            </a>
{{--                                                            <div>--}}

                                                                <div class="inline-block">
                                                                    <a href='{{url("admin/supply-purchase-return/edit/{$invoices->id}")}}' class="btn btn-primary pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px; margin-left: 70px;" >
                                                                        <i class="voyager-edit"></i><span></span>
                                                                    </a>
                                                                </div>


{{--                                                                <!-- Modal Gate Pass -->--}}
{{--                                                                <div class="modal fade" id="gatePassModal" tabindex="-1" role="dialog" aria-labelledby="gatePassModalLabel" aria-hidden="true">--}}
{{--                                                                    <div class="modal-dialog" role="document">--}}
{{--                                                                        <div class="modal-content">--}}
{{--                                                                            <div class="modal-header">--}}
{{--                                                                                <h5 class="modal-title" id="gatePassModalLabel">Modal title</h5>--}}
{{--                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                                                    <span aria-hidden="true">&times;</span>--}}
{{--                                                                                </button>--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="modal-body">--}}
{{--                                                                                ...--}}
{{--                                                                            </div>--}}
{{--                                                                            <div class="modal-footer">--}}
{{--                                                                                <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>--}}
{{--                                                                                <button type="button" class="btn btn-primary">Save changes</button>--}}
{{--                                                                            </div>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}

{{--                                                            </div>--}}

                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('#example').on('click','.deleteInvoiceBtn',function (){
                $('#deleteInvoiceModal').modal('show');
                var deleteId = parseInt($(this).attr('dataid'))
                $('#deleteid').val(deleteId)
            })

            $('.closeModal').click(function (){
                $('.voyager').addClass('fixPadding');
            })

            // $('#invoice-tab').trigger('click',true)

            $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
                localStorage.setItem('activeTab1', $(e.target).attr('href'));
            });

            var activeTab1 = localStorage.getItem('activeTab1');
            if(activeTab1){
                $('#myTab a[href="' + activeTab1 + '"]').tab('show');
                if(activeTab1 == '#purchaseReturn') {
                    $('#purchaseReturn-tab').addClass('purchaseReturn-tab-color')

                }else {
                    $('#purchaseReturn-tab').removeClass('purchaseReturn-tab-color')
                }
                $('#invoice').removeClass('show')
            }
            $('#purchaseReturn-tab').click(function (){
                $(this).addClass('purchaseReturn-tab-color')
            })
            $('#invoice-tab').click(function (){
                $('#purchaseReturn-tab').removeClass('purchaseReturn-tab-color')
            })


            $('.deleteReturn').click(function () {
                var id = $(this).attr('dataid');
                $('#deleteReturn').val(id);
                $('#returnModal').modal('show');
            });
        $('#example').DataTable( {
            // "order": false
            "order": [[ 1, "desc" ]],
            "pageLength": 25
            // "order": [[ 1, "asc" ]]
        } );
        $('#example1').DataTable( {
            // "order": false
            "order": [[ 1, "desc" ]],
            "pageLength": 25
            // "order": [[ 1, "asc" ]]
        } );
        } );
    </script>
@stop

@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan

@section('javascript')


@stop
