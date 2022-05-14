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
                        <h5 class="card-title mb-4">Liste de sous-traitants</h5>
                    </div>
                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <a type="button" href="{{route('contractors.create')}}"
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
                            <th class="align-middle">Nom</th>
                            <th class="align-middle">Numéro de téléphone</th>
                            <th class="align-middle">Adresse</th>
                            <th class="align-middle">NIF</th>
                            <th class="align-middle">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contractors as $contractor)
                            <tr>
                                <td >
                                    <p class="text-muted mb-0 text-justify">{{$contractor->name}}</p>
                                </td>
                                <td >
                                    <p class="text-muted mb-0 text-justify">{{$contractor->phone}}</p>
                                </td>
                                <td >
                                    <p class="text-muted mb-0 text-justify">{{$contractor->address}}</p>
                                </td>
                                <td >
                                    <p class="text-muted mb-0 text-justify">{{$contractor->nif}}</p>
                                </td>
                                <td  style="width: 200px">
                                    <div class="d-flex gap-3">
                                        <a href="{{route('contractors.show', $contractor)}}"
                                           class="btn btn-default">Détails
                                        </a>
                                        <a href="{{route('contractors.edit', $contractor)}}"
                                           class="btn btn-info">Modifier
                                        </a>

                                        <a href="{{route('contractors.index')}}" class="btn btn-danger"
                                           onclick="
                                                   var result = confirm('Ce contractant et ses employés seront supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form').submit();
                                                   }
                                                   ">
                                            Supprimer</a>

                                        <form method="POST" id="delete-form"
                                              action="{{route('contractors.destroy', [$contractor])}}">
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

                {{ $contractors->links('vendor.pagination.round') }}
            </div>
        </div>
        <!-- end card -->
    </div>

@endsection




