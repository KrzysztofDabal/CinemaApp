@extends('layouts.frontend.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="col-md-12 text-center">
                    <h1>Cennik</h1>
                </div>
                <p>
                    Cena za bilet wynosi {{ $price->price }} zł
                </p>
            </div>
        </div>
    </div>
@endsection
