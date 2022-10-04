
@extends('layouts.master-without-nav')

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



    <!-- end col -->
    <div class="col-xl-8 ms-auto me-auto mt-5">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-4">Liste des transporteurs</h5>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr>
                            <th class="text-center" scope="col">N°</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Adresse</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carriers as $carrier)
                        <tr>
                            <td class="text-center">{{$carrier->number}}</td>
                            <td>{{$carrier->name}}</td>
                            <td>{{$carrier->phone}}</td>
                            <td>{{$carrier->address}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>


            </div>

        </div>
    </div>
    <!-- end card -->
</div>
<!-- end col -->
@endsection

@section('script')

<script>window.print()</script>
@endsection