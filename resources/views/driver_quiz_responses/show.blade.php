@extends('layouts.master')

@section('title') Utilisateurs @endsection

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
        <div class="row">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="row gap-3" >
                            <div class="card card-body">
                                <div class="row">
                                    <div class="col-xl-3">
                                        <img src="{{URL::asset($driverQuizResponse->quiz_question->image)}}" alt=""
                                             class="img-fluid d-block rounded">
                                        <h5 class="card-title mt-2">{{$driverQuizResponse->quiz_question->description}}</h5>
                                    </div>
                                    <div class="col-xl-4 mx-auto">
                                        <div class="pb-4">
                                            <h5 class="mt-2">Audio Français</h5>
                                            <div class="essential_audio mt-4" data-url="{{URL::asset($driverQuizResponse->quiz_question->fr)}}"></div>
                                        </div>
                                        <div class="mt-4 pb-4">
                                            <h5 class=" mt-4">Audio Arabe</h5>
                                            <div class="essential_audio mt-4" data-url="{{URL::asset($driverQuizResponse->quiz_question->ar)}}"></div>
                                        </div>
                                        <div class="mt-4">
                                            <h5 class=" mt-4">Audio Ngambaye</h5>
                                            <div class="essential_audio mt-4" data-url="{{URL::asset($driverQuizResponse->quiz_question->ng)}}"></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div>
                                            <h5 class=" mt-2">Catégorie</h5>
                                            <a type="button" href="{{route('categories.show', $driverQuizResponse->quiz_question->category)}}"
                                               class="btn btn-success btn-rounded waves-effect waves-light mb-4 me-2"><i
                                                    class="mdi mdi-tag me-1"></i> {{$driverQuizResponse->quiz_question->category->name}}
                                            </a>
                                        </div>
                                        <div class="mb-4">
                                            <h5 class="mt-2">Reponse attendue</h5>
                                            <p class="lead mb-0 text-justify">
                                                @if($driverQuizResponse->quiz_question->correct)
                                                    <span
                                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                            class="mdi mdi-tag me-1"></i> Vrai
                                                    </span>
                                                @else
                                                    <span
                                                        class="btn btn-danger btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                            class="mdi mdi-tag me-1"></i> Faux
                                                    </span>
                                                @endif
                                            </p>
                                        </div>
                                        <div>
                                            <h5 class=" mt-4">Reponse de l'utilisateur</h5>
                                            <p class="lead mb-0 text-justify">
                                                @if($driverQuizResponse->correct)
                                                    <span
                                                        class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                            class="mdi mdi-tag me-1"></i> Vrai
                                                    </span>
                                                @else
                                                    <span
                                                        class="btn btn-danger btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                            class="mdi mdi-tag me-1"></i> Faux
                                                    </span>
                                                @endif
                                            </p>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3">
                        <div class="card card-body">
                            <span class="tex text-muted pb-1"><i class="mdi mdi-account me-1 "></i>Nom</span>
                            <h4 class="lead mb-4">{{$driverQuizResponse->driver->name}}</h4>
                            <span class="text-muted"><i class="mdi mdi-phone me-1 "></i> Tel</span>
                            <h4 class="lead mb-4">{{$driverQuizResponse->driver->phone}}</h4>
                            <span class="text-muted"><i class="mdi mdi-map-marker me-1 "></i> Identifiant</span>
                            <h4 class="lead mb-4">{{$driverQuizResponse->driver->uid}}</h4>
                            <span class="text-muted"><i class="mdi mdi-key me-1 "></i> Mot de passe</span>
                            <h4 class="lead mb-4">{{$driverQuizResponse->driver->password}}</h4>
                        </div>
                    </div>
            </div>
            <div class="row">
                <div class="card">

                    <div class="card-body" style="height: 80vh">
                        <div class="d-flex align-items-start">
                            <div class="me-2">
                                <h5 class="card-title mb-4">Liste des reponses à ce quiz</h5>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle ">
                                <thead>
                                <tr>
                                    <th class="align-middle">chauffeur</th>
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
                                            <a href="{{route('drivers.show',$driverQuizResponse->driver_id)}}">
                                                <p class="text-muted mb-0 text-justify">{{$driverQuizResponse->driver->name}}</p>
                                            </a>
                                        </td>
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script src="{{ URL::asset('assets/js/essential_audio.js')}}"></script>
@endsection



