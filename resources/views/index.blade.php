@extends('layouts.master')

@section('title') @lang('translation.Starter_Page') @endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <img src="{{ isset(Auth::user()->avatar) ? asset(Auth::user()->avatar) : asset('images/users/avatar-1.jpg') }}" alt="" class="avatar-md rounded-circle img-thumbnail">
                            </div>
                            <div class="flex-grow-1 align-self-center">
                                <div class="text-muted">
                                    <p class="mb-2">Bienvenu sur SafetyApp</p>
                                    <h5 class="mb-1" id="username">{{ Auth::user()->name ? Auth::user()->name : "Nom et Prénom" }}</h5>
                                    <p class="mb-0">{{ Auth::user()->email ? Auth::user()->email : "Adresse email" }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 align-self-center">
                        <div class="text-lg-center mt-4 mt-lg-0">
                            <div class="row">
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Règles</p>
                                        <h5 class="mb-0"> {{ $total_rules }}</h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Quiz</p>
                                        <h5 class="mb-0">{{ $total_quizzes }}</h5>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <p class="text-muted text-truncate mb-2">Chauffeurs</p>
                                        <h5 class="mb-0">{{ $total_drivers }}</h5>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 d-none d-lg-block">
                        <div class="clearfix mt-4 mt-lg-0">
                            <div class="dropdown float-end">
                                <a style="width: 6rem"  href="" class="btn btn-primary waves-effect waves-light btn-sm" data-bs-toggle="modal" data-bs-target=".update-profile">
                                    <i class="fa fa-edit"></i> Editer
                                </a>
                            </div>
                        </div>
                        <div class="clearfix mt-4 mt-lg-0">
                            <div class="dropdown float-end">
                                <a style="width: 6rem; margin-top:5%;"  href="{{ route('analyze.index') }}" class="btn btn-primary waves-effect waves-light btn-sm">
                                    <i class="fa fa-eye"></i> Voir Plus
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
                
                <div class="modal fade update-profile" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="myLargeModalLabel">Editer votre profile</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form class="form-horizontal" method="POST" enctype="multipart/form-data" id="update-profile">
                                    @csrf
                                    <input type="hidden" value="{{ Auth::user()->id }}" id="data_id">
                                    <div class="mb-3">
                                        <label for="useremail" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="useremail" value="{{ Auth::user()->email }}" name="email" placeholder="Enter email" autofocus>
                                        <div class="text-danger" id="emailError" data-ajax-feedback="email"></div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Nom</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" id="username" name="name" autofocus placeholder="Enter username">
                                        <div class="text-danger" id="nameError" data-ajax-feedback="name"></div>
                                    </div>
                                    
                                    @if (Auth::user()->role == 'transporteur')
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Numéro de téléphone</label>
                                            <input required 
                                            type="text" class="form-control form-control-lg @error('phone') is-invalid @enderror"
                                                value="{{isset(Auth::user()->carrier->phone)?Auth::user()->carrier->phone:null}}"
                                                id="phone" name="phone" placeholder="Entrez le numéro de téléphone du sous-traitant">
                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Nom invalid</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label for="address" class="form-label">Adresse</label>
                                            <input required type="text" class="form-control form-control-lg @error('address') is-invalid @enderror"
                                                value="{{isset(Auth::user()->carrier->address)?Auth::user()->carrier->address:null}}"
                                                id="address" name="address" placeholder="Entrez l'adresse du sous-traitant">
                                            @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Nom invalid</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        @endif

                                    <div class="mb-3">
                                        <label for="avatar">Photo de profile</label>
                                        <div class="input-group">
                                            <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" name="avatar" autofocus>
                                            <label class="input-group-text" for="avatar">Upload</label>
                                        </div>
                                        <div class="text-start mt-2">
                                            <img src="{{ asset(Auth::user()->avatar) }}" alt="" class="rounded-circle avatar-lg">
                                        </div>
                                        <div class="text-danger" role="alert" id="avatarError" data-ajax-feedback="avatar"></div>
                                    </div>
                                    
                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light UpdateProfile" data-id="{{ Auth::user()->id }}" type="submit">Modifier</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                
                
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-8">
        @livewire('chart-presence')
    </div>
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Quiz</h4>
                
                <ul class="nav nav-pills bg-light rounded" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-bs-toggle="tab" href="#transactions-sell-tab" role="tab">Correcte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#transactions-buy-tab" role="tab">Faux</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="tab" href="#transactions-all-tab" role="tab">Attente</a>
                    </li>
                </ul>
                <div class="tab-content mt-4">
                    <div class="tab-pane active" id="transactions-all-tab" role="tabpanel">
                        <div class="table-responsive" data-simplebar style="max-height: 340px;">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    @foreach($quizNoAnswereds as $quizNoAnswered)
                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="font-size-22 text-primary">
                                                <img 
                                                src="{{ isset($quizNoAnswered->image) ? asset($quizNoAnswered->image) : asset('/assets/images/users/avatar-1.jpg') }}" 
                                                alt="Illustration" 
                                                width="35" 
                                                height="35" 
                                                style="object-fit: cover" 
                                                class="avatar-sm rounded-circle border">
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">{{ Str::limit($quizNoAnswered->description, $limit=20, $end='...') }} </h5>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="text-end">
                                                <a type="button" href="{{route('categories.show', $quizNoAnswered->category)}}"
                                                    class="btn btn-success btn-rounded waves-effect waves-light "><i
                                                    class="mdi mdi-tag me-1"></i> {{ Str::limit($quizNoAnswered->category->name, 4, '..') }}
                                                </a>                                             
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">0 %</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="transactions-buy-tab" role="tabpanel">
                        <div class="table-responsive" data-simplebar style="max-height: 260px;">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    @foreach($quizBadAnswereds as $quizBadAnswered)
                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="font-size-22 text-primary">
                                                <img 
                                                src="{{ isset($quizBadAnswered->image) ? asset($quizBadAnswered->image) : asset('/assets/images/users/avatar-1.jpg') }}" 
                                                alt="Illustration" 
                                                width="35" 
                                                height="35" 
                                                style="object-fit: cover" 
                                                class="avatar-sm rounded-circle border">
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">{{ Str::limit($quizBadAnswered->description, $limt=20, $end='...') }}</h5>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="text-end">
                                                <a type="button" href="{{route('categories.show', $quizBadAnswered->category)}}"
                                                    class="btn btn-success btn-rounded waves-effect waves-light "><i
                                                    class="mdi mdi-tag me-1"></i> {{ Str::limit($quizBadAnswered->category->name, $limit=4, $end='..')}}
                                                </a>                                            
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">{{round( $driver_quiz_responses_total != 0 ? $quizBadAnswered->driver_quiz_responses_count / $driver_quiz_responses_total * 100 : 0, 1)}}%</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="tab-pane" id="transactions-sell-tab" role="tabpanel">
                        <div class="table-responsive" data-simplebar style="max-height: 260px;">
                            <table class="table align-middle table-nowrap">
                                <tbody>
                                    @foreach($quizGoodAnswereds as $quizGoodAnswered)
                                    <tr>
                                        <td style="width: 50px;">
                                            <div class="font-size-22 text-primary">
                                                <img 
                                                src="{{ isset($quizGoodAnswered->image) ? asset($quizGoodAnswered->image) : asset('/assets/images/users/avatar-1.jpg') }}"
                                                alt="Illustration" 
                                                width="35" 
                                                height="35" 
                                                style="object-fit: cover" 
                                                class="avatar-sm rounded-circle border">
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div>
                                                <h5 class="font-size-14 mb-1">{{ Str::limit($quizGoodAnswered->description, $limit=20, $end='...') }}</h5>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="text-end">
                                                <a type="button" href="{{route('categories.show', $quizGoodAnswered->category)}}"
                                                    class="btn btn-success btn-rounded waves-effect waves-light "><i
                                                    class="mdi mdi-tag me-1"></i> {{ Str::limit($quizGoodAnswered->category->name, $limit=4, $end='..') }}
                                                </a>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="text-end">
                                                <h5 class="font-size-14 text-muted mb-0">{{ round($driver_quiz_responses_total != 0 ? $quizGoodAnswered->driver_quiz_responses_count / $driver_quiz_responses_total * 100 : 0, 1)}}%</h5>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="card-footer">
                <div class="btn-group float-end">
                    <button type="button" class="btn btn-primary btn-sm waves-effect waves-light mb-2 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Détails <i class="mdi mdi-chevron-down"></i></button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('analyze.quiz.correct')}}" >Correcte</a>
                        <a class="dropdown-item" href="{{route('analyze.quiz.false')}}">Faux</a>
                        <a class="dropdown-item" href="{{route('analyze.quiz.waitting')}}">Non pratiqué</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  

<div class="row">
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-3">Lecture par règle</h5>
                    </div>
                </div>
                
                <hr>
                
                <div class="mb-3" data-simplebar style="max-height: 260px;">
                    <ul class="list-group list-group-flush">
                        @foreach($rulesMoreRead as $ruleMoreRead)
                        <li class="list-group-item">
                            <div class="py-2">
                                <h5 class="font-size-14">{{ Str::limit($ruleMoreRead->description, $limit=20, $end='...') }}<span class="float-end">{{ (round($total_readings != 0 ? $ruleMoreRead->readings_count * 100 / $total_readings : 0 , 1)). '%' }}</span></h5>
                                <div class="progress animated-progess progress-sm">
                                    <div class="progress-bar" role="progressbar" style="width: {{ round( $total_readings != 0 ? $ruleMoreRead->readings_count * 100 / $total_readings : 0, 1)}}%" aria-valuenow="{{ round($total_readings != 0 ? $ruleMoreRead->readings_count * 100 / $total_readings : 0, 1) }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="card-footer">
                <div class="btn-group float-end">
                    <a href="{{route('analyze.rule.read')}}" class="btn btn-primary btn-sm">Détails <i class="mdi mdi-arrow-right ms-1"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-xl-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-wrap align-items-start">
                    <div class="me-2">
                        <h5 class="card-title mb-3">Lecture par catégorie de règle</h5>
                    </div>
                </div>
                
                <hr>
                <div data-simplebar style="max-height: 260px;">
                    <div class="row w-100 mb-3">
                        <div class="col-4 font-size-14">
                            @foreach($categoriesMoreRead as $categoryMoreRead)
                            <div class="mt-1 mb-1 text text-end">
                                <a type="button" href="{{route('categories.show', $categoryMoreRead)}}"
                                    class="btn btn-success btn-sm btn-rounded waves-effect waves-light "><i
                                    class="mdi mdi-tag me-1"></i> {{ Str::limit($categoryMoreRead->name, 4, '..') }}
                                </a>
                            </div>
                            @endforeach
                    </div>
                    <div class="col-8">
                        <div class="smart-progress">
                            @foreach($categoriesMoreRead as $categoryMoreRead)
                            <div class="progress-outer mt-1">
                                <div class="progress animated-progess bg-white">
                                    <div class="progress-bar bg-success progress-bar-info" style="width:{{ $total_readings != 0 ? $categoryMoreRead->readings_count * 100 / $total_readings : 0}}%;"></div>
                                    <div class="progress-value">{{ round($total_readings != 0 ? $categoryMoreRead->readings_count * 100 / $total_readings : 0, 1)}}%</div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="btn-group float-end">
                <a href="{{route('analyze.category.read')}}" class="btn btn-primary btn-sm">Détails <i class="mdi mdi-arrow-right ms-1"></i></a>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex flex-wrap align-items-start">
                <div class="me-2">
                    <h5 class="card-title mb-3">Lecture par chauffeur</h5>
                </div>
            </div>
            
            <hr>
            
            <div class="table-responsive" data-simplebar style="max-height: 260px;">
                <table class="table align-middle table-nowrap">
                    <tbody>
                        @foreach($bestDrivers as $bestDriver)
                        <tr>
                            <td>
                                <div>
                                    <h5 class="font-size-14 mb-1">{{ $bestDriver->driver->name }}</h5>
                                </div>
                            </td>
                            
                            <td>
                                <div>
                                    <h5 class="font-size-14 mb-1">{{ $bestDriver->driver->phone }}</h5>
                                </div>
                            </td>
                            
                            <td>
                                <div class="text-end">
                                    <h5 class="font-size-14 text-muted mb-0">{{round( $total_readings != 0 ? $bestDriver->readings_count / $total_readings * 100 : 0, 1)}}%</h5>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer">
            <div class="btn-group float-end">
                <a href="{{route('analyze.driver.read')}}" class="btn btn-primary btn-sm">Détails <i class="mdi mdi-arrow-right ms-1"></i></a>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>

<script src="{{ URL::asset('/assets/libs/jquery-knob/jquery-knob.min.js') }}"></script>
<script src="{{ URL::asset('/assets/js/pages/jquery-knob.init.js') }}"></script>
<script src="{{ URL::asset('assets/js/essential_audio.js')}}"></script>

<script>
    $('#update-profile').on('submit', function(event) {
        event.preventDefault();
        var Id = $('#data_id').val();
        let formData = new FormData(this);
        $('#emailError').text('');
        $('#nameError').text('');
        $('#avatarError').text('');
        $.ajax({
            url: "{{ url('update-profile') }}" + "/" + Id,
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $('#emailError').text('');
                $('#nameError').text('');
                $('#avatarError').text('');
                if (response.isSuccess == false) {
                    alert(response.Message);
                } else if (response.isSuccess == true) {
                    setTimeout(function() {
                        window.location.reload();
                    }, 1000);
                }
            },
            error: function(response) {
                $('#emailError').text(response.responseJSON.errors.email);
                $('#nameError').text(response.responseJSON.errors.name);
                $('#avatarError').text(response.responseJSON.errors.avatar);
            }
        });
    });
</script>
<script>
    $('#select-month').change(function(e){
        window.location.href = "?month="+ e.target.value;
    });
</script>
@endsection
