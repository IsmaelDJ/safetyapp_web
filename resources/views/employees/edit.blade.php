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

    <div class="card" >
        <div class="row g-0">

            <div class="col-xl-4">
                <div class="auth-full-page-content p-md-5 p-4">
                    <div class="w-100">

                        <h4 class="card-title mb-4">Modifier l'utilisateur</h4>

                        <form action="{{route('employees.update', $employee)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                       value="{{$employee->name}}"
                                       id="name" name="name" placeholder="Entrez le nom de l'utilisateur">
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Nom invalid</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Numéro de téléphone</label>
                                <input type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                       value="{{$employee->phone}}"
                                       id="phone" name="phone" placeholder="Entrez le numéro de téléphone du sous-traitant">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Nom invalid</strong>
                                </span>
                                @enderror
                            </div>

                            <label class="col-md-2 col-form-label">Entreprise</label>
                            <div class="mb-4">
                                <select
                                    class="form-select form-select-lg @error('contractor_id') is-invalid @enderror"
                                    name="contractor_id">
                                    <option selected value="{{$employee->contractor->id}}">{{$employee->contractor->name}}</option>
                                    @foreach($contractors as $contractor)
                                        <option value="{{$contractor->id}}">
                                            {{$contractor->name}}
                                        </option>
                                    @endforeach
                                </select>
                                @error('contractor_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Entreprise non selectionnée</strong>
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

