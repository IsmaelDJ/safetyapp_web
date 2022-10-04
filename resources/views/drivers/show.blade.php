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
                    <div class="card-body" style="height: 100vh">
                        <div class="card-body">
                            <img src="{{URL::asset($driver->avatar)}}" alt="" class="img-fluid rounded mb-4">
                            <h5 class="card-title">{{$driver->name}}</h5>
                        </div>
                        <i class="mdi mdi-phone me-1 "></i><span class="text-muted">Tel</span>
                        <h4 class="lead mb-4">{{$driver->phone}}</h4>
                        <i class="mdi mdi-key me-1 "></i><span class="text-muted">Clé OBC</span>
                        <h4 class="lead mb-4">{{$driver->obc}}</h4>
                        <i class="mdi mdi-map-marker me-1 "></i><span class="text-muted">Mot de passe</span>
                        <h4 class="lead mb-4">{{$driver->password}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-xl-9">
                <div class="row">
                    <div class="card col-xl-10">
                        <div class="mb-4" >
                            <div class="card-body">
                                <h4 class="card-title mb-4">Taux de lecture par mois</h4>
                                <hr>
                                <div class="card-block">
                                    {!! $readingChart->container() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4 text-center">Statistique</h4>
                                
                                <hr>
                                
                                <div class="row mt-4">
                                    <span class="fw-bold col-xl-12 text-center">Règles Lus </span>
                                    <span class="text text-muted col text-center">{{ $total_rules }}</span>
                                </div>
                                <div class="row mt-4">
                                    <span class="fw-bold col-xl-12 text-center">Quiz pratiqués </span>
                                    <span class="text text-muted col text-center">{{ $total_quizzes }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-start">
                                <div class="me-2">
                                    <h5 class="card-title mb-4">Détails</h5>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-middle ">
                                    <thead>
                                    <tr>
                                        <th scope="col">Action</th>
                                        <th class="text text-center"><span>Date</span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr>
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
                        </div>
                        <div class="card-footer">
                            {{ $data->links('vendor.pagination.round') }}
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        
    </div>

@endsection

@section('script')
{!! $readingChart->script() !!}
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
@endsection


