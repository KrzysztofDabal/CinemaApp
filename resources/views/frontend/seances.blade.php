@extends('layouts.frontend.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <h1>
                    Seances na dzień {{ $seance_date }}
                </h1>
                @php
                    $period_start = \Carbon\Carbon::now();
                    $period_end = \Carbon\Carbon::now()->addDays(13);
                    $seance_period = collect(Carbon\CarbonPeriod::create($period_start, $period_end)->toArray())
                        ->map(function($eachCarbonDate){
                            return $eachCarbonDate->format('d.m');
                        });
                @endphp
                <form action="{{ route('seances') }}" method="post">
                    @csrf
                    @foreach($seance_period as $seance_day)
                        <input type="submit" name="seance_date"  class="btn text-center {{ ($seance_day == $seance_date)? 'btn-primary': '' }}" id="day{{ $seance_day }}" placeholder="{{ $seance_day }}" value="{{ $seance_day }}">
                    @endforeach
                </form>
            </div>
            <div class="col-md-12 text-center">
                Aktualizacja repertuaru w każdy [przykładowy_dzień] po [przykładowa_godzina]
                <table class="table">
                    <thead>
                    <tr>
                        <th>Film</th>
                        <th>Godziny</th>
                    </tr>
                    </thead>
                    @php
                        $previouseValue=null;
                    @endphp
                    @foreach($seances as $seance)
                        @if($previouseValue != $seance->title)
                            @if($loop->first)
                                <tr>
                            @else
                                </tr>
                                <tr>
                            @endif
                            <th>
                                <img src="{{  asset($image_route.$seance->image) }}" style="width: 140px; height: 200px;" alt="{{  $seance->title }}"/><br>
                                {{ $seance->title }}
                            </th>
                        @endif

                        @if($loop->first || $previouseValue != $seance->title)
                            <th>
                        @endif

                        <div>
                            <a href="{{ route('reservation.seat_select', $seance->id) }}">{{ \Carbon\Carbon::parse($seance->time)->format('h:i') }}</a><br>
                        </div>
                        @php
                            $previouseValue=$seance->title;
                        @endphp

                        @if($loop->last)
                            </th>
                            </tr>
                        @endif
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
