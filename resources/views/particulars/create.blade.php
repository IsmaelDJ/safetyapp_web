@extends('layouts.master')

@section('title') Particulier @endsection

@section('css')
    <!-- Bootstrap Css -->
    <link href="{{ URL::asset('/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
          type="text/css"/>
    <!-- Icons Css -->
    <link href="{{ URL::asset('/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>
    <!-- App Css-->
    <link href="{{ URL::asset('/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css"/>
    <link href="{{ URL::asset('/assets/libs/dropzone/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')

    <div class="card" >
        <div class="row g-0">

            <div class="col-xl-4">
                <div class="auth-full-page-content p-md-5 p-4">
                    <div class="w-100">

                        <h4 class="card-title mb-4">Ajouter un particulier</h4>

                        <form action="{{route('particulars.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <div>
                                    <label for="avatar" class="form-label">Photo de profile</label>
                                </div>
                                <img id="driverAvatar" class="img-fluid mb-1" src="{{URL::asset('assets/images/placeholder_category.png')}}">
                                <input class="form-control form-control-lg @error('image') is-invalid @enderror" id="avatar"
                                       name="avatar" type="file" onchange="PreviewImage();" >
                                @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Image invalide</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                                       value="{{old('name')}}"
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
                                       value="{{old('phone')}}"
                                       id="phone" name="phone" placeholder="Entrez le numéro de téléphone du sous-traitant">
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Nom invalid</strong>
                                </span>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Enregistrer</button>
                            </div>
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

@section('script')
    <script>
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("avatar").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("driverAvatar").src = oFREvent.target.result;
            };
        };
    </script>
@endsection
