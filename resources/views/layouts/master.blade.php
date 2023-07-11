<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8"/>
    <title> @yield('title') | Accueil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.png') }}">
    @include('layouts.head-css')
    @livewireStyles
</head>

@section('body')

<div class="modal fade update-profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myLargeModalLabel">Editer votre profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="update-profile">
                    @csrf
                    <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                    <div class="mb-3">
                        <label for="useremail" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail" value="{{ Auth::user()->email }}" name="email" placeholder="Enter email" autofocus>
                        <div class="text-danger" id="emailError" data-ajax-feedback="email"></div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="username" class="form-label">Nom</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" id="username" name="name" autofocus placeholder="Enter username">
                        <div class="text-danger" id="nameError" data-ajax-feedback="name"></div>
                    </div>
                    
                    @if (Auth::user()->role == 'transporteur')
                        <div class="mb-3">
                            <label for="phone" class="form-label">Numéro de téléphone</label>
                            <input required 
                            type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                value="{{isset(Auth::user()->carrier->phone)?Auth::user()->carrier->phone:null}}"
                                id="phone" name="phone" placeholder="Entrez le numéro de téléphone du sous-traitant">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>Nom invalid</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Adresse</label>
                            <input required type="text" class="form-control form-control-lg @error('address') is-invalid @enderror"
                                value="{{isset(Auth::user()->carrier->address)?Auth::user()->carrier->address:null}}"
                                id="address" name="address" placeholder="Entrez l'adresse du sous-traitant">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>Nom invalid</strong>
                            </span>
                            @enderror
                        </div>
                        @endif

                    <div class="mb-3">
                        <label for="avatar">Photo de profile</label>
                        <div class="input-group">
                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar" autofocus>
                            <label class="input-group-text" for="avatar">Upload</label>
                        </div>
                        <div class="text-start mt-2">
                            <img src="{{ asset(Auth::user()->avatar) }}" alt="" class="rounded-circle avatar-lg">
                        </div>
                        <div class="text-danger" role="alert" id="avatarError" data-ajax-feedback="avatar"></div>
                    </div>
                    
                    <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light UpdateProfile" data-id="{{ Auth::user()->id }}" type="submit">Modifier</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>



    <body data-sidebar="dark">
    @show
    <!-- Begin page -->
    <div id="layout-wrapper">
    @include('layouts.topbar')
    @include('layouts.sidebar')
    <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            @include('layouts.footer')
        </div>
        <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    @include('layouts.vendor-scripts')

    <script>
        $('#search').click(function(e){
            window.location.href = "/search/"+ $('#search-input').val();
         });
    </script>
    <script>
        $('#search-input').on('keypress', function(e){
            if(e.which == 13){
                e.preventDefault();
                window.location.href = "/search/"+ e.target.value;
            }
         });
    </script>
    @livewireScripts
    @stack('script')
    </body>

</html>
