@extends('layouts.master')

@section('title') Search @endsection

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

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <!-- end col -->
    <br class="m-md-4">
    <div class="col-xl-10 offset-xl-1 col-md-10 offset-md-1 ">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-results-start">
                    <div class="me-2">
                        @if ($data->isEmpty())
                            <h5 class="card-title m-4">Auccun resultat correspondant à ce terme de recherche</h5>
                        @else
                            <h5 class="card-title m-4">Resultat</h5>
                        @endif
                    </div> 
                </div>

                <div class="w-100">
                    <ul class="list-group">
                        @foreach($data as $result)
                        <li class="list-group-item d-flex justify-content-between align-items-center p-4">
                            <span style="width: 400px; font-size: 14px;" class="text text-justify"> 
                                @if ($result->type == 1)
                                    <span class="badge bg-success btn-rounded p-2 mb-2" style="width: 80px;"><i class="mdi mdi-tag me-1"></i> Quiz </span> <br> {{str::limit( $result->content->description, $limit = 150, $end = '...')}}
                                @else
                                    <span class="badge bg-primary btn-rounded p-2 mb-2" style="width: 80px;"><i class="mdi mdi-tag me-1"></i> Règle </span><br> {{str::limit( $result->content->description, $limit = 150, $end = '...')}}
                                @endif</span>
                            <span class="badge badge-primary badge-pill">
                                @if ($result->type == 1)
                                    <a href="{{ route('quiz_questions.show', $result->content) }}" style="border-radius: 4px;" class="btn btn-primary ">Details</a>
                                @else
                                    <a href="{{ route('rules.show', $result->content) }}" style="border-radius: 4px;" class="btn btn-primary ">Details</a>
                                @endif
                            </span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card-footer">
                {{ $data->links('vendor.pagination.round') }}
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
@endsection


