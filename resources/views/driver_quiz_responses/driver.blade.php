@extends('layouts.master')

@section('title') Reponses @endsection

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
                        <p class="mb-4">Liste des reponses du Chauffeur <strong class="text-info">{{$driver->name}}</strong> pour tous les quiz</p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr>
                            <th class="align-middle">Question</th>
                            <th class="text text-center">Reponse</th>
                            @can('doAdvanced')
                            <th class="align-middle">Actions</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($driverQuizResponses as $driverQuizResponse)
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-auto">
                                            <a href="{{route('quiz_questions.show',$driverQuizResponse->quiz_question_id)}}" class="">
                                                <p class="text-muted mb-0 text-justify">{{$driverQuizResponse->quiz_question->description}}</p>
                                            </a>
                                        </div>
                                    </div>

                                </td>

                                <td class="text text-center fs-3">
                                    @if($driverQuizResponse->correct === $driverQuizResponse->quiz_question->correct)
                                        <i
                                            class="mdi mdi-check me-1 text-success"></i>
                                    @else
                                        <i
                                            class="mdi mdi-close me-1 text-danger"></i>
                                    @endif
                                </td>
                                @can('doAdvanced')
                                <td style="width: 300px">
                                    <div class="d-flex gap-3">
                                        <a href="{{route('driver_quiz_responses.show',[$driverQuizResponse->id])}}"
                                           class="btn btn-primary">Détails
                                        </a>
                                        <div class="d-flex gap-3">
                                            <a href="{{route('driver_quiz_responses.drivers',[$driverQuizResponse->driver_id])}}"
                                               class="btn btn-outline-secondary">Autres reponses
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                @endcan
                            </tr>
                        @endforeach

                        </tbody>
                    </table>


                </div>

                {{ $driverQuizResponses->links('vendor.pagination.round') }}

                {{ $driverQuizResponses->links('vendor.pagination.round') }}
            </div>
        </div>
        <!-- end card -->
    </div>

@endsection




