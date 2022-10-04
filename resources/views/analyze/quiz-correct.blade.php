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
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-4">Liste des quiz ayant plus de reponses correctes</h5>
                    </div>

                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-rounded waves-effect waves-light mb-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Exporter <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('analyze.export.xlsx.quiz.correct')}}" >Format Excel</a>
                                    <a class="dropdown-item" href="{{route('analyze.export.pdf.quiz.correct')}}">Format PDF</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr >
                            <th scope="col">Illustration</th>
                            <th scope="col">Reponse</th>
                            <th scope="col">Description</th>
                            <th class="col">Catégorie</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quizzes as $quiz)
                            <tr>
                                <td style="width: 150px;"><img src="{{URL::asset($quiz->image)}}" alt=""
                                                               class="avatar-md h-auto d-block rounded">
                                </td>
                                <td style="width: 250px">
                                    @if($quiz->correct)

                                        <a type="button" href="#"
                                           class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-tag me-1"></i> Correct
                                        </a>
                                    @else

                                        <a type="button" href="#"
                                           class="btn btn-danger btn-rounded waves-effect waves-light mb-2 me-2"><i
                                                class="mdi mdi-tag me-1"></i> Faux
                                        </a>
                                    @endif
                                </td>
                                <td style="width: 250px">
                                    <p class="text-muted mb-0 text-justify">{{$quiz->description}}</p>
                                </td>
                                <td class="d-none d-xl-table-cell">
                                    <a type="button" href="{{route('categories.show', $quiz->category)}}"
                                       class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="mdi mdi-tag me-1"></i> {{$quiz->category->name}}
                                    </a>
                                </td>
                                <td style="width: 200px">
                                    <div class="d-flex gap-3">

                                        <a href="{{route('quiz_questions.show', $quiz)}}"
                                           class="btn btn-default">Détails
                                        </a>
                                        <a href="{{route('quiz_questions.edit', $quiz )}}"
                                           class="btn btn-info">Modifier
                                        </a>

                                        <a href="{{route('quiz_questions.show',$quiz)}}" class="btn btn-danger"
                                           onclick="
                                                   var result = confirm('Cette reponse sera supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form').submit();
                                                   }
                                                   ">
                                            Supprimer</a>

                                        <form method="POST" id="delete-form"
                                              action="{{route('quiz_questions.destroy', [$quiz])}}">
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

                {{ $quizzes->links('vendor.pagination.round') }}
            </div>
        </div>
    </div>



@endsection
@section('script')

    <script src="{{ URL::asset('assets/js/essential_audio.js')}}"></script>
@endsection

