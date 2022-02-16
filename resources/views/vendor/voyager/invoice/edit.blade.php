
@extends('voyager::master')
@php  $customerset=App\Customer::first(); @endphp
@can('add',$customerset)
@section('css')
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <style>
        .color {
            color: red;
        }

        table {
         border-collapse: unset;
        }
        .voyager .table.table-striped>tbody>tr:nth-of-type(odd) {
            background-color: #f5f4f4;
        }

            #myTable tr td {
                margin-bottom: 99px;
            }#myTable tr {
                border: 1px solid;
            }
            .form-control {
                color: #76838f;
                background-color: #fff;
                background-image: none;
                border: 1px solid #000000;
            }
            .Table td, .Table th {
             border: none;
            }
            .row {
                 margin-right: 0px;
                 margin-left: 0px;
            }


</style>
@stop



@section('page_header')
    <p class="page-title">
        <i class=""></i>
        Edit Invoice
    </p>

@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <div class="panel-body">
                        <legend>Invoice Info</legend>
                        <form action="{{url('admin/invoice/update_invoice/'.$invoice->id)}}" method="post" id="invoice_form">
                            {{ csrf_field() }}
                            {{method_field('PUT')}}
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <label for="" class="font-weight-bold" style="font-size: 20px;">Reference No:<span class="color" style="color: red;">*</span>  {{sprintf('%04d',$invoice_table->reference_number).date('-Y-m')}}</label>
                                        <input type="hidden" name="inv_ref_number" value="{{$invoice_table->reference_number}}">
{{--                                        <input type="text" readonly required id="ref_number"--}}
{{--                                               class="inv_number form-control font-weight-bold"--}}
{{--                                               value="{{sprintf('%04d',$invoice_table->reference_number).date('-Y-m')}}">--}}
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4" style="    margin-left: 7px;">

                                    <div class="input-group" >
                                        Date<span style="color: red;">*</span>
                                        <input type="date" class="inv_date form-control"  value="{{$invoice->date}}" required id="inv_date" name="date">
{{--                                        <input type="hidden" class="form-control" readonly required value="{{date('yy-m-d H:i:s')}}" required id="" name="date">--}}
                                    </div>

                                </div>

                                <div class="col-md-4" style="float: right">
                                    <div class="input-group">
                                        Invoice Number<span style="color: red;">*</span>

                                        <input type="number" name="invoiceNumber" required id="inv_number"
                                               class="inv_number form-control" placeholder="Invoice Number"  value="{{$invoice_table->invoiceNumber}}">
                                    </div>
                                </div>
                            </div>


                            <table class="table table-striped" id="myTable">
                                <thead>

                                <tr>
                                    <td>
                                        <div class="col-md-12" id="vendor_select">
                                            <br>
                                            <label for="vendor">Vendor Name</label>
                                            <span style="color: red;">*</span>
                                            <select name="vendor" id="vendor" required  class="vendor  form-control">
                                                <option class="vendorValue">Select Vendor</option>
                                                @foreach( $vendors as $vendor)
                                                    <option @if($invoice->vendor_id==$vendor->id) selected @endif  value="{{$vendor->id}}">{{$vendor->f_name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>


                                </tr>
                                </thead>
                            <?php $i = 0?>
                                <tbody id="acc_table">
                                @foreach($invoice->invoiceDetails as $key=>$invoices)
                                    <tr>
                                        <input type="hidden" name="detail_id[]" value="{{$invoices->id}}">
                                        <input type="hidden" name="stock_detail_id[]" value="{{$invoice->stockDetails[$key]->id}}">
                                        <td>
                                        <div class="row">
                                            @if($key == 0)
                                                <div class="col-md-2" style="margin-bottom: 0px; float: right;     margin-right: 15px;">
                                                    <button class="btn btn-success  add-product"  style="margin-left: 25px;">+Add Product</button>
                                                </div>
                                            @else
                                                <div class="col-md-2" style="margin-bottom: 0px; float: right;">
                                                    <button class="btn btn-danger deleteproduct "  style="float: right;"><i class="voyager-trash"></i>
                                                    </button>
                                                </div>
                                            @endif

                                        </div>
                                        <div class="col-md-5">
                                            <label for="name">Product Name:</label><span style="color: red;">*</span>
                                            <select  name="product_id[]" required id="namevalue"
                                                    class="namevalue form-control " >
                                                <option value="">Select Product</option>
                                                @foreach($products as $product)
                                                    <option @if($invoices->product_id==$product->id) selected @endif value="{{$product->id}}" class="select_product">{{$product->item_name}}</option>
                                                @endforeach

                                                {{--                                <option value="other">Other</option>--}}
                                            </select>
                                        </div>

                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label for="UOM" class="font-weight-bold">UOM</label><span
                                                    style="color: red;">*</span>
                                                <select type="text" name="uom[]" required id="uom"
                                                        class="uom form-control ">
                                                    <option value="{{$invoices->uom_id}}">{{$invoices->uom}}</option>
                                                </select>
                                                {{--                                                <input type="text" name="uom[]" id="uom" readonly--}}
                                                {{--                                                       class="uom form-control">--}}
                                            </div>
                                        </div>

                                            <div class="col-md-2" style="">
                                                <label for="stockStore" class="font-weight-bold">Stock Store <span class="color">*</span></label>
                                                <select name="stockStore[]" required class="form-control " id="">
                                                    <option value="">Select Store</option>
                                                    @foreach($stockStore as $sore)
                                                        <option @if($invoices->store_id == $sore->id) selected @endif value="{{$sore->id}}">{{$sore->name}}</option>
                                                    @endforeach
                                                </select>
                                                </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="quantity" class="font-weight-bold">Quantity</label><span
                                                    style="color: red;">*</span>
                                                <input type="number" name="quantity[]" value="{{$invoices->quantity}}" id="quantity" required
                                                       class="quantity hidethis form-control font-weight-bold">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Price" class="font-weight-bold">Price</label><span
                                                    style="color: red;">*</span>
                                                <input type="number" name="price[]" value="{{$invoices->price}}" id="price" required
                                                       class="price hidethis form-control font-weight-bold">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="Total">Total</label><span style="color: red;">*</span>
                                                <input type="text" name="total[]" id="total" readonly
                                                       class="total hidethis form-control" value="{{$invoices->total}}">
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                                @endforeach
                                </tbody>
                            </table>
                            <div class="col-md-4">

                            </div>
                            <div class="col-md-4">

                            </div>
                            <div class=" grand_total col-md-4">
                                <label for="Total">Grand Total</label><span style="color: red;">*</span>
                                <input type="text" readonly name="grand_total" class="grand_total_amount form-control">
                            </div>
                            <button class="btn btn-success update" id="update">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@if(1)@section('javascript')@else @section('javascript1')@endif


    <script>


        $(document).ready(function () {

            function eachtr(selected_index,select_value) {
                var check=0;
                $("tr").each(function () {
                    var index = $(this).index();
                    var contact_id = $(this).find('.namevalue').val()
                    // console.log(index,selected_index,select_value,contact_id)
                    if(index!=selected_index) {
                        if(select_value == contact_id) {
                            toastr.error('Already Selected')
                            check=1
                        }
                    }
                })
                return check;
            }

            $('#acc_table').on('change','.namevalue', function (e) {

                var thisAttribute = $(this)
                var selectCurrent = $(this).val();
                // alert(selectCurrent)
                var trIndex = $(this).closest('tr').index()
                var status=  eachtr(trIndex,selectCurrent)

                if (status == 1) {
                    $(this).children("option:selected").remove()
                }
            })

            $('#acc_table').on('input','.quantity',function (){
                var grandTotal = 0;
                var thisComponent = $(this)
                var total =  thisComponent.val() * thisComponent.closest('tr').find('.price').val();
                thisComponent.closest('tr').find('.total').val(total)
                $('.total').each(function (){
                    grandTotal = parseInt(grandTotal) + parseInt($(this).val())

                })
                $('.grand_total_amount').val(grandTotal)
            })
            $('#acc_table').on('input','.price',function (){
                var grandTotal = 0;
                var thisComponent = $(this)
                var total =  thisComponent.val() * thisComponent.closest('tr').find('.quantity').val();
                thisComponent.closest('tr').find('.total').val(total)
                $('.total').each(function (){
                    grandTotal = parseInt(grandTotal) + parseInt($(this).val())
                })
                $('.grand_total_amount').val(grandTotal)
            })

            var today = new Date();

            var dd = today.getDate();
            var mm = today.getMonth()+1; //January is 0!
            var yyyy = today.getFullYear();

            if(dd<10) {
                dd = '0'+dd
            }

            if(mm<10) {
                mm = '0'+mm
            }

            // today = yyyy + '/' + mm + '/' + dd;
            today = yyyy + '-' + mm + '-' + dd;

            console.log(today);
            document.getElementById('inv_date').value = today;
           total_sum();
            // Ajax function to fetch data in input fields
        });
        function total_sum() {
            var temp = 0;
            $('.total').each(function () {

                var total = $(this).val();
                // alert(total);
                if ($.isNumeric(total)) {
                    temp = temp + parseInt(total);
                }
            });

            // alert(temp);
            $('.grand_total_amount').val(temp)
        }


        function myFunction(selected, selectName) {
            $.ajax({
                url: '/admin/invoice-product/' + selected,
                type: 'get',
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function (response) {
                    // console.log(response[0].item_uom)
                    selectName.closest('tr').find('.uom option').remove()
                    $.each(response[0].item_uom,function(j,k){
                        selectName.closest('tr').find('.uom').append('<option value='+k.id+'>'+ k.unitName+'-'+k.unitQuantity+'</option>')
                        console.log(k)
                    // selectName.closest('tr').find('.uom').val(response[0].uom);
                    // selectName.closest('tr').find('.quantity').val(response[0].quantity);
                    // selectName.closest('tr').find('.price').val(response[0].unit_price);
                    // selectName.closest('tr').find('.total').val(response[0].unit_price * response[0].quantity);
                    //
                    // total_sum();
                });
            }
        })
        }


            function  InvoiceValidate(element){
            var invoiceNumber = $('#inv_number').val();
            var vendor_id = $('#vendor').val();
            $.ajax({
                type: "POST",
                url: '{{url('admin/checkeinvoice')}}',
                data: {
                    invoiceNumber: invoiceNumber,
                    vendor_id: vendor_id
                },
                dataType: "json",
                success: function (res) {
                    console.log(res);
                    if (res.exists) {
                        toastr.error('This Invoice Number is already exist');
                        $('#inv_number').css('background', 'pink');
                        $('#update').attr('disabled', true);
                    } else {
                        $('#inv_number').css('background', '#b8ffd7');
                        $('#update').attr('disabled', false);
                    }
                },

            });

        }
        $('#vendor_select').on('change', '.vendor', function () {

            InvoiceValidate();
        });

        $('#myTable').on('click', '.deleteproduct', function (e) {
            e.preventDefault()
            $(this).closest('tr').remove();
            total_sum();
        });
        $('#myTable').on('change', '.namevalue', function () {
// alert('ok');
            var selected=$(this).find(':selected').val();
            // alert(selected)
            // var selected = $(this).val();
            var selectName = $(this);
            console.log(selected)
            myFunction(selected, selectName);
            total_sum();
            // InvoiceValidate();

        });

        $('#acc_table').on('click','.add-product',function (e) {

            e.preventDefault();

            $('#myTable').append("<tr>\n" +
                "                                    <input type=\"hidden\" name=\"detail_id[]\" value=\"0\">\n" +
                "                                    <td>\n" +
                "<div class=\"row\">\n" +
                "<div class=\"col-md-2\" style=\" margin-bottom: -2px; float:right;\">\n" +
                        "                                            <button type=\"button\" class=\"btn btn-danger  deleteproduct action pull-right\"><i class=\"voyager-trash\"></i></button>\n" +
            "                                        </div>\n" +
                "</div>" +
                "                                        <div class=\"col-md-5\">\n" +
                "                                            <label for=\"name\">Product Name:</label><span style=\"color: red;\">*</span>\n" +
                "                                            <select name=\"product_id[]\" id=\"namevalue\"\n" +
                "                                                    class=\"namevalue form-control \" >\n" +
                "                                                <option value=\"\">Select Product</option>\n" +
                "                                                @foreach($products as $product)\n" +
                "                                                    <option  value=\"{{$product->id}}\" class=\"select_product\">{{$product->item_name}}</option>\n" +
                "                                                @endforeach\n" +
                "\n" +
                "                                                {{--                                <option value=\"other\">Other</option>--}}\n" +
                "                                            </select>\n" +
                "                                        </div>\n" +
                "\n" +
                "<div class=\"col-md-5\">\n" +
                "                                            <div class=\"form-group\">\n" +
                "                                                <label for=\"UOM\" class=\"font-weight-bold\">UOM</label><span\n" +
                "                                                    style=\"color: red;\">*</span>\n" +
                "                                                <select type=\"text\" name=\"uom[]\" required id=\"uom\"\n" +
                "                                                        class=\"uom form-control \">\n" +
                "                                                    <option value=\"\">Select Item</option>\n" +
                "                                                </select>\n" +
                "                                                {{--                                                <input type=\"text\" name=\"uom[]\" id=\"uom\" readonly--}}\n" +
                "                                                {{--                                                       class=\"uom form-control\">--}}\n" +
                "                                            </div>\n" +
                "                                        </div>" +
                "<div class=\"col-md-2\" style=\"\">\n" +
                "                                                <label for=\"stockStore\" class=\"font-weight-bold\">Stock Store <span class=\"color\">*</span></label>\n" +
                "                                                <select name=\"stockStore[]\" required class=\" form-control\" id=\"\">\n" +
                "                                                    <option value=\"\">Select Store</option>\n" +
                "                                                    @foreach($stockStore as $sore)\n" +
                "                                                        <option value=\"{{$sore->id}}\">{{$sore->name}}</option>\n" +
                "                                                    @endforeach\n" +
                "                                                </select>\n" +
                "                                                </div>" +
                "<div class=\"col-md-4\">\n" +
                "                                            <div class=\"form-group\">\n" +
                "                                                <label for=\"quantity\" class=\"font-weight-bold\">Quantity</label><span\n" +
                "                                                    style=\"color: red;\">*</span>\n" +
                "                                                <input type=\"number\" name=\"quantity[]\" id=\"quantity\" required\n" +
                "                                                       class=\"quantity hidethis form-control font-weight-bold\">\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                        <div class=\"col-md-4\">\n" +
                "                                            <div class=\"form-group\">\n" +
                "                                                <label for=\"Price\" class=\"font-weight-bold\">Price</label><span\n" +
                "                                                    style=\"color: red;\">*</span>\n" +
                "                                                <input type=\"number\" name=\"price[]\" id=\"price\" required\n" +
                "                                                       class=\"price hidethis form-control font-weight-bold\">\n" +
                "                                            </div>\n" +
                "                                        </div>" +
                "                                        <div class=\"col-md-4\">\n" +
                "                                            <div class=\"form-group\">\n" +
                "                                                <label for=\"Total\">Total</label><span style=\"color: red;\">*</span>\n" +
                "                                                <input type=\"text\" name=\"total[]\" id=\"total\" readonly\n" +
                "                                                       class=\"total hidethis form-control\" value=\"\">\n" +
                "                                            </div>\n" +
                "                                        </div>\n" +
                "                                    </td>\n" +
                "                                </tr>");



        });

        $('#invoice_form').on('submit',function (){
           $(this).attr('disabled',true);
           // alert('ok');
        });
        $('#update').on('click',function (){
           InvoiceValidate();
            // alert('ok');
        });
        $(this).keyup(function (){
            InvoiceValidate();
        })
    </script>
@endsection
