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
    <link href="{{ URL::asset('/assets/css/essential_audio.css') }}" id="essential_audio" rel="stylesheet"
          type="text/css"/>

@endsection

@section('content')


    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="card rounded">
                    <div class="m-2 d-flex" style="position: relative">
                        <img src="{{URL::asset($category->image)}}" alt="" class="img-fluid rounded-circle align-self-center" style="height: 2.5rem; width: 2.5rem;">
                        <h2 class="align-self-center ms-4 mt-2 fw-bold">{{$category->name}}</h2>
                        <div class="d-flex" style="position: absolute; max-width: 6rem; right: 0px; top: 5px; z-index:1">
                            <a class="m-1" 
                                style="border-radius: 50%; background-color: rgba(16, 204, 101, 0.3); width: 2rem; height: 2rem; display: flex; justify-content: center" 
                                href="{{ route('categories.edit', $category) }}">
                                <i class="fa fa-pen" style="align-self: center; color: green"></i> 
                            </a>
                            <a class="m-1" 
                                style="border-radius: 50%; background-color: rgb(231, 107, 85, 0.3); width: 2rem; height: 2rem; display: flex; justify-content: center" 
                                href="{{route('categories.index')}}"
                                onclick="
                                var result = confirm('Cette catégorie sera supprimée');
                                if(result){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{$category->id}}').submit();
                                }">
                                <i class="fa fa-trash" style="align-self: center; color: red"></i> 
                            </a>
                            <form method="POST" id="delete-form-{{$category->id}}"
                                action="{{route('categories.destroy', [$category])}}">
                              @csrf
                              <input type="hidden" name="_method" value="DELETE">
                          </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    @foreach($rules as $rule)
                        <div class="col-md-6">
                            <div class="card rounded">
                                <div class="row">
                                    <div class="col-md-5">
                                        <a href="{{ route('rules.show', $rule) }}">
                                            <img src="{{URL::asset($rule->image)}}" alt=""
                                            style="height: 100%; width: 100%; object-fit: cover; border-top-left-radius: 5px; border-bottom-left-radius: 5px"
                                            class="img-fluid d-block">
                                        </a>
                                    </div>
                                    <div class="col-md-7 p-md-2 pe-md-3 p-4">
                                        <p class="lead fs-6 pb-2">{{Str::limit($rule->description)}}</p>
                                        <div class="mt-2 pb-4">
                                            <div class="essential_audio" data-url="{{URL::asset($rule->fr)}}"></div>
                                        </div>
                                        <div class="mt-2 pb-4">
                                            <div class="essential_audio" data-url="{{URL::asset($rule->ar)}}"></div>
                                        </div>
                                        <div class="mt-2 pb-2">
                                            <div class="essential_audio" data-url="{{URL::asset($rule->ng)}}"></div>
                                        </div>

                                        <div class="d-flex justify-content-end me-2">
                                            <a class="m-1" 
                                                style="border-radius: 50%; background-color: rgba(16, 204, 101, 0.3); width: 2rem; height: 2rem; display: flex; justify-content: center" 
                                                href="{{ route('rules.edit', $rule) }}">
                                                <i class="fa fa-pen" style="align-self: center; color: green"></i> 
                                            </a>
                                            <a class="m-1" 
                                                style="border-radius: 50%; background-color: rgb(231, 107, 85, 0.3); width: 2rem; height: 2rem; display: flex; justify-content: center" 
                                                href="{{route('rules.index')}}"
                                                onclick="
                                                var result = confirm('Cette règle sera supprimée');
                                                if(result){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{$rule->id}}').submit();
                                                }">
                                                <i class="fa fa-trash" style="align-self: center; color: red"></i> 
                                            </a>
                                            <form method="POST" id="delete-form-{{$rule->id}}"
                                                action="{{route('rules.destroy', [$rule])}}">
                                              @csrf
                                              <input type="hidden" name="_method" value="DELETE">
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach    

                    <div class="my-2">
                        {{ $rules->links('vendor.pagination.round') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script src="{{ URL::asset('assets/js/essential_audio.js')}}"></script>
@endsection
