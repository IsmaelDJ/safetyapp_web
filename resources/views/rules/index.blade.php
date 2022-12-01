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
    <link href="{{ URL::asset('/assets/css/essential_audio.css') }}" id="essential_audio" rel="stylesheet" type="text/css"/>

@endsection

@section('content')

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- end col -->
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-4">Liste des règles</h5>
                    </div>
                    <div class="ms-auto">
                        <div class="text-sm-end">
                            <a type="button" href="{{route('rules.create')}}"
                               class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                    class="mdi mdi-plus me-1"></i> Ajouter
                            </a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table align-middle ">
                        <thead>
                        <tr>
                            <th scope="col">Illustration</th>
                            <th scope="col">Description</th>
                            <th scope="col" class="d-none d-xl-table-cell">Catégorie</th>
                            <th scope="col">Audio Français</th>
                            <th scope="col" class="d-none d-xl-table-cell">Audio Arabe</th>
                            <th scope="col" class="d-none d-xl-table-cell">Audio Ngambaye</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($rules as $rule)
                            <tr>
                                <td style="width: 150px;"><img src="{{URL::asset($rule->image)}}" alt=""
                                                               class="avatar-md h-auto d-block rounded"></td>
                                <td style="width: 250px">
                                    <p class="text-muted mb-0 text-justify">{{$rule->description}}</p>
                                </td>
                                <td class="d-none d-xl-table-cell">
                                    <a type="button" href="{{route('categories.show', $rule->category)}}"
                                       class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                            class="mdi mdi-tag me-1"></i> {{$rule->category->name}}
                                    </a>
                                </td>
                                <td >
                                    <div class="essential_audio" data-url="{{URL::asset($rule->fr)}}"></div>
                                </td>
                                <td class="d-none d-xl-table-cell">
                                    <div class="essential_audio" data-url="{{URL::asset($rule->ar)}}" ></div>
                                </td>
                                <td class="d-none d-xl-table-cell">
                                    <div class="essential_audio" data-url="{{URL::asset($rule->ng)}}" ></div>
                                </td>
                                <td style="width: 200px">
                                    <div class="d-flex gap-3">

                                        <a href="{{route('rules.show', $rule)}}"
                                           class="btn btn-default">Détails
                                        </a>
                                        <a href="{{route('rules.edit', $rule)}}"
                                           class="btn btn-info">Modifier
                                        </a>

                                        <a href="{{route('rules.index')}}" class="btn btn-danger"
                                           onclick="
                                                   var result = confirm('Cette règle sera supprimée');
                                                   if(result){
                                                       event.preventDefault();
                                                       document.getElementById('delete-form{{$rule->id}}').submit();
                                                   }
                                                   ">
                                            Supprimer</a>

                                        <form method="POST" id="delete-form{{$rule->id}}"
                                              action="{{route('rules.destroy', $rule)}}">
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
        <!-- end card -->
    </div>
    <!-- end col -->
@endsection


