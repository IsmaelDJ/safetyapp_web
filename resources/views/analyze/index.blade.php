@extends('layouts.master')

@section('title') Analytique @endsection

@section('css')
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('/assets/css/essential_audio.css') }}" id="essential_audio" rel="stylesheet" type="text/css"/>

@endsection

@section('content')

<div class="row">

    <div class="col-xl-9">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-end">
                        <div class="input-group input-group-sm">
                            <select class="form-select form-select-sm">
                                <option value="JA" selected>Jan</option>
                                <option value="DE">Dec</option>
                                <option value="NO">Nov</option>
                                <option value="OC">Oct</option>
                            </select>
                            <label class="input-group-text">Moi</label>
                        </div>
                    </div>
                    <h4 class="card-title mb-4">Présence</h4>
                </div>

                <div class="row">
                    <div>
                        <div id="line-chart" class="apex-charts" dir="ltr"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-2 col-sm-6 card ms-2">
        <div class="text-center pt-4" dir="ltr">
            <h5 class="font-size-20 mb-3">Quiz</h5>
            <hr>
            <input class="knob" data-width="200" data-angleoffset="90" data-linecap="round"
            data-readOnly=true data-fgcolor="#3eac00" value="35">
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jquery-knob/jquery-knob.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/jquery-knob.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/saas-dashboard.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/essential_audio.js')}}"></script>
@endsection


