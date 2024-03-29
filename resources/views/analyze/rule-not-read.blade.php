@extends('layouts.master')

@section('title') Question @endsection

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
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-4">Liste des règles lus</h5>
                    </div>

                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <div class="btn-group">
                                <button type="button" class="btn btn-info btn-rounded waves-effect waves-light mb-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Exporter <i class="mdi mdi-chevron-down"></i></button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{route('analyze.export.xlsx.rule.notread')}}" >Format Excel</a>
                                    <a class="dropdown-item" href="{{route('analyze.export.pdf.rule.notread')}}">Format PDF</a>
                                </div>
                            </div>
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
                            <p class="lead" style="font-size: 11px; text-align: justify">{{Str::limit($rule->description, 25)}}</p>
                        </div>
                        @endforeach    
    
                        <div class="my-2">
                            {{ $rules->links('vendor.pagination.round') }}
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

