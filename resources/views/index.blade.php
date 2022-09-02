@extends('layouts.master')

@section('title') @lang('translation.Starter_Page') @endsection

@section('content')

    @component('components.breadcrumb')
        @slot('li_1') Utility @endslot
        @slot('title') Starter Page @endslot
    @endcomponent
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <img src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('/assets/images/users/avatar-1.jpg') }}" alt="" class="avatar-md rounded-circle img-thumbnail">
                                </div>
                                <div class="flex-grow-1 align-self-center">
                                    <div class="text-muted">
                                        <p class="mb-2">Bienvenu sur Safety Analytique</p>
                                        <h5 class="mb-1">{{ Auth::user()->name ? Auth::user()->name : "Nom et Prénom" }}</h5>
                                        <p class="mb-0">{{ Auth::user()->email ? Auth::user()->email : "Adresse email" }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 align-self-center">
                            <div class="text-lg-center mt-4 mt-lg-0">
                                <div class="row">
                                    <div class="col-4">
                                        <div>
                                            <p class="text-muted text-truncate mb-2">Règles</p>
                                            <h5 class="mb-0">{{ $total_rules }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div>
                                            <p class="text-muted text-truncate mb-2">Quiz</p>
                                            <h5 class="mb-0">{{ $total_quizzes }}</h5>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div>
                                            <p class="text-muted text-truncate mb-2">Employés</p>
                                            <h5 class="mb-0">{{ $total_employees }}</h5>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4 d-none d-lg-block">
                            <div class="clearfix mt-4 mt-lg-0">
                                <div class="dropdown float-end">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fa fa-edit"></i> Editer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>
@endsection
