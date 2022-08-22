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
        <form action="{{route('quiz_questions.store')}}" method="post" enctype="multipart/form-data">
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
                                src="{{URL::asset('assets/images/placeholder_rule.png')}}">
                                
                                <input class=" form-control form-control-lg @error('image') is-invalid @enderror"
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
            
                <div class="col-md-7 col-xl-7">
                    <div class="bg-soft pt-lg-0 p-4 col-md-10">
                        <div class="w-100">
                            
                            <div class="mb-3 mt-5">
                                <label for="description" class="form-label">Description</label>
                                <textarea id="" description placeholder="Entrez la question"
                                name="description"
                                rows="3"
                                class="form-control form-control-lg @error('description') is-invalid @enderror">{{old('description')}}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Question invalid</strong>
                                </span>
                                @enderror
                            </div>

                            {{-- <div class="form-control-lg mb-3 mt-3">
                                <label class="form-control-label">Reponse attendu</label>
                                <div class="d-flex justify-content-center mt-2">
                                    <label class="form-control-label mt-1 me-4">Faux</label>
                                    <label class="switch">
                                        <input type="checkbox" name="correct">
                                        <span class="slider round"></span>
                                    </label>
                                    <label class="form-control-label mt-1 ms-3">Vrai</label>
                                </div>
                            </div>
                             --}}
                             <label class="col-form-label">Réponse</label>
                             <div>
                                <select
                                    class="form-select form-select-lg @error('correct') is-invalid @enderror"
                                    name="correct">
                                        <option selected>
                                            Selectionner une reponse
                                        </option>
                                        <option value="true">
                                            Reponse correcte
                                        </option>
                                        <option value="false">
                                            Reponse incorrecte
                                        </option>
                                </select>
                                @error('correct')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Valeur de reponse non selectionnée</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="w-100">
                            
                            <label class="col-form-label">Catégorie</label>
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
                            </div>
                            @error('category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>Catégorie non selectionnée</strong>
                            </span>
                            @enderror
                        </div>
                            
                            <div class="mt-5">
                                <div class="mb-3">
                                    <label for="fr" class="form-label">Audio Français</label>
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
