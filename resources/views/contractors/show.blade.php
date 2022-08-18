@extends('layouts.master')

@section('title') Sous-traitants @endsection

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

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3">
                <div class="card" style="height: 80vh">
                    <div class="card-body">
                        <span class="tex text-muted pb-1">Entreprise</span>
                        <h4 class="lead mb-4">{{$contractor->name}}</h4>
                        <i class="mdi mdi-phone me-1 "></i><span class="text-muted">Tel</span>
                        <h4 class="lead mb-4">{{$contractor->phone}}</h4>
                        <i class="mdi mdi-map-marker me-1 "></i><span class="text-muted">Adresse</span>
                        <h4 class="lead mb-4">{{$contractor->address}}</h4>
                        @isset($contractor->nif)
                            <i class="mdi mdi-numeric me-1"></i><span class="text-muted">NIF</span>
                            <h4 class="lead mb-4">{{$contractor->nif}}</h4>
                        @endisset
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card">

                        <div class="card-body" style="height: 80vh">
                            <div class="d-flex align-items-start">
                                <div class="me-2">
                                    <h5 class="card-title mb-4">Utilisateurs de cette entreprise</h5>
                                </div>
                                <div class="ms-auto">
                                    <div class="text-sm-end">
                                        <a type="button" href="{{route('contractor_employees', $contractor)}}"
                                           class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2">Exporter
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table align-middle ">
                                    <thead>
                                    <tr>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Numéro de téléphone</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contractorEmployees as $contractorEmployee)
                                        <tr>
                                            <td style="width: 250px">
                                                <p class="text-muted mb-0 text-justify">{{$contractorEmployee->name}}</p>
                                            </td>
                                            <td style="width: 250px">
                                                <p class="text-muted mb-0 text-justify">{{$contractorEmployee->phone}}</p>
                                            </td>
                                            <td style="width: 200px">
                                                <div class="d-flex gap-3">

                                                    <a href="{{route('employees.show', $contractorEmployee)}}"
                                                       class="btn btn-default">Détails
                                                    </a>
                                                    <a href="{{route('employees.edit', $contractorEmployee)}}"
                                                       class="btn btn-info">Modifier
                                                    </a>

                                                    <a href="{{route('employees.index')}}" class="btn btn-danger"
                                                       onclick="
                                                   var result = confirm('Cet utilisateur sera supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form').submit();
                                                   }
                                                   ">
                                                        Supprimer</a>

                                                    <form method="POST" id="delete-form"
                                                          action="{{route('employees.destroy', [$contractorEmployee])}}">
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

                            {{ $contractorEmployees->links('vendor.pagination.round') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




