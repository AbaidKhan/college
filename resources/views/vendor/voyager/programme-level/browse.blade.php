@extends('vendor.voyager.master')

@php($data=App\Models\Shift::first())
@can('browse',$data)

@section('page_header')
    <div class="container-fluid">
        <div class="row" style="padding-bottom: 0px">
            <div class="col-md-6" style="margin-bottom: 0px">
                <p class="page-title">
                    <i class="voyager-study"></i>
                    Disciplines
                </p>

                <a href="{{url('admin/disciplines/create')}}" class="btn btn-success btn-add-new">
                    <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
                </a>
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
    <div class="page-content browse container-fluid">
        {{--@include('voyager::alerts')--}}
        <div class="row" >
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <div class="panel-body">

                        {{--@if ($isServerSide)--}}
                            {{--<form method="get" class="form-search">--}}
                                {{--<div id="search-input">--}}
                                    {{--<select id="search_key" name="key">--}}
                                        {{--@foreach($searchable as $key)--}}
                                            {{--<option value=""></option>--}}
                                        {{--@endforeach--}}
                                    {{--</select>--}}
                                    {{--<select id="filter" name="filter">--}}
                                        {{--<option value="contains" >contains</option>--}}
                                        {{--<option value="equals" >=</option>--}}
                                    {{--</select>--}}
                                    {{--<div class="input-group col-md-12">--}}
                                        {{--<input type="text" class="form-control" placeholder="" name="s" value="">--}}
                                        {{--<span class="input-group-btn">--}}
                                            {{--<button class="btn btn-info btn-lg" type="submit">--}}
                                                {{--<i class="voyager-search"></i>--}}
                                            {{--</button>--}}
                                        {{--</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</form>--}}
                        <style>
                            .dataTables_wrapper .dataTables_filter input{


                            }
                        </style>

                        <div class="table-responsive">
                            <table id="example" class="table table-hover"  >
                                <thead>
                                <tr>

                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Short Name
                                    </th>
                                    <th>
                                        Shift
                                    </th>
                                    <th>
                                        Department
                                    </th>
                                    <th>
                                        Subjects
                                    </th>
                                    <th>
                                        Affiliated From
                                    </th>
                                    <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                </tr>
                                </thead>
                                <tbody>

                                    @forelse($levels as $level)

                                    <tr id="myTable">

                                        <td>
                                            {{$level->name}}
                                        </td>
                                        <td>
                                            {{$level->short_name}}
                                        </td>
                                        <td>
                                            {{$level->shift->name}}
                                        </td>
                                        <td class="no-sort no-click text-right" id="bread-actions">

                                                <div class="btn-toolbar">
                                                    @if(Auth::user()->hasRole('admin'))
                                                    <button dataid="{{$level->id}}" class="btn btn-danger pull-right customBtn deleteCustom" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                        <i class="voyager-trash"></i> <span>Delete</span>
                                                    </button>
                                                    <div class="modal fade" id="myModal" role="dialog">
                                                        <div class="modal-dialog">

                                                            <!-- Modal content-->
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color:#FA2A00;color:#fff;">
                                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                    <h4 class="modal-title" style="text-align: left"><i class="voyager-trash"></i>&nbsp;Are you sure you want to delete this Event ?</h4>
                                                                </div>
                                                                <div class="modal-footer">

                                                                    <form action="{{url('admin/disciplines/destroy')}}" method="post">
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
                                            <a href='{{url("admin/programe-levels/{$level->id}")}}' class="btn btn-warning pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                <i class="voyager-eye"></i> <span>View</span>
                                            </a>
                                            <a href='{{url("admin/programe-levels/{$level->id}/edit")}}' class="btn btn-primary pull-right des" style="text-decoration: none; font-size: 12px;padding: 5px 7px">
                                                <i class="voyager-edit"></i><span>Edit</span>
                                            </a>
                                                </div>

                                        </td>
                                    </tr>
                                    @empty
                                        <tr>
                                            <td><h2>Data not Available</h2></td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    {{--<div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span aria-hidden="true">&times;</span></button>--}}
                    {{--<h4 class="modal-title"><i class="voyager-trash"></i> ?</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<form action="#" id="delete_form" method="POST">--}}
                        {{--{{ method_field('DELETE') }}--}}
                        {{--{{ csrf_field() }}--}}
                        {{--<input type="submit" class="btn btn-danger pull-right delete-confirm" value="">--}}
                    {{--</form>--}}
                    {{--<button type="button" class="btn btn-default pull-right" data-dismiss="modal"></button>--}}
                {{--</div>--}}
            {{--</div><!-- /.modal-content -->--}}
        {{--</div><!-- /.modal-dialog -->--}}
    {{--</div><!-- /.modal -->--}}
@stop

@else
    @include('vendor.voyager.errors.authenticate_error')

@endcan

@section('js')
    <script>
        $(document).ready(function() {
            $(function () {
                $('[data-toggle="popover"]').popover()
            })

            $('.deleteCustom').click(function () {
                var id = $(this).attr('dataid');
                $('#deleteid').val(id);
                $('#myModal').modal('show');
            });

            $('#example').DataTable( {
                // "order": false
                "order": [[ 1, "desc" ]],
                "pageLength": 25
                // "order": [[ 1, "asc" ]]
            } );
        } );
    </script>
@stop
