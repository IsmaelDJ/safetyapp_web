@extends('layouts.master')

@section('title') Règles @endsection

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
    <div class="container-fluid p-4 pb-0 pt-0">
        <div class="row gap-3" >
            <div class="card card-body">
                <div class="row">
                    <div class="col-xl-4 d-flex flex-column justify-content-center">
                        <img src="{{URL::asset($rule->image)}}" alt=""
                             class="img-fluid d-block rounded"></td>
                    </div>
                    <div class="col-xl-8 d-flex flex-column justify-content-between" style="position: relative">
                        <div class="d-flex justify-content-end me-2" style="position: absolute; top: 0px; right: 0px;">
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
                        <div>
                            <a type="button" href="{{route('categories.show', $rule->category)}}"
                               class="btn btn-success btn-rounded waves-effect waves-light mb-4 me-2"><i
                                    class="mdi mdi-tag me-1"></i> {{$rule->category->name}}
                            </a>
                        </div>
                        <div>
                            <p class="lead mb-0" style="text-align: justify">{{$rule->description}}</p>
                        </div>
                        <div class="mt-4 pb-4">
                            <h5 class=" mt-4">Audio Français</h5>
                            <div class="essential_audio mt-4" data-url="{{URL::asset($rule->fr)}}"></div>
                        </div>
                        <div class="mt-4 pb-4">
                            <h5 class=" mt-4">Audio Arabe</h5>
                            <div class="essential_audio mt-4" data-url="{{URL::asset($rule->ar)}}"></div>
                        </div>
                        <div class="mt-4 pb-4">
                            <h5 class=" mt-4">Audio Ngambaye</h5>
                            <div class="essential_audio mt-4" data-url="{{URL::asset($rule->ng)}}"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-fluid">
        <div class="card">
            <div class="d-flex">
                <div class="align-self-center">
                    <h5 class="card-title m-3">Règles dans la même catégorie</h5>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                @foreach($sameCategoryRules as $rule)
                <div class="rule-item" style="width: 20%">
                    <div class="card mb-2 rounded" style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(255, 255, 255, 0.3)), url({{ URL::asset($rule->image) }}); background-size: 100%; background-repeat: no-repeat; background-position: center;">
                        <div class="d-flex justify-content-end flex-column" style="height: 270px">
                            <a href="{{ route("rules.show", $rule->id) }}" style="height: 100%; width: 100%;"></a>
                            <div class="d-flex justify-content-between">
                                <div class="d-xl-flex justify-content-between align-self-center">
                                    <div class="essential_audio m-3" data-url="{{URL::asset($rule->fr)}}"></div>
                                    <div class="essential_audio m-3" data-url="{{URL::asset($rule->ar)}}"></div>
                                    <div class="essential_audio m-3" data-url="{{URL::asset($rule->ng)}}"></div>
                                </div>

                                <div class="d-flex align-self-md-center align-self-end mb-2">
                                    <a class="me-1" 
                                        style="border-radius: 50%; background-color: #edf8ef; width: 1.5rem; height: 1.5rem; display: flex; justify-content: center" 
                                        href="{{ route('rules.edit', $rule) }}">
                                        <i class="fa fa-pen" style="align-self: center; color: #34a543"></i> 
                                    </a>
                                    <a class="me-1" 
                                        style="border-radius: 50%; background-color: #ffe8e8; width: 1.5rem; height: 1.5rem; display: flex; justify-content: center" 
                                        href="{{route('rules.index')}}"
                                        onclick="
                                        var result = confirm('Cette règle sera supprimée');
                                        if(result){
                                            event.preventDefault();
                                            document.getElementById('delete-form-{{$rule->id}}').submit();
                                        }">
                                        <i class="fa fa-trash" style="align-self: center; color: #e80000"></i> 
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
                    <p class="lead fs-6" style="text-align: justify">{{Str::limit($rule->description, 22)}}</p>
                </div>
                @endforeach    
    
                <div class="my-2">
                    {{ $sameCategoryRules->links('vendor.pagination.round') }}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script src="{{ URL::asset('assets/js/essential_audio.js')}}"></script>
@endsection

