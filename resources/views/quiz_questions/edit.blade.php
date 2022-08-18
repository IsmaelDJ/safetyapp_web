@extends('layouts.master')

@section('title') Questions @endsection

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
            <form action="{{route('quiz_questions.update',$quizQuestion)}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">


                    <div class="col-md-5 col-xl-4">
                        <div class="auth-full-page-content p-md-5 p-4">
                            <div class="w-100">

                                <div class="mb-3">
                                    <div>
                                        <label for="image" class="form-label">Image</label>
                                    </div>

                                    <img id="ruleImage" class="img-fluid mb-1"
                                         src="{{URL::asset($quizQuestion->image)}}">

                                    <input class=" form-control form-control-lg @error('image') is-invalid @enderror"
                                           id="image"
                                           name="image" type="file" onchange="PreviewImage();">
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>Image invalide</strong>
                                </span>
                                    @enderror
                                </div>
<<<<<<< HEAD
=======


>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 col-xl-7">
                        <div class="bg-soft pt-lg-5 p-4 col-md-10">
                            <div class="w-100">
<<<<<<< HEAD
                                <div class="w-100">
                                    <label class="col-form-label">Catégorie</label>
                                    <div>
                                        <select
                                            class="form-select form-select-lg @error('category_id') is-invalid @enderror"
                                            name="category_id">
                                            
                                            @foreach($categories as $category)
                                                @if( $quizQuestion->category_id == $category->id)
                                                <option selected value="{{$category->id}}">
                                                    <img src="{{URL::asset($category->image)}}" alt="">
                                                    {{$category->name}}
                                                </option>
                                                @else
                                                <option value="{{$category->id}}">
                                                    <img src="{{URL::asset($category->image)}}" alt="">
                                                    {{$category->name}}
                                                </option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Catégorie non selectionnée</strong>
                                        </span>
                                        @enderror
                                    </div>
                               
                                <div class="w-100">
                                    <label class="col-form-label">Réponse</label>
                                    <div>
                                        <select
                                            class="form-select form-select-lg @error('correct') is-invalid @enderror"
                                            name="correct">
                                            @if($quizQuestion->correct)
    
                                                <option value="true" selected>
                                                    Reponse correcte
                                                </option>
                                                <option value="false">
                                                    Reponse incorrecte
                                                </option>
                                            @else
    
                                                <option value="true">
                                                    Reponse correcte
                                                </option>
                                                <option value="false" selected>
                                                    Reponse incorrecte
                                                </option>
                                            @endif
                                        </select>
                                        @error('correct')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Valeur de reponse non selectionnée</strong>
                                        </span>
                                        @enderror
                                </div>
=======
>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60

                                <div class="mb-3 mt-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea id="" description placeholder="Entrez la question"
                                              name="description"
                                              class="form-control form-control-lg @error('description') is-invalid @enderror">{{$quizQuestion->description}}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                    <strong>Question invalid</strong>
                                </span>
                                    @enderror
                                </div>

<<<<<<< HEAD
=======

>>>>>>> 2a47303148ee144fd7a50e625d3a19b1a897ba60
                                <div class="mt-5">
                                    <div class="mb-3">
                                        <label for="fr" class="form-label">Audio Français</label>
                                        <div class="essential_audio mt-4 mb-4"
                                             data-url="{{URL::asset($quizQuestion->ng)}}"></div>
                                        <input class="form-control form-control-lg @error('fr') is-invalid @enderror"
                                               id="fr"
                                               value="{{old('fr')}}"
                                               name="fr" type="file">
                                        @error('fr')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>Audio invalide</strong>
                                </span>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <label for="ar" class="form-label">Audio Arabe</label>
                                        <div class="essential_audio mt-4 mb-4"
                                             data-url="{{URL::asset($quizQuestion->ng)}}"></div>
                                        <input class="form-control form-control-lg @error('ar') is-invalid @enderror"
                                               id="ar"
                                               value="{{old('ar')}}"
                                               name="ar" type="file">
                                        @error('ar')
                                        <span class="invalid-feedback" role="alert">
                                    <strong>Audio invalide</strong>
                                </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="ng" class="form-label">Audio Ngambaye</label>
                                        <div class="essential_audio mt-4 mb-4"
                                             data-url="{{URL::asset($quizQuestion->ng)}}"></div>
                                        <input class="form-control form-control-lg @error('ng') is-invalid @enderror"
                                               id="ng"
                                               value="{{old('ng')}}"
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

                </div>
{{--                <input type="hidden" name="quiz_id" value="{{$quiz->id}}">--}}
                <input type="hidden" name="_method" value="put">

            </form>
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
