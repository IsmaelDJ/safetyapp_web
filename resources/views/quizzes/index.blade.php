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
                        <h5 class="card-title mb-4">Liste de quiz</h5>
                    </div>
                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <a type="button" href="{{route('quizzes.create')}}"
                               class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                    class="mdi mdi-plus me-1"></i> Ajouter
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr>
                            <th class="align-middle">Image</th>
                            <th class="align-middle">Nom</th>
                            <th class="align-middle">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($quizzes as $quiz)
                            <tr>
                                <td style="width: 150px;"><img src="{{URL::asset($quiz->image)}}" alt=""
                                                               class="avatar-md h-auto d-block rounded"></td>
                                <td >
                                    <p class="text-muted mb-0 text-justify">{{$quiz->name}}</p>
                                </td>
                                <td  style="width: 200px">
                                    <div class="d-flex gap-3">
                                        <a href="{{route('quizzes.show', $quiz)}}"
                                           class="btn btn-default">Détails
                                        </a>
                                        <a href="{{route('quizzes.edit', $quiz)}}"
                                           class="btn btn-info">Modifier
                                        </a>

                                        <a href="{{route('quizzes.index')}}" class="btn btn-danger"
                                           onclick="
                                                   var result = confirm('Ce quiz et son contenu seront supprimés');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form').submit();
                                                   }
                                                   ">
                                            Supprimer</a>

                                        <form method="POST" id="delete-form"
                                              action="{{route('quizzes.destroy', [$quiz])}}">
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
        <!-- end card -->
    </div>
@endsection

@section('script')

@endsection


