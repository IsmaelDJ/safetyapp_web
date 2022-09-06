@extends('layouts.master-without-nav')

@section('title')
    @lang('translation.Register')
@endsection

@section('css')
    <!-- owl.carousel css -->
    <link rel="stylesheet" href="{{ URL::asset('/assets/libs/owl.carousel/owl.carousel.min.css') }}">
    <link href="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('body')

    <body>
    @endsection

    @section('content')

        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">
                            <div class="bg-primary bg-soft">
                                <div class="row">
                                    <div class="col-7">
                                        <div class="text-primary p-4">
                                            <h5 class="text-primary">Bienvenue !</h5>
                                            <p>Créez votre compte maintenant.</p>
                                        </div>
                                    </div>
                                    <div class="col-5 align-self-end">
                                        <img src="{{ URL::asset('/assets/images/total.png') }}" alt=""
                                             class="img-fluid">
                                    </div>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                <div>
                                    <a href="index">
                                        <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{ URL::asset('/assets/images/logo.svg') }}" alt=""
                                                     class="rounded-circle" height="34">
                                            </span>
                                        </div>
                                    </a>
                                </div>
                                <div class="p-2">
                                    <form method="POST" class="form-horizontal" action="{{ route('storeUser') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="useremail" class="form-label">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail"
                                                   value="{{ old('email') }}" name="email" placeholder="Entrez votre adresse email" autofocus required>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>Adresse email invalide</strong>
                                                        </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="username" class="form-label">Nom</label>
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                   value="{{ old('name') }}" id="username" name="name" autofocus required
                                                   placeholder="Entrez votre nom">
                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>Nom invalid</strong>
                                                        </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Mot de passe</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="userpassword" name="password"
                                                   placeholder="Enter un mot de passe" autofocus required>
                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>Mot de passe invalide</strong>
                                                        </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="confirmpassword" class="form-label">Confirmer le mot de passe</label>
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="confirmpassword"
                                                   name="password_confirmation" placeholder="Repetez le mot de passe" autofocus required>
                                            @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>Mot de passe invalide</strong>
                                                        </span>
                                            @enderror
                                        </div>


                                        <div class="mb-3">
                                            <label for="avatar">Photo de profile</label>
                                            <div class="input-group">
                                                <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="inputGroupFile02" name="avatar" autofocus required>
                                                <label class="input-group-text" for="inputGroupFile02">Téléverser</label>
                                            </div>
                                            @error('avatar')
                                            <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                            @enderror
                                        </div>

                                        <div class="mt-4 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light"
                                                    type="submit">Créer</button>
                                        </div>


                                    </form>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endsection
    @section('script')
        <!-- validation init -->
        <script src="{{ URL::asset('/assets/js/pages/validation.init.js') }}"></script>
        <script src="{{ URL::asset('/assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
@endsection
