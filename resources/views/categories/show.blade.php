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
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body" style="height: 100vh;">
                        <img src="{{URL::asset($category->image)}}" alt="" class="img-fluid rounded mb-4">
                        <h5 class="card-title">{{$category->name}}</h5>
                    </div>
                </div>
            </div>
            <div class="col-8">

                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="me-2">
                                <h5 class="card-title mb-4">Règles dans la même catégorie</h5>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table align-middle ">
                                <thead>
                                <tr>
                                    <th scope="col">Illustration</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Audio Français</th>
{{--                                    <th scope="col">Audio Arabe</th>--}}
{{--                                    <th scope="col">Audio Ngambaye</th>--}}
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rules as $categoryRule)
                                    <tr>
                                        <td style="width: 150px;"><img src="{{URL::asset($categoryRule->image)}}" alt=""
                                                                       class="avatar-md h-auto d-block rounded"></td>
                                        <td style="width: 250px">
                                            <p class="text-muted mb-0 text-justify">{{$categoryRule->description}}</p>
                                        </td>
                                        <td >
                                            <div class="essential_audio" data-url="{{URL::asset($categoryRule->fr)}}"></div>
                                        </td>
{{--                                        <td>--}}
{{--                                            <div class="essential_audio" data-url="{{URL::asset($categoryRule->ar)}}" ></div>--}}
{{--                                        </td>--}}
{{--                                        <td>--}}
{{--                                            <div class="essential_audio" data-url="{{URL::asset($categoryRule->ng)}}" ></div>--}}
{{--                                        </td>--}}
                                        <td style="width: 200px">
                                            <div class="d-flex gap-3">

                                                <a href="{{route('rules.show', $categoryRule)}}"
                                                   class="btn btn-default">Détails
                                                </a>
                                                <a href="{{route('rules.edit', $categoryRule)}}"
                                                   class="btn btn-info">Modifier
                                                </a>

                                                <a href="{{route('rules.index')}}" class="btn btn-danger"
                                                   onclick="
                                                   var result = confirm('Cette règle sera supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form{{$categoryRule->id}}').submit();
                                                   }
                                                   ">
                                                    Supprimer</a>

                                                <form method="POST" id="delete-form{{$categoryRule->id}}"
                                                      action="{{route('rules.destroy', [$categoryRule])}}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>


                        </div>

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
