

@section('content')
    <div class="page-content browse container-fluid" style="background: orangered;color: white;background-size: cover">
        {{--@include('voyager::alerts')--}}
        <div class="row" >
            <div class="col-md-12">
            <div class="col-md-3">
            </div>
            <div class="col-md-8">
                    <h1>Authentication Required</h1>
                <h5>You are not Authorized to Access this page.Please Contact to IT Department !</h5>
                    <h6>New system is being deployed therefore any error or omission is excepted. For clarification / correction please report to IT Department.</h6>
                <h6>Copyright 2019 by Biztek Apps</h6>
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


