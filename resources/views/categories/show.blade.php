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
                        <img src="{{URL::asset($category->image)}}" alt="" class="img-fluid rounded-circle align-self-center" style="object-fit: cover; height: 2.5rem; width: 2.5rem;">
                        <h2 class="align-self-center ms-4 mt-2 fw-bold">{{$category->name}}</h2>
                        @can('doAdvanced')
                        <div class="d-flex" style="position: absolute; max-width: 9rem; right: 0px; top: 5px; z-index:1">
                            <a class="m-1 rounded-circle d-flex justify-content-center" 
                                style="background-color: #edf8ef; width: 2rem; height: 2rem;" 
                                href="{{ route('categories.edit', $category) }}">
                                <i class="fa fa-pen" style="align-self: center; color: #34a543"></i> 
                            </a>
                            <a class="m-1 rounded-circle d-flex justify-content-center" 
                                style="background-color: #ffe8e8; width: 2rem; height: 2rem;" 
                                href="{{route('root')}}"
                                onclick="
                                var result = confirm('Cette catégorie sera supprimée');
                                if(result){
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{$category->id}}').submit();
                                }">
                                <i class="fa fa-trash" style="align-self: center; color: #e80000"></i> 
                            </a>
                            <form method="POST" id="delete-form-{{$category->id}}"
                                action="{{route('categories.destroy', [$category])}}">
                              @csrf
                              <input type="hidden" name="_method" value="DELETE">
                          </form>
                          
                          <a class="m-1" 
                                style="border-radius: 50%; background-color: rgba(16, 97, 204, 0.3); width: 2rem; height: 2rem; display: flex; justify-content: center" 
                                href="{{ route('rules.create', [$category]) }}">
                                <i class="fa fa-plus" style="align-self: center; color: rgba(16, 97, 204)"></i> 
                            </a>
                        </div>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    @foreach($rules as $rule)
                    <div class="rule-item" style="width: 20%">
                        <div class="card mb-2 rounded" style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(255, 255, 255, 0)), url({{ URL::asset($rule->image) }}); background-size: 100%; background-repeat: no-repeat; background-position: center;">
                            <div class="d-flex justify-content-end flex-column" style="height: 280px">
                                <a href="{{ route("rules.show", $rule->id) }}" style="height: 100%; width: 100%;"></a>
                                <div class="d-flex justify-content-between">
                                    <div class="d-xl-flex justify-content-between align-self-center">
                                        <div class="essential_audio m-3" data-url="{{URL::asset($rule->fr)}}"></div>
                                        <div class="essential_audio m-3" data-url="{{URL::asset($rule->ar)}}"></div>
                                        <div class="essential_audio m-3" data-url="{{URL::asset($rule->ng)}}"></div>
                                    </div>
                                    @can('doAdvanced')
                                    <div class="d-flex align-self-md-center align-self-end mb-2">
                                        <a class="me-1 rounded-circle d-flex justify-content-center" 
                                            style="background-color: #edf8ef; width: 1.5rem; height: 1.5rem;" 
                                            href="{{ route('rules.edit', $rule) }}">
                                            <i class="fa fa-pen" style="align-self: center; color: #34a543"></i> 
                                        </a>
                                        <a class="me-1 rounded-circle d-flex justify-content-center" 
                                            style="background-color: #ffe8e8; width: 1.5rem; height: 1.5rem;" 
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
                                    @endcan
                                </div>
                            </div>
                        </div>
                        <p class="lead text-justify" style="font-size: 11px;">{{Str::limit($rule->description, 25)}}</p>
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
