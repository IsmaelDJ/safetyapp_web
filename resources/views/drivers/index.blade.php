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
                        <h5 class="card-title mb-4">Liste des chauffeurs</h5>
                    </div>
                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <a type="button" href="{{route('drivers.create')}}"
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
                            <th scope="col">Nom</th>
                            <th scope="col">Transporteur</th>
                            <th scope="col">Numéro de téléphone</th>
                            <th scope="col">Clé OBC</th>
                            <th scope="col">Mot de passe</th>
                            <th class="text-center" scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($drivers as $driver)
                        @can('view', $driver)
                            <tr>
                                <td>
                                    <p class="text-muted mb-0 text-justify">{{$driver->name}}</p>
                                </td>
                                <td>
                                    <div>
                                        <a href="{{route('carriers.show', $driver->user)}}"
                                           class=" mb-2 me-2">
{{--                                            <i class="mdi mdi-tag me-1"></i>--}}
                                            {{$driver->user->name}}
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <p class="text-muted mb-0 text-justify">{{$driver->phone}}</p>
                                </td>
                                <td>
                                    <p class="text-muted mb-0 text-justify">{{$driver->obc}}</p>
                                </td>
                                <td>
                                    <p class="text-muted mb-0 text-justify">{{$driver->password}}</p>
                                </td>

                                <td style="width: 200px">
                                    <div class="d-flex gap-3">

                                        <a href="{{route('drivers.show', $driver)}}"
                                           class="btn btn-default">Détails
                                        </a>
                                        <a href="{{route('drivers.edit', $driver)}}"
                                           class="btn btn-info">Modifier
                                        </a>

                                        <a href="{{route('drivers.index')}}" class="btn btn-danger"
                                           onclick="
                                                   var result = confirm('Cet utilisateur sera supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form').submit();
                                                   }
                                                   ">
                                            Supprimer</a>

                                        <form method="POST" id="delete-form"
                                              action="{{route('drivers.destroy', [$driver])}}">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endcan
                        @endforeach

                        </tbody>
                    </table>


                </div>

                {{ $drivers->links('vendor.pagination.round') }}
            </div>
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
@endsection

@section('script')

    <script src="{{ URL::asset('assets/js/essential_audio.js')}}"></script>
@endsection


