@extends('layouts.master')

@section('title') Analytique @endsection

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

<div class="row">
    <div class="col-xl-8">
        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="clearfix">
                            <div class="float-end">
                                <div class="input-group input-group-sm">
                                    <select class="form-select form-select-sm">
                                        <option value="JA" selected>Jan</option>
                                        <option value="DE">Dec</option>
                                        <option value="NO">Nov</option>
                                        <option value="OC">Oct</option>
                                    </select>
                                    <label class="input-group-text">Moi</label>
                                </div>
                            </div>
                            <h4 class="card-title mb-4">Présence</h4>
                        </div>
        
                        <div class="row">
                            <div>
                                <div id="line-chart" class="apex-charts" dir="ltr"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <div class="row">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-start">
                            <div class="me-2">
                                <h5 class="card-title mb-3">Lecture par règle</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <a class="text-muted dropdown-toggle font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                    <i class="mdi mdi-dots-horizontal"></i>
                                </a>
            
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                        
            
                        <hr>
            
                        <div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    <div class="py-2">
                                        <h5 class="font-size-14">Quiz 1 <span class="float-end">78%</span></h5>
                                        <div class="progress animated-progess progress-sm">
                                            <div class="progress-bar" role="progressbar" style="width: 78%" aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="py-2">
                                        <h5 class="font-size-14">Quiz 2 <span class="float-end">69%</span></h5>
                                        <div class="progress animated-progess progress-sm">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 69%" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="py-2">
                                        <h5 class="font-size-14">Quiz 3 <span class="float-end">61%</span></h5>
                                        <div class="progress animated-progess progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 61%" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="py-2">
                                        <h5 class="font-size-14">Quiz 4 <span class="float-end">61%</span></h5>
                                        <div class="progress animated-progess progress-sm">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 61%" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-start">
                            <div class="me-2">
                                <h5 class="card-title mb-3">Lecture par règle</h5>
                            </div>
                            <div class="dropdown ms-auto">
                                <a class="text-muted dropdown-toggle font-size-16" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                                    <i class="mdi mdi-dots-horizontal"></i>
                                </a>
            
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </div>
                        </div>
                        
            
                        <hr>
            
                        <div class="row w-100 mb-4">
                            <div class="ms-4 col-4 ps-4 font-size-16">
                                <div class="m-4 text text-rigth">
                                    Texte ok
                                </div>
                                <div class="m-4">
                                    Texte
                                </div>
                                <div class="m-4">
                                    Texte
                                </div>
                                <div class="m-4">
                                    Texte
                                </div>
                                <div class="m-4">
                                    Texte
                                </div>
                                <div class="m-4 mb-0">
                                    Texte
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="smart-progress">
                                    <div class="progress-outer mt-4">
                                        <div class="progress animated-progess bg-white">
                                            <div class="progress-bar bg-success progress-bar-info" style="width:80%;"></div>
                                            <div class="progress-value">80%</div>
                                        </div>
                                    </div>
                                    <div class="progress-outer mt-4">
                                        <div class="progress animated-progess bg-white">
                                            <div class="progress-bar bg-warning progress-bar-success" style="width:60%;"></div>
                                            <div class="progress-value">60%</div>
                                        </div>
                                    </div>
                                    <div class="progress-outer mt-4">
                                        <div class="progress animated-progess bg-white">
                                            <div class="progress-bar bg-danger progress-bar-warning" style="width:20%;"></div>
                                            <div class="progress-value">20%</div>
                                        </div>
                                    </div>
                                    <div class="progress-outer mt-4">
                                        <div class="progress animated-progess bg-white">
                                            <div class="progress-bar bg-dark progress-bar-warning" style="width:40%;"></div>
                                            <div class="progress-value">40%</div>
                                        </div>
                                    </div>
                                    <div class="progress-outer mt-4">
                                        <div class="progress animated-progess bg-white">
                                            <div class="progress-bar bg-primary progress-bar-warning" style="width:40%;"></div>
                                            <div class="progress-value">40%</div>
                                        </div>
                                    </div>
                                    <div class="progress-outer mt-4">
                                        <div class="progress animated-progess bg-white">
                                            <div class="progress-bar progress-bar-warning" style="width:40%;"></div>
                                            <div class="progress-value">40%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4">
        Profil
    </div>
</div>
@endsection

@section('script')
    <script src="{{ URL::asset('/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/libs/jquery-knob/jquery-knob.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/jquery-knob.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/saas-dashboard.init.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/pages/apexcharts.init.js') }}"></script>
    <script src="{{ URL::asset('assets/js/essential_audio.js')}}"></script>
@endsection


