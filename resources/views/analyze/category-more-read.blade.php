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
                            <h5 class="card-title mb-4">Lecture par catégory</h5>
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

                    <div class="table-responsive">
                        <table class="table align-middle ">
                            <thead>
                            <tr>
                                <th class="align-middle">N°</th>
                                <th class="align-middle">Image</th>
                                <th class="align-middle">Description</th>
                                <th class="align-middle">Lecture</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td style="width: 100px;">
                                        <span class="text-muted mb-0 text-center">{{$loop->iteration}}</span>
                                    </td>
                                    <td style="width: 150px;"><img src="{{URL::asset($category->image)}}" alt=""
                                                                   class="avatar-md h-auto d-block rounded"></td>
                                    <td>
                                        <p class="text-muted mb-0 text-justify">{{$category->name}}</p>
                                    </td>
                                    <td  style="width: 200px">
                                        {{$category->readings_count}}
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>


                    </div>

                    {{ $categories->links('vendor.pagination.round') }}
                </div>
            </div>
            <!-- end card -->
        </div>

    @endisset

@endsection




