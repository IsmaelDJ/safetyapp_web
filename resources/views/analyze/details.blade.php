@extends('layouts.master')

@section('title') Règles @endsection

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
    <!-- end col -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-4">Liste des règles</h5>
                    </div>
                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <a type="button" href="{{route('rules.create')}}"
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
                            <th scope="col">Utilisateur</th>
                            <th scope="col">Action</th>
                            <th class="text text-center"><span>Date</span></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td style="width: 30%">
                                    <p class="text-muted m-3 text-justify">{{ $item->employee->name }}</p>
                                </td>
                                <td >
                                    @if ($item->type == 1)
                                        <p class="text-muted m-1 text-justify"><a href="{{ route('quiz_questions.show', $item->action) }}">Quiz : {{str::limit( $item->action->description, $limit = 100, $end = '...')}}</a></p>
                                    @elseif($item->type == 2)
                                    <p class="text-muted m-1 text-justify"><a href="{{ route('rules.show', $item->action) }}">Règle : {{str::limit( $item->action->description, $limit = 100, $end = '...')}}</a></p>
                                    @else
                                        <p class="text-muted m-1 text-justify">{{str::limit( $item->action, $limit = 100, $end = '...')}}</p>
                                    @endif
                                </td>
                                <td style="width: 20%;">
                                    <p class="text-muted m-1 text-center">{{ $item->created_at }}</p>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>


                </div>

                {{ $data->links('vendor.pagination.round') }}
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
@endsection

@section('script')

    <script src="{{ URL::asset('assets/js/essential_audio.js')}}"></script>
@endsection
