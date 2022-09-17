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
                        <p class="mb-4">Liste des chauffeurs ayant repondu au qiz : <strong class="text-info">{{$quizQuestion->description}}</strong></p>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle text-center">
                        <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Entreprise</th>
                            <th class="align-middle">Reponse attendu</th>
                            <th class="align-middle">Reponse donnée</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($driverQuizResponses as $driverQuizResponse)
                            <tr>
                                <td style="width: 250px">
                                    <p class="text-muted mb-0 text-justify">{{$driverQuizResponse->driver->name}}</p>
                                </td>
                                <td>
                                    <div>
                                        <a href="{{route('contractors.show', $driverQuizResponse->driver->contractor)}}"
                                            class=" mb-2 me-2">
{{--                                            <i class="mdi mdi-tag me-1"></i>--}}
                                            {{$driverQuizResponse->driver->contractor->name}}
                                        </a>
                                    </div>
                                </td>
                                <td>
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
                                </td>
                                <td>
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
                                </td>
                                <td style="width: 200px">
                                    <div class="d-flex gap-3">

                                        <a href="{{route('driver_quiz_responses.show', $driverQuizResponse)}}"
                                            class="btn btn-default">Détails
                                        </a>
                                        <a href="{{route('driver_quiz_responses.edit', $driverQuizResponse->driver)}}"
                                            class="btn btn-info">Modifier
                                        </a>

                                        <a href="{{route('driver_quiz_responses.quizzes', $driverQuizResponse->quiz_question_id)}}" class="btn btn-danger"
                                            onclick="
                                                    var result = confirm('Cette reponse au quiz sera supprimée');
                                                    if(result){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form').submit();
                                                    }
                                                    ">
                                            Supprimer</a>

                                        <form method="POST" id="delete-form"
                                                action="{{route('driver_quiz_responses.destroy', [$driverQuizResponse])}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>    
                </div>

                {{ !!$driverQuizResponses->links('vendor.pagination.round') }}
            </div>
        </div>
        <!-- end card -->
    </div>

@endsection




