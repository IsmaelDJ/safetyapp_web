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
    <div class="container-fluid">
        <div class="card">
            <div class="row">
                <div class="col-4 p-4">
                    <div class="rule-show-item">
                        <div class="card mb-2 rounded" style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(255, 255, 255, 0)), url({{ URL::asset($rule->image) }}); background-size: 100%; background-repeat: no-repeat; background-position: center;">
                            <div class="d-flex justify-content-end flex-column" style="width: 100%; height: 72vh;">
                                <div class="d-flex justify-content-between">
                                    <div class="d-xl-flex justify-content-between align-self-center">
                                        <div class="essential_audio m-4" data-url="{{URL::asset($rule->fr)}}"></div>
                                        <div class="essential_audio m-4" data-url="{{URL::asset($rule->ar)}}"></div>
                                        <div class="essential_audio m-4" data-url="{{URL::asset($rule->ng)}}"></div>
                                    </div>
                                    @can('doAdvanced')
                                    <div class="d-flex align-self-md-center align-self-end p-4">
                                        <a class="me-1 rounded-circle d-flex justify-content-center" 
                                            style="background-color: #edf8ef; width: 2rem; height: 2rem;" 
                                            href="{{ route('rules.edit', $rule) }}">
                                            <i class="fa fa-pen" style="align-self: center; color: #34a543"></i> 
                                        </a>
                                        <a class="me-1 rounded-circle d-flex justify-content-center" 
                                            style="background-color: #ffe8e8; width: 2rem; height: 2rem;" 
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
                        <p class="lead" style="text-align: justify">{{$rule->description}}</p>
                    </div>
                </div>
            
            
                <div class="col-8">
                        <div class="d-flex">
                            <div class="align-self-center">
                                <h3 class="my-3">Règles dans la même catégorie</h3>
                            </div>
                        </div>
                        <div class="row pe-3">
                            @foreach($sameCategoryRules as $rule)
                            <div class="rule-item col-4">
                                <div class="card mb-2 rounded" style="background-image:linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(255, 255, 255, 0)), url({{ URL::asset($rule->image) }}); background-size: 100%; background-repeat: no-repeat; background-position: center;">
                                    <div class="d-flex justify-content-end flex-column" style="height: 300px">
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
                                                    style="background-color: #edf8ef; width: 1.5rem; height: 1.5rem; display: flex;" 
                                                    href="{{ route('rules.edit', $rule) }}">
                                                    <i class="fa fa-pen" style="align-self: center; color: #34a543"></i> 
                                                </a>
                                                <a class="me-1 rounded-circle d-flex justify-content-center" 
                                                    style="background-color: #ffe8e8; width: 1.5rem; height: 1.5rem; display: flex;" 
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
                                <p class="lead" style="font-size: 11px; text-align: justify">{{Str::limit($rule->description, 25)}}</p>
                            </div>
                            @endforeach    
                
                            <div class="my-2">
                                {{ $sameCategoryRules->links('vendor.pagination.round') }}
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

    <script src="{{ URL::asset('assets/js/essential_audio.js')}}"></script>
@endsection

