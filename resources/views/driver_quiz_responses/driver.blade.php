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
                    <table class="table align-middle text-center">
                        <thead>
                        <tr>
                            <th class="text-start">Illustration</th>
                            <th class="align-middle">Description</th>
                            <th class="align-middle">Reponse attendu</th>
                            <th class="align-middle">Reponse donnée</th>
                            <th class="align-middle">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($driverQuizResponses as $driverQuizResponse)
                            <tr>

                                <td>
                                    <div class="row">
                                        <div class="col-auto">
                                            <img src="{{URL::asset($driverQuizResponse->quiz_question->image)}}" alt=""
                                                    class="avatar-md h-auto d-block rounded"/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-auto">
                                        <a href="{{route('quiz_questions.show',$driverQuizResponse->quiz_question_id)}}" class="">
                                            <p class="text-muted mb-0 text-justify">{{$driverQuizResponse->quiz_question->description}}</p>
                                        </a>
                                    </div>
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
                                        <a href="{{route('driver_quiz_responses.edit', $driverQuizResponse)}}"
                                            class="btn btn-info">Modifier
                                        </a>

                                        <a href="{{route('driver_quiz_responses.drivers', $driverQuizResponse->driver_id)}}" class="btn btn-danger"
                                            onclick="
                                                    var result = confirm('Cs Chauffeurs sera supprimée');
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

                {{ $driverQuizResponses->links('vendor.pagination.round') }}
            </div>
        </div>
        <!-- end card -->
    </div>

@endsection




