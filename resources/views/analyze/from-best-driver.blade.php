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
                        <h5 class="card-title mb-4">Lecture par chauffeur</h5>
                    </div>
                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <div class="btn-group   !spacing" role="group">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-rounded waves-effect waves-light mb-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Exporter <i class="mdi mdi-chevron-down"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('drivers.export.xlsx')}}" >Format Excel</a>
                                        <a class="dropdown-item" href="{{route('drivers.export.pdf')}}">Format PDF</a>
                                    </div>
                                </div>
                                
                                <a type="button" href="{{route('drivers.create')}}"
                                    class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                    class="mdi mdi-plus me-1"></i> Ajouter
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr>
                            <th class="text-center" scope="col">Avatar</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Transporteur</th>
                            <th scope="col">Numéro de téléphone</th>
                            <th scope="col">Clé OBC</th>
                            <th class="text-center" scope="col">Lecture</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($drivers as $driver)
                        @can('view', $driver)
                            <tr>
                                <td class="text-center">
                                    <img class="rounded-circle" src="{{asset($driver->avatar)}}" alt="avatar" height="35" width="35">
                                </td>
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
                                    <p class="text-muted mb-0 text-justify">{{$driver->readings_count}}</p>
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
    <script>
        $('')
    </script>
    <script src="{{ URL::asset('assets/js/essential_audio.js')}}"></script>
@endsection


