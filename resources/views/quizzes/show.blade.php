@extends('layouts.master')

@section('title') Quiz @endsection

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

@if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@section('content')
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body" style="height: 100vh;">
                        <img src="{{URL::asset($quiz->image)}}" alt="" class="img-fluid rounded mb-4">
                        <h5 class="card-title">{{$quiz->name}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-8">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="me-2">
                                <h5 class="card-title mb-4">Questions</h5>
                            </div>

                            <div class="ms-auto">
                                <div class="text-sm-end">
                                    <a type="button" href="{{route('quiz_questions.create', $quiz)}}"
                                       class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="mdi mdi-plus me-1"></i> Ajouter une question
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle ">
                                <thead>
                                <tr>
                                    <th scope="col">Illustration</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Audio Français</th>
                                    {{--                                    <th scope="col">Audio Arabe</th>--}}
                                    {{--                                    <th scope="col">Audio Ngambaye</th>--}}
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($quizQuestions as $quizQuestion)
                                    <tr>
                                        <td style="width: 150px;"><img src="{{URL::asset($quizQuestion->image)}}" alt=""
                                                                       class="avatar-md h-auto d-block rounded"></td>
                                        <td style="width: 250px">
                                            <p class="text-muted mb-0 text-justify">{{$quizQuestion->description}}</p>
                                        </td>
                                        <td >
                                            <div class="essential_audio" data-url="{{URL::asset($quizQuestion->fr)}}"></div>
                                        </td>
                                        {{--                                        <td>--}}
                                        {{--                                            <div class="essential_audio" data-url="{{URL::asset($categoryRule->ar)}}" ></div>--}}
                                        {{--                                        </td>--}}
                                        {{--                                        <td>--}}
                                        {{--                                            <div class="essential_audio" data-url="{{URL::asset($categoryRule->ng)}}" ></div>--}}
                                        {{--                                        </td>--}}
                                        <td style="width: 200px">
                                            <div class="d-flex gap-3">

                                                <a href="{{route('quiz_questions.show', $quizQuestion)}}"
                                                   class="btn btn-default">Détails
                                                </a>
                                                <a href="{{route('quiz_questions.edit', $quizQuestion )}}"
                                                   class="btn btn-info">Modifier
                                                </a>

                                                <a href="{{route('quiz_questions.index')}}" class="btn btn-danger"
                                                   onclick="
                                                   var result = confirm('Cette question sera supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form').submit();
                                                   }
                                                   ">
                                                    Supprimer</a>

                                                <form method="POST" id="delete-form"
                                                      action="{{route('quiz_questions.destroy', [$quizQuestion])}}">
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

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')

    <script src="{{ URL::asset('assets/js/essential_audio.js')}}"></script>
@endsection


