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

@endsection

@section('content')

    <div class="card" >
        <div class="row g-0">

            <div class="col-xl-4">
                <div class="auth-full-page-content p-md-5 p-4">
                    <div class="w-100">

                        <h4 class="card-title mb-4">Créer une reponse au quiz</h4>

                        <form action="{{route('employee_quiz_responses.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label class="col-md-2 col-form-label">Utilisateur</label>
                            <div class="mb-4">
                                <select
                                    class="form-select form-select-lg @error('employee_id') is-invalid @enderror"
                                    name="employee_id">
                                    <option selected>Selectionnez un utilisateur</option>
                                    @foreach($employees as $employee)
                                        <option value="{{$employee->id}}">
                                            {{$employee->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('employee_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Utilisateur non selectionnée</strong>
                                </span>
                                @enderror
                            </div>

                            <label class="col-md-2 col-form-label">Quiz</label>
                            <div class="mb-4">
                                <select
                                    class="form-select form-select-lg @error('quiz_question_id') is-invalid @enderror"
                                    name="quiz_question_id">
                                    <option selected>Selectionnez un quiz</option>
                                    @foreach($quizQuestions as $quizQuestion)
                                        <option value="{{$quizQuestion->id}}">
                                            {{$quizQuestion->description}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('quiz_question_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Quiz non selectionnée</strong>
                                </span>
                                @enderror
                            </div>
                            <label class="col-form-label">Réponse</label>
                            <div>
                                    <select
                                        class="form-select form-select-lg @error('correct') is-invalid @enderror"
                                        name="correct">
                                            <option selected>Selectionnez une reponse</option>
                                            <option value="true" selected>
                                                Vrai
                                            </option>
                                            <option value="false">
                                                Faux
                                            </option>
                                    </select>
                                    @error('correct')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Valeur de reponse non selectionnée</strong>
                                    </span>
                                    @enderror
                            </div>

                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary w-md">Enregistrer</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="auth-full-bg pt-lg-5 p-4">
                    <div class="w-100">
                    </div>
                </div>
            </div>
            <!-- end col -->

            <!-- end col -->
        </div>
        <!-- end row -->
    </div>


@endsection

