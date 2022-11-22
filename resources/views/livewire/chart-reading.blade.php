<div class="col-xl-12">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="clearfix">
                <div class="float-end">
                    <div class="input-group input-group-sm">
                        <select wire:model='year' class="form-select form-select-sm">
                            @foreach(range(0, $range) as $iteration)
                                <option value="{{ $first_year + $iteration }}">
                                    {{ $first_year + $iteration }}
                                </option>
                            @endforeach
                        </select>
                        <label class="input-group-text">Années</label>
                    </div>
                </div>
                <h4 class="card-title mb-4">Taux de lecture par moi</h4>
            </div>
            <hr>
            <div class="apex-charts">
            {!! $readingChart->container() !!}
            </div>
        </div>
    </div>
</div>
@push('script')
    @once
     <script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highcharts/6.0.6/highcharts.js" charset="utf-8"></script>
        {!! $readingChart->script() !!}
     </script>
    @endonce
@endpush