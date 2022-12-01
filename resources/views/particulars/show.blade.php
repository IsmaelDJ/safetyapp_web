@extends('layouts.master')

@section('title') Particulier @endsection

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

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body" style="height: 100vh">
                        <div class="card-body">
                            <img src="{{URL::asset($particular->avatar)}}" alt="" class="img-fluid rounded mb-4">
                            <h5 class="card-title">{{$particular->name}}</h5>
                        </div>
                        <i class="mdi mdi-phone me-1 "></i><span class="text-muted">Tel</span>
                        <h4 class="lead mb-4">{{$particular->phone}}</h4>
                        <i class="mdi mdi-key me-1 "></i><span class="text-muted">UUID</span>
                        <h4 class="lead mb-4">{{$particular->uuid}}</h4>
                        <i class="mdi mdi-map-marker me-1 "></i><span class="text-muted">Mot de passe</span>
                        <h4 class="lead mb-4">{{$particular->password}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
               
            </div>
        </div>
        
    </div>

@endsection


