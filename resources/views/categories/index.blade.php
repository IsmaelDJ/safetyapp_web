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

    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @isset($categories)


        <!-- end row -->


        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start">
                        <div class="me-2">
                            <h5 class="card-title mb-4">Liste de catégories</h5>
                        </div>
                        <div class="ms-auto">
                            <div class="text-sm-end">
                                <a type="button" href="{{route('categories.create')}}"
                                   class="btn btn-success btn-rounded waves-effect waves-light mb-2 me-2"><i
                                        class="mdi mdi-plus me-1"></i> Ajouter
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                            @foreach($categories as $category)
                            <div class="col-md-2 col-5 m-md-3 m-4" style="position: relative; border: 1px solid #ccc; border-radius: 8px">
                                <div class="d-flex flex-column" style="position: absolute; max-width: 2rem; right: 5px; top: 5px; z-index:1">
                                    <a class="m-1" 
                                        style="border-radius: 50%; background-color: #edf8ef; width: 1.5rem; height: 1.5rem; display: flex; justify-content: center" 
                                        href="{{ route('categories.edit', $category) }}">
                                        <i class="fa fa-pen" style="align-self: center; color: #34a543"></i> 
                                    </a>
                                    <a class="m-1" 
                                        style="border-radius: 50%; background-color: #ffe8e8; width: 1.5rem; height: 1.5rem; display: flex; justify-content: center" 
                                        href="{{route('categories.index')}}"
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
                                </div>
                                <div style="z-index: -1">
                                    <a href="{{route('categories.show', $category)}}" class="d-block d-flex flex-column text-center p-2">
                                        <img src="{{ isset($category->image) ? asset($category->image) : asset('images/users/avatar-1.jpg') }}" alt="" class="m-4 align-self-center avatar-md rounded-circle img-thumbnail">
                                        <span class="text-black">{{ $category->name }}</span>
                                    </a>
                                </div>
                            </div>
                            @endforeach
                    </div>

                    {{ $categories->links('vendor.pagination.round') }}
                </div>
            </div>
            <!-- end card -->
        </div>

    @endisset

@endsection




