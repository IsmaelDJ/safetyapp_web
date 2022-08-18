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

<div class="card">
    
    <div class="row g-0">
        <div class="col-xl-4 p-2">
            <form action="{{route('employee_quiz_responses.update',$employeeQuizResponse)}}" method="post" enctype="multipart/form-data">
                @csrf
                
                <label class="col-md-2 col-form-label">Utilisateur</label>
                <div class="mb-4">
                    <select
                        class="form-select form-select-lg @error('employee_id') is-invalid @enderror"
                        name="employee_id">
                        @foreach($employees as $employee)
                            @if($employee->id == $employeeQuizResponse->employee_id)
                                <option selected value="{{$employee->id}}">
                                    {{$employee->name}}
                                </option>
                            @else
                                <option value="{{$employee->id}}">
                                    {{$employee->name}}
                                </option>
                            @endif
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
                        @foreach($quizQuestions as $quizQuestion)
                            @if($quizQuestion->id == $employeeQuizResponse->quiz_question_id)
                            <option selected value="{{$quizQuestion->id}}">
                                {{$quizQuestion->description}}
                            </option>
                            @else
                            <option value="{{$quizQuestion->id}}">
                                {{$quizQuestion->description}}
                            </option>
                            @endif
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
                        @if($employeeQuizResponse->correct)
                        <option value="true" selected>
                            Vrai
                        </option>
                        <option value="false">
                            Faux
                        </option>
                        @else
                        <option value="true">
                            Vrai
                        </option>
                        <option value="false" selected>
                            Faux
                        </option>
                        @endif
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
           
                <input type="hidden" name="_method" value="put">
            </form>
        </div>
        <div class="col-xl-8">
            <div class="auth-full-bg pt-lg-5 p-4">
                <div class="w-100">
                </div>
            </div>
        </div>
    </div>
<!-- end row -->
</div>


@endsection
@section('script')
<script>
    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("image").files[0]);
        
        oFReader.onload = function (oFREvent) {
            document.getElementById("ruleImage").src = oFREvent.target.result;
        };
    };
</script>
@endsection
