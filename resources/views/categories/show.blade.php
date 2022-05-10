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

@endsection

@section('content')


    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">{{$category->name}}</h4>

                <div class="">
                    <img src="{{URL::asset($category->image)}}" class="img-fluid" alt="Responsive image">
                </div>
            </div>
        </div>
    </div>


@endsection
