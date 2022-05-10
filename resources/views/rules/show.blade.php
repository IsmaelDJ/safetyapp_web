@extends('layouts.master')

@section('title') Catégories @endsection

@section('css')
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('/assets/css/essential_audio.css') }}" id="essential_audio" rel="stylesheet"
          type="text/css"/>

@endsection

@section('content')
    <div class="container-fluid">
        <div class="row gap-3" >
            <div class="card card-body w-25 bg-primary d-inline" style="width: 25%"></div>
            <div class="card card-body w-75 " style="width: 25%"></div>
        </div>
    </div>
    <div>
        <div class="row">


            <div class="card w-75">
                <div class="card-body row">

                    <div class="w-25">
                        <img src="{{URL::asset($rule->image)}}" alt=""
                             class="img-fluid d-block rounded"></td>
                    </div>
                    <div class=" ms-4 w-50">
                        <div>
                            <h5 class=" mt-4">Catégorie</h5>
                            <a type="button" href="{{route('categories.show', $rule->category)}}"
                               class="btn btn-success btn-rounded waves-effect waves-light mb-4 me-2"><i
                                    class="mdi mdi-tag me-1"></i> {{$rule->category->name}}
                            </a>
                        </div>

                        <div class="mb-4">
                            <h5 class=" mt-4">Description</h5>
                            <p class="lead mb-0 text-justify">{{$rule->description}}</p>
                        </div>
                        <div class="mt-4 pb-4 pt-4">
                            <h5 class=" mt-4">Audio Français</h5>
                            <div class="essential_audio mt-4" data-url="{{URL::asset($rule->fr)}}"></div>
                        </div>
                        <div class="mt-4 pb-4">
                            <h5 class=" mt-4">Audio Français</h5>
                            <div class="essential_audio mt-4" data-url="{{URL::asset($rule->fr)}}"></div>
                        </div>
                        <div class="mt-4 pb-4">
                            <h5 class=" mt-4">Audio Français</h5>
                            <div class="essential_audio mt-4" data-url="{{URL::asset($rule->fr)}}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('script')
@section('script')

    <script src="{{ URL::asset('assets/js/essential_audio.js')}}"></script>
@endsection
@endsection
