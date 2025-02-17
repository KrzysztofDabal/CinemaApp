@extends('layouts.admin.admin-app')

@section('title', 'Edit Seance')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Seance</h1>
        <div class="card mb-4">

            <div class="card-header">
                Edit Seance
                <a href="{{ route('admin/seance') }}" class="btn btn-primary btn-sm float-end"><- Back</a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <div class="card-body">
                <form method="POST" action="{{ route('admin/update_seance', $seance->id) }}">
                    @csrf
                    @method('PUT')

                    <div class="row mb-3">
                        <label for="rows" class="col-md-4 col-form-label text-md-end">{{ __('Movie') }}</label>

                        <div class="col-md-6">
                            <select id="movie_id" class="form-select @error('movie_id') is-invalid @enderror" name="movie_id" aria-label="Default select example" required>

                                @foreach($movies as $movie)
                                        <option value="{{ $movie->id }}" {{ ($movie->id == $seance->movie_id)? 'selected':'' }}>{{ $movie->title }}</option>
                                @endforeach
                            </select>

                            @error('movie_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="rows" class="col-md-4 col-form-label text-md-end">{{ __('Hall') }}</label>

                        <div class="col-md-6">
                            <select onchange="getNewVal(this);" id="hall_id" class="form-select @error('hall_id') is-invalid @enderror" name="hall_id" aria-label="Default select example" required>

                                @foreach($halls as $hall)
                                    <option value="{{ $hall->id }}"  {{ ($hall->id == $seance->hall_id)? 'selected':'' }}>{{ $hall->name }}</option>
                                @endforeach
                            </select>

                            @error('hall_id')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Date') }}</label>

                        <div class="col-md-6">
                            <input id="date" type="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{  $seance->date }}" required autocomplete="date">

                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="time" class="col-md-4 col-form-label text-md-end">{{ __('Time') }}</label>

                        <div class="col-md-6">
                            <input id="time" type="time" class="form-control @error('time') is-invalid @enderror" name="time" value="{{  $seance->time }}" required autocomplete="time">

                            @error('time')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Edit
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <label for="rows" class="col-md-4 col-form-label text-md-end">{{ __('Test') }}

            <div class="" id="hall_id2">
            </div>

        </label>
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script type="text/javascript">
    function getNewVal(item)
    {
        var divToPrint = document.getElementById('hall_id2');
        divToPrint.innerHTML = item.value
    }

    // console.log(value)
    // $.ajax({
    //     url:"readJson.php",
    //     method: "post",
    //     data: value,
    //     success: function(res) {
    //         console.log(res);
    //     }
    // })
</script>
