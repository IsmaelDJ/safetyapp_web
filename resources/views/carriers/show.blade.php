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
                        <div class="card-body">
                            <img src="{{URL::asset($carrier->user->avatar)}}" alt="" class="img-fluid rounded mb-4" width="300" height="100">
                            <h5 class="card-title">{{$carrier->user->name}}</h5>
                        </div>
                        <i class="mdi mdi-map-marker me-1 "></i><span class="text-muted">E-mail</span>
                        <h4 class="lead mb-4">{{$carrier->user->email}}</h4>
                        <i class="mdi mdi-phone me-1 "></i><span class="text-muted">Tel</span>
                        <h4 class="lead mb-4">{{$carrier->phone}}</h4>
                        <i class="mdi mdi-map-marker me-1 "></i><span class="text-muted">Adresse</span>
                        <h4 class="lead mb-4">{{$carrier->address}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="card">
                    <div class="card">

                        <div class="card-body" style="height: 80vh">
                            <div class="d-flex align-items-start">
                                <div class="me-2">
                                    <h5 class="card-title mb-4">Chauffeurs de ce transporteur</h5>
                                </div>
                                <div class="ms-auto">
                                    <div class="text-sm-end">
                                        <a type="button" href="{{route('carrier_drivers', $carrier)}}"
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
                                    @foreach($carrierDrivers as $carrierDriver)
                                        <tr>
                                            <td style="width: 250px">
                                                <p class="text-muted mb-0 text-justify">{{$carrierDriver->name}}</p>
                                            </td>
                                            <td style="width: 250px">
                                                <p class="text-muted mb-0 text-justify">{{$carrierDriver->phone}}</p>
                                            </td>
                                            <td style="width: 200px">
                                                <div class="d-flex gap-3">

                                                    <a href="{{route('drivers.show', $carrierDriver)}}"
                                                       class="btn btn-default">Détails
                                                    </a>
                                                    <a href="{{route('drivers.edit', $carrierDriver)}}"
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
                                                          action="{{route('drivers.destroy', [$carrierDriver])}}">
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

                            {{ $carrierDrivers->links('vendor.pagination.round') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection




