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

    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3">
                <div class="card">
                    <div class="card-body" style="height: 80vh">
                        <span class="tex text-muted pb-1">Nom</span>
                        <h4 class="lead mb-4">{{$employee->name}}</h4>
                        <i class="mdi mdi-phone me-1 "></i><span class="text-muted">Tel</span>
                        <h4 class="lead mb-4">{{$employee->phone}}</h4>
                        <i class="mdi mdi-map-marker me-1 "></i><span class="text-muted">Identifiant</span>
                        <h4 class="lead mb-4">{{$employee->uid}}</h4>
                        <i class="mdi mdi-map-marker me-1 "></i><span class="text-muted">Mot de passe</span>
                        <h4 class="lead mb-4">{{$employee->password}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="card">

                    <div class="card-body" style="height: 80vh">
                        <div class="d-flex align-items-start">
                            <div class="me-2">
                                <h5 class="card-title mb-4">Utilisateurs de la même entreprise</h5>
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

@endsection




