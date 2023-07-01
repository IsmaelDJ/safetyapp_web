
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
                        <h5 class="card-title mb-4">Liste des règles lus</h5>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                            <tr >
                                <th scope="col">N°</th>
                                <th scope="col">Description</th>
                                <th scope="col">Catégorie</th>
                                <th class="col">Nombre de lecture</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($rules as $rule)
                            <tr>
                                <td style="width: 150px;">
                                    <p>{{$loop->iteration}}</p>
                                </td>
                                <td style="width: 350px">
                                    <p class="text-muted mb-0 text-justify">{{$rule->description}}</p>
                                </td>
                                <td class="d-none d-xl-table-cell">
                                   {{$rule->category->name}}
                                </td>
                                <td style="width: 250px">
                                    <p class="text-muted mb-0 text-justify">{{$rule->readings_count}}</p>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>window.print()</script>
@endsection
