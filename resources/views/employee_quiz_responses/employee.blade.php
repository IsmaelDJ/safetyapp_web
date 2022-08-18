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
<<<<<<< HEAD
                        <p class="mb-4">Liste des reponses de l'utilisateur <strong class="text-info">{{$employee->name}}</strong> pour tous les quiz</p>
=======
                        <p class="mb-4">Liste de reponses de l'utilisateur <strong class="text-info">{{$responses[0]->employee_name}}</strong> pour le quiz <strong class="text-info">{{$responses[0]->quiz_name}}</strong></p>
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
                    </div>
                </div>

                <div class="table-responsive">
<<<<<<< HEAD
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
                        @foreach($employeeQuizResponses as $employeeQuizResponse)
                            <tr>

                                <td>
                                    <div class="row">
                                        <div class="col-auto">
                                            <img src="{{URL::asset($employeeQuizResponse->quiz_question->image)}}" alt=""
                                                    class="avatar-md h-auto d-block rounded"/>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="col-auto">
                                        <a href="{{route('quiz_questions.show',$employeeQuizResponse->quiz_question_id)}}" class="">
                                            <p class="text-muted mb-0 text-justify">{{$employeeQuizResponse->quiz_question->description}}</p>
                                        </a>
                                    </div>
                                    </div>

                                </td>
                                <td>
                                    @if($employeeQuizResponse->quiz_question->correct)
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
                                    @if($employeeQuizResponse->correct)
                                        <span
                                            class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-tag me-1"></i> Vrai
=======
                    <table class="table align-middle ">
                        <thead>
                        <tr>
                            <th class="align-middle">Question</th>
                            <th class="align-middle">Reponse</th>
                            <th class="align-middle">Note</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($responses as $response)
                            <tr>




                                <td>
                                    <div class="row">
                                                                                <div class="col-auto">

                                                                                    <img src="{{URL::asset($response->quiz_question_image)}}" alt=""
                                                                                         class="avatar-md h-auto d-block rounded"/>
                                                                                </div>
                                        <div class="col-auto">
                                            <a href="{{route('quiz_questions.show',$response->quiz_question_id)}}" class="">
                                                <p class="text-muted mb-0 text-justify">{{$response->quiz_question_description}}</p>
                                            </a>
                                        </div>
                                    </div>

                                </td>

                                <td>
                                    <div class="row">
                                                                                <div class="col-auto">
                                                                                    <img src="{{URL::asset($response->quiz_response_image)}}" alt=""
                                                                                         class="avatar-md h-auto d-block rounded"/>
                                                                                </div>
                                        <div class="col-auto">
                                            <p class="text-muted mb-3 mt-3 text-justify">{{$response->quiz_response_description}}</p>

                                        </div>
                                    </div>
                                </td>

                                <td>
                                    @if($response->response_correct)
                                        <span
                                            class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-tag me-1"></i> Correct
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
                                        </span>
                                    @else
                                        <span
                                            class="btn btn-danger btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-tag me-1"></i> Faux
                                        </span>
                                    @endif
                                </td>
<<<<<<< HEAD
                                <td style="width: 200px">
                                    <div class="d-flex gap-3">

                                        <a href="{{route('employee_quiz_responses.show', $employeeQuizResponse)}}"
                                            class="btn btn-default">Détails
                                        </a>
                                        <a href="{{route('employee_quiz_responses.edit', $employeeQuizResponse)}}"
                                            class="btn btn-info">Modifier
                                        </a>

                                        <a href="{{route('employee_quiz_responses.employees', $employeeQuizResponse->employee_id)}}" class="btn btn-danger"
                                            onclick="
                                                    var result = confirm('Cet utilisateur sera supprimée');
                                                    if(result){
                                                        event.preventDefault();
                                                        document.getElementById('delete-form').submit();
                                                    }
                                                    ">
                                            Supprimer</a>

                                        <form method="POST" id="delete-form"
                                                action="{{route('employee_quiz_responses.destroy', [$employeeQuizResponse])}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </div>
                                </td>
=======
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
                            </tr>
                        @endforeach

                        </tbody>
                    </table>


                </div>

<<<<<<< HEAD
                {{ $employeeQuizResponses->links('vendor.pagination.round') }}
=======
                {{ $responses->links('vendor.pagination.round') }}
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
            </div>
        </div>
        <!-- end card -->
    </div>

@endsection




