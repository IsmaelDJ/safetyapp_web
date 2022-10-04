@extends('layouts.master')

@section('title') transporteurs @endsection

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

    <div class="card" >
        <div class="row g-0">

            <div class="col-xl-4">
                <div class="auth-full-page-content p-md-5 p-4">
                    <div class="w-100">

                        <h4 class="card-title mb-4">Modifier le transporteur</h4>

                        <form action="{{route('carriers.update', $carrier)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input 
                                    type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                    value="{{$carrier->name}}"
                                    id="name" name="name" placeholder="Entrez le nom du transporteur">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Nom invalid</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Numéro de téléphone</label>
                                <input type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                       value="{{$carrier->phone}}"
                                       id="phone" name="phone" placeholder="Entrez le numéro de téléphone du transporteur">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Nom invalid</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Adresse</label>
                                <input type="text" class="form-control form-control-lg @error('address') is-invalid @enderror"
                                       value="{{$carrier->address}}"
                                       id="address" name="address" placeholder="Entrez l'adresse du transporteur">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Nom invalid</strong>
                                </span>
                                @enderror
                            </div>
                            
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Enregistrer</button>
                            </div>
                            <input type="hidden" name="_method" value="put">
                        </form>

                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="auth-full-bg pt-lg-5 p-4">
                    <div class="w-100">
                    </div>
                </div>
            </div>
            <!-- end col -->

            <!-- end col -->
        </div>
        <!-- end row -->
    </div>


@endsection

