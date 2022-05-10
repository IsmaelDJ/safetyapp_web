@extends('layouts.master')

@section('title') Catégories @endsection

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

    <div class="card">

        <div class="row g-0">
            <form action="{{route('rules.store')}}" method="post" enctype="multipart/form-data" class="col-xl-8">
                @csrf

                <div class="row g-0">


                    <div class="col-xl-5">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                {{--                            <h4 class="card-title mb-4">Ajouter une catégorie</h4>--}}


                                <div class="mb-3">
                                    <label for="image" class="form-label">Image</label>
                                    <img id="ruleImage" class="img-fluid mb-1"
                                         src="{{URL::asset('assets/images/placeholder_rule.png')}}">
                                    <input class="form-control form-control-lg @error('image') is-invalid @enderror"
                                           id="image"
                                           name="image" type="file" onchange="PreviewImage();">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>Image invalide</strong>
                                </span>
                                    @enderror
                                </div>


                            </div>
                        </div>
                    </div>

                    <div class="col-xl-7">
                        <div class="bg-soft pt-lg-5 p-4 col-md-10">
                            <div class="w-100">

                                <label class="col-md-2 col-form-label">Catégorie</label>
                                <div>
                                    <select
                                        class="form-select form-select-lg @error('category_id') is-invalid @enderror"
                                        name="category_id">
                                        <option selected>Selectionnez une catégorie</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">
                                                <img src="{{URL::asset($category->image)}}" alt="">
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>Catégorie non selectionnée</strong>
                                </span>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="description" class="form-label">Description</label>
                                    <input type="text"
                                           class="form-control form-control-lg @error('description') is-invalid @enderror"
                                           value="{{old('description')}}"
                                           id="description" name="description"
                                           placeholder="Entrez la description de la règle">
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>Description invalid</strong>
                                </span>
                                    @enderror
                                </div>


                                <div class="mt-5">
                                    <div class="mb-3">
                                        <label for="fr" class="form-label">Audio Français</label>
                                        <input class="form-control form-control-lg @error('fr') is-invalid @enderror"
                                               id="fr"
                                               name="fr" type="file">
                                        @error('fr')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>Audio invalide</strong>
                                </span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label for="ar" class="form-label">Audio Arabe</label>
                                        <input class="form-control form-control-lg @error('ar') is-invalid @enderror"
                                               id="ar"
                                               name="ar" type="file">
                                        @error('ar')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>Audio invalide</strong>
                                </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="ng" class="form-label">Audio Ngambaye</label>
                                        <input class="form-control form-control-lg @error('ng') is-invalid @enderror"
                                               id="ng"
                                               name="ng" type="file">
                                        @error('ng')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>Audio invalide</strong>
                                </span>
                                        @enderror
                                    </div>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Enregistrer</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- end col -->

                    <!-- end col -->
                </div>

            </form>
            <div class="col-xl-4 auth-full-bg">

            </div>
        </div>
        <!-- end row -->
    </div>


@endsection
@section('script')
    <script>
        function PreviewImage() {
            var oFReader = new FileReader();
            oFReader.readAsDataURL(document.getElementById("image").files[0]);

            oFReader.onload = function (oFREvent) {
                document.getElementById("ruleImage").src = oFREvent.target.result;
            };
        };
    </script>
@endsection
