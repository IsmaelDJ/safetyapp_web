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
    <div class="col-md-6">
        @livewire('chart-reading')
    </div>
    <div class="col-md-6">
        @livewire('chart-presence')
    </div>
</div>

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-2 d-inline-block">Quiz</h4>
                <div class="btn-group float-end">
                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light mb-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Détails <i class="mdi mdi-chevron-down"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('analyze.quiz.correct')}}" >Correcte</a>
                        <a class="dropdown-item" href="{{route('analyze.quiz.false')}}">Faux</a>
                        <a class="dropdown-item" href="{{route('analyze.quiz.waitting')}}">Non pratiqué</a>
                    </div>
                </div>
                <hr>
                
                <div class="card-block">
                    {!! $quizChart->container() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-inline-block mb-2">Règles</h4>
                <div class="btn-group float-end">
                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light mb-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Détails <i class="mdi mdi-chevron-down"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('analyze.rule.read')}}" >Règles lus</a>
                        <a class="dropdown-item" href="{{route('analyze.rule.notread')}}">Règles non lus</a>
                    </div>
                </div>

                <hr>
                
                <div class="card-block">
                    {!! $ruleChart->container() !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title d-inline-block mb-2">Lecture par catégories</h4>
                <div class="btn-group float-end">
                    <a type="button"  class="btn btn-primary btn-sm waves-effect waves-light mb-2 dropdown-toggle" href="{{route('analyze.category.read')}}">Détails</a>
                </div>

                <hr>
                
                <div class="card-block">
                    {!! $categorieReadingChart->container() !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>

<script src="{{ URL::asset('/assets/libs/jquery-knob/jquery-knob.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/jquery-knob.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/essential_audio.js')}}"></script>
{!! $readingChart->script() !!}
{!! $quizChart->script() !!}
{!! $ruleChart->script() !!}
{!! $globalChart->script() !!}
{!! $categorieReadingChart->script() !!}
@endsection


