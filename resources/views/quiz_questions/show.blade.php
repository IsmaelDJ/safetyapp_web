@extends('layouts.master')

@section('title') Question @endsection

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
    <div class="card">
        <div class="row">
            <div class="col-4 p-4">
                <div class="rule-show-item">
                    <div class="card mb-2 rounded" style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(255, 255, 255, 0)), url({{ URL::asset($quiz_question->image) }}); background-size: 100%; background-repeat: no-repeat; background-position: center;">
                        <div class="d-flex justify-content-end flex-column" style="width: 100%">
                            <div class="me-1 align-self-end" 
                                style="border-radius: 50%; background-color: {{ $quiz_question->correct ? "#edf8ef" : "#ffe8e8" }}; min-width: 2.5rem; min-height: 2.5rem; display: flex; justify-content: center" 
                                href="{{ route('quiz_questions.edit', $quiz_question) }}">
                                <i class="fa fa-{{ $quiz_question->correct ? "check" : "ban" }} fs-5" style="align-self: center; color:{{ $quiz_question->correct ? "#34a543" : "#e80000" }}"></i> 
                            </div>
                            <a href="{{ route("quiz_questions.show", $quiz_question->id) }}" style="height: 65vh; width: 100%;"></a>
                            <div class="d-flex justify-content-between">
                                <div class="d-xl-flex justify-content-between align-self-center">
                                    <div class="essential_audio m-4" data-url="{{URL::asset($quiz_question->fr)}}"></div>
                                    <div class="essential_audio m-4" data-url="{{URL::asset($quiz_question->ar)}}"></div>
                                    <div class="essential_audio m-4" data-url="{{URL::asset($quiz_question->ng)}}"></div>
                                </div>

                                <div class="d-flex align-self-md-center align-self-end p-4">
                                    <a class="me-1" 
                                        style="border-radius: 50%; background-color: #edf8ef; width: 2rem; height: 2rem; display: flex; justify-content: center" 
                                        href="{{ route('quiz_questions.edit', $quiz_question) }}">
                                        <i class="fa fa-pen" style="align-self: center; color: #34a543"></i> 
                                    </a>
                                    <a class="me-1" 
                                        style="border-radius: 50%; background-color: #ffe8e8; width: 2rem; height: 2rem; display: flex; justify-content: center" 
                                        href="{{route('quiz_questions.index')}}"
                                        onclick="
                                        var result = confirm('Cette règle sera supprimée');
                                        if(result){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$quiz_question->id}}').submit();
                                        }">
                                        <i class="fa fa-trash" style="align-self: center; color: #e80000"></i> 
                                    </a>
                                    <form method="POST" id="delete-form-{{$quiz_question->id}}"
                                        action="{{route('quiz_questions.destroy', [$quiz_question])}}">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="lead" style="text-align: justify">{{$quiz_question->description}}</p>
                </div>
            </div>
        
        
            <div class="col-8">
                    <div class="d-flex">
                        <div class="align-self-center">
                            <h3 class="my-3">Liste des quiz</h3>
                        </div>
                    </div>
                    <div class="row pe-3">
                        @foreach($quiz_questions as $quiz_question)
                        <div class="rule-item col-4">
                            <div class="card mb-2 rounded" style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(255, 255, 255, 0)), url({{ URL::asset($quiz_question->image) }}); background-size: 100%; background-repeat: no-repeat; background-position: center;">
                                <div class="d-flex justify-content-end flex-column" style="height: 300px">
                                    <div class="me-1 align-self-end" 
                                        style="border-radius: 50%; background-color: {{ $quiz_question->correct ? "#edf8ef" : "#ffe8e8" }}; min-width: 2.5rem; min-height: 2.5rem; display: flex; justify-content: center" 
                                        href="{{ route('quiz_questions.edit', $quiz_question) }}">
                                        <i class="fa fa-{{ $quiz_question->correct ? "check" : "ban" }} fs-5" style="align-self: center; color:{{ $quiz_question->correct ? "#34a543" : "#e80000" }}"></i> 
                                    </div>
                                    <a href="{{ route("quiz_questions.show", $quiz_question->id) }}" style="height: 100%; width: 100%;"></a>
                                    <div class="d-flex justify-content-between">
                                        <div class="d-xl-flex justify-content-between align-self-center">
                                            <div class="essential_audio m-3" data-url="{{URL::asset($quiz_question->fr)}}"></div>
                                            <div class="essential_audio m-3" data-url="{{URL::asset($quiz_question->ar)}}"></div>
                                            <div class="essential_audio m-3" data-url="{{URL::asset($quiz_question->ng)}}"></div>
                                        </div>
        
                                        <div class="d-flex align-self-md-center align-self-end mb-2">
                                            <a class="me-1" 
                                                style="border-radius: 50%; background-color: #edf8ef; width: 1.5rem; height: 1.5rem; display: flex; justify-content: center" 
                                                href="{{ route('quiz_questions.edit', $quiz_question) }}">
                                                <i class="fa fa-pen" style="align-self: center; color: #34a543"></i> 
                                            </a>
                                            <a class="me-1" 
                                                style="border-radius: 50%; background-color: #ffe8e8; width: 1.5rem; height: 1.5rem; display: flex; justify-content: center" 
                                                href="{{route('quiz_questions.index')}}"
                                                onclick="
                                                var result = confirm('Cette règle sera supprimée');
                                                if(result){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{$quiz_question->id}}').submit();
                                                }">
                                                <i class="fa fa-trash" style="align-self: center; color: #e80000"></i> 
                                            </a>
                                            <form method="POST" id="delete-form-{{$quiz_question->id}}"
                                                action="{{route('quiz_questions.destroy', [$quiz_question])}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="lead" style="font-size: 11px; text-align: justify">{{Str::limit($quiz_question->description, 25)}}</p>
                        </div>
                        @endforeach    
            
                        <div class="my-2">
                            {{ $quiz_questions->links('vendor.pagination.round') }}
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

    <script src="{{ URL::asset('assets/js/essential_audio.js')}}"></script>
@endsection

