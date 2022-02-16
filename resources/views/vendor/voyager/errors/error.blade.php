@extends('voyager::master')

{{--@section('page_title', __('voyager::generic.viewing').' '.$dataType->display_name_plural)--}}

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-8" style="margin-bottom: 0px">

            </div>
            <div class="col-md-4" style="margin-bottom: 0px">
                @if ($message = Session::get('info'))
                    <div class="alert alert-success alert-block" style="opacity: 0.7">
                        <button type="button" class="close" style="right: -19px;top: -16px;" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </div>
        </div>


        {{--@include('voyager::partials.bulk-delete')--}}

        {{--<a href="" class="btn btn-primary">--}}
        {{--<i class="voyager-list"></i> <span>{{ __('voyager::bread.order') }}</span>--}}
        {{--</a>--}}

        {{--@include('voyager::multilingual.language-selector')--}}
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid" style="background: orangered;color: white;background-size: cover">
        {{--@include('voyager::alerts')--}}
        <div class="row" >
            <div class="col-md-12">
            <div class="col-md-3">
            </div>
            <div class="col-md-8">

                    <h1>Authentication Required</h1>
                <h5>You are not Authorized to Access this page.</h5>
                    </div>

            </div>
        </div>
    </div>


@stop

{{--@section('css')--}}
{{--@if(!$dataType->server_side && config('dashboard.data_tables.responsive'))--}}
{{--<link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">--}}
{{--@endif--}}
{{--@stop--}}

@section('javascript')
    <script>
        // $(document).ready(function(){
        //     $("#myInput").on("keyup", function() {
        //         var value = $(this).val().toLowerCase();
        //         $("#myTable tr").filter(function() {
        //             $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        //         });
        //     });
        // });
        $(document).ready(function() {
            $('.deleteCustom').click(function () {
                var id = $(this).attr('dataid');
                $('#deleteid').val(id);
                $('#myModal').modal('show');
            });})
    </script>
    <script type="text/javascript" href="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable( {
                "order": false,
                // "order": [[ 1, "desc" ]],
                "pageLength": 25
                // "order": [[ 1, "asc" ]]
            } );
        } );
    </script>


@stop
