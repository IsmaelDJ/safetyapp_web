<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body">
                <div class="clearfix">
                    <div class="float-end">
                        <div class="input-group input-group-sm">
                            <select wire:model='param_month' class="form-select form-select-sm">
                                @foreach($months as $month)
                                    <option value="{{ $loop->iteration }}">
                                        {{ $month }}
                                    </option>                                        
                                @endforeach
                            </select>
                            <select wire:model='year' id="select-year" class="form-select form-select-sm">
                                @foreach(range(0, $range) as $iteration)
                                    <option value="{{ $first_year + $iteration }}">
                                        {{ $first_year + $iteration }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <h4 class="card-title">Présence</h4>
                </div>
                <hr>
                <div class="row">
                    <div>
                        {!! $presenceChart->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
    @once
        <script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
            {!! $presenceChart->script() !!}
        </script>
    @endonce    
@endpush
