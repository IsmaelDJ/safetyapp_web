@extends('layouts.master')

@section('title') Reponses @endsection

@section('css')
<!-- Bootstrap Css -->
<link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
<!-- Icons Css -->
<link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<!-- App Css-->
<link href="{{ URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

@endsection

@section('content')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


<div class="col-xl-12">
    <div class="card">
        <div class="card-body">
            <div class="d-flex align-items-start">
                <div class="me-2">
                    <h5 class="card-title mb-4">
                        Liste des chauffeurs ordonnée par reponses
                    </h5>
                </div>

            </div>

            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="align-middle">chauffeur</th>
                        <th class="text text-center">Reponse Vraie</th>
                        <th class="text text-center">Reponse Faux</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($drivers as $driver)
                    <tr>
                        <td>
                            <a href="{{route('drivers.show',$driver->id)}}">
                                <p class="text-muted mb-0 text-justify">{{$driver->name}}</p>
                            </a>
                        </td>
                        <td>
                            <div class="row">
                                <div class="col-auto">
                                    <p class="text-muted mb-0 text-justify">{{$driver->correct_answers}}</p>
                                </div>
                            </div>

                        </td>
                        <td>
                            <div class="row">
                                <div class="col-auto">
                                    <p class="text-muted mb-0 text-justify">{{$driver->incorrect_answers}}</p>
                                </div>
                            </div>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>


            {{ $drivers->links('vendor.pagination.round') }}
        </div>
    </div>
    <!-- end card -->
</div>

@endsection