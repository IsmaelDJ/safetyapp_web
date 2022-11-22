@extends('layouts.master')

@section('title') Transporteurs @endsection

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
                        <h5 class="card-title mb-4">Liste de transporteurs</h5>
                    </div>
                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <div class="btn-group">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-info btn-rounded waves-effect waves-light mb-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Exporter <i class="mdi mdi-chevron-down"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('carriers.export.xlsx')}}" >Format Excel</a>
                                        <a class="dropdown-item" href="{{route('carriers.export.pdf')}}">Format PDF</a>
                                    </div>
                                </div>
                                <a type="button" href="{{route('register')}}"
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
                            <th class="text-center" scope="col">Image</th>
                            <th class="align-middle">Nom</th>
                            <th class="align-middle">Numéro de téléphone</th>
                            <th class="align-middle">Adresse</th>
                            <th class="align-middle">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($carriers as $carrier)
                            <tr>
                                <td class="text-center">
                                    <img class="rounded-circle" src="{{asset($carrier->user->avatar)}}" alt="avatar" height="35" width="35">
                                </td>
                                <td >
                                    <p class="text-muted mb-0 text-justify">{{$carrier->user->name}}</p>
                                </td>
                                <td >
                                    <p class="text-muted mb-0 text-justify">{{$carrier->phone}}</p>
                                </td>
                                <td >
                                    <p class="text-muted mb-0 text-justify">{{$carrier->address}}</p>
                                </td>
                             
                                <td  style="width: 200px">
                                    <div class="d-flex gap-3">
                                        <a href="{{route('carriers.show', $carrier)}}"
                                           class="btn btn-default">Détails
                                        </a>
                                        <a href="{{route('carriers.edit', $carrier)}}"
                                           class="btn btn-info">Modifier
                                        </a>

                                        <a href="{{route('carriers.index')}}" class="btn btn-danger"
                                           onclick="
                                                   var result = confirm('Ce contractant et ses employés seront supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form').submit();
                                                   }
                                                   ">
                                            Supprimer</a>

                                        <form method="POST" id="delete-form"
                                              action="{{route('carriers.destroy', [$carrier])}}">
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

                {{ $carriers->links('vendor.pagination.round') }}
            </div>
        </div>
        <!-- end card -->
    </div>

@endsection




