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
                        <h5 class="card-title mb-4">Liste de reponses des utilisateurs</h5>
                    </div>
<<<<<<< HEAD
                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <a type="button" href="{{route('employee_quiz_responses.create')}}"
                               class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                    class="mdi mdi-plus me-1"></i> Ajouter
                            </a>
                        </div>
                    </div>
=======
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr>
                            <th class="align-middle">Utilisateur</th>
<<<<<<< HEAD
                            <th class="align-middle">Quiz catégorie</th>
                            <th class="align-middle">Question</th>
                            <th class="align-middle">Reponse</th>
=======
                            <th class="align-middle">Quiz</th>
                            <th class="align-middle">Question</th>
                            <th class="align-middle">Reponse</th>
                            <th class="align-middle">Note</th>
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
                            <th class="align-middle">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
<<<<<<< HEAD
                        @foreach($employeeQuizResponses as $employeeQuizResponse)
                            <tr>
                                <td>
                                    <a href="{{route('employees.show',$employeeQuizResponse->employee_id)}}">
                                        <p class="text-muted mb-0 text-justify">{{$employeeQuizResponse->employee->name}}</p>
                                    </a>
                                </td>
                                <td class="d-none d-xl-table-cell">
                                    <a type="button" href="{{route('categories.show', $employeeQuizResponse->quiz_question->category)}}"
                                       class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="mdi mdi-tag me-1"></i> {{$employeeQuizResponse->quiz_question->category->name}}
                                    </a>
                                </td>
                                <td>
                                    <div class="row">
                                        <div class="col-auto">
                                            <a href="{{route('quiz_questions.show',$employeeQuizResponse->quiz_question_id)}}" class="">
                                                <p class="text-muted mb-0 text-justify">{{$employeeQuizResponse->quiz_question->description}}</p>
=======
                        @foreach($responses as $response)
                            <tr>
                                <td>
                                    <a href="{{route('employees.show',$response->employee_id)}}">
                                        <p class="text-muted mb-0 text-justify">{{$response->employee_name}}</p>
                                    </a>
                                </td>



                                <td>
                                    <div class="row">
{{--                                        <div class="col-auto">--}}

{{--                                            <img src="{{URL::asset($response->quiz_image)}}" alt=""--}}
{{--                                                 class="avatar-md h-auto d-block rounded"/>--}}
{{--                                        </div>--}}
                                        <div class="col-auto">
                                            <a href="{{route('quizzes.show',$response->quiz_id)}}">
                                                <p class="text-muted mb-0 text-justify">{{$response->quiz_name}}</p>
                                            </a>
                                        </div>
                                    </div>

                                </td>



                                <td>
                                    <div class="row">
{{--                                        <div class="col-auto">--}}

{{--                                            <img src="{{URL::asset($response->quiz_question_image)}}" alt=""--}}
{{--                                                 class="avatar-md h-auto d-block rounded"/>--}}
{{--                                        </div>--}}
                                        <div class="col-auto">
                                            <a href="{{route('quiz_questions.show',$response->quiz_question_id)}}" class="">
                                                <p class="text-muted mb-0 text-justify">{{$response->quiz_question_description}}</p>
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
                                            </a>
                                        </div>
                                    </div>

                                </td>

                                <td>
<<<<<<< HEAD
                                    @if($employeeQuizResponse->correct)
=======
                                    <div class="row">
{{--                                        <div class="col-auto">--}}
{{--                                            <img src="{{URL::asset($response->quiz_response_image)}}" alt=""--}}
{{--                                                 class="avatar-md h-auto d-block rounded"/>--}}
{{--                                        </div>--}}
                                        <div class="col-auto">
                                            <p class="text-muted mb-3 mt-3 text-justify">{{$response->quiz_response_description}}</p>

                                        </div>
                                    </div>
                                </td>

                                <td>
                                    @if($response->response_correct)
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
                                        <span
                                           class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-tag me-1"></i> Correct
                                        </span>
                                    @else
                                        <span
                                           class="btn btn-danger btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-tag me-1"></i> Faux
                                        </span>
                                    @endif
                                </td>
<<<<<<< HEAD
                                <td style="width: 400px">
                                    <div class="d-flex gap-3">
                                        <a href="{{route('employee_quiz_responses.employees',[$employeeQuizResponse->employee_id])}}"
                                           class="btn btn-primary">Reponses de l'utilisateur
                                        </a>
                                        <div class="d-flex gap-3">
                                            <a href="{{route('employee_quiz_responses.quizzes',[$employeeQuizResponse->quiz_question_id])}}"
                                               class="btn btn-primary">Reponses à ce quiz
                                            </a>
                                        </div>
=======
                                <td style="width: 200px">
                                    <div class="d-flex gap-3">
                                        <a href="{{route('employee_quiz_responses.employee',[$response->employee_id,$response->quiz_id])}}"
                                           class="btn btn-primary">Toutes les reponses
                                        </a>
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
                                    </div>
                                </td>
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




