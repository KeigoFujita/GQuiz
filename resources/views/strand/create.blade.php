@extends('layouts.app')

@section('content')
<div class="container-fluid p-5 main-content">

    <div class="row ">
        <div class="col-md-6">
            <h1 class="mb-5">Add Strand</h1>
            <form action="{{ route('strands.store')}}" method="post">
                @csrf


                <div class="form-group">
                    <label for="exampleInputPassword1">Strand Name</label>
                    <input type="text" class="form-control @error('strand_name') is-invalid @enderror"
                        name="strand_name" value="{{ old('strand_name') }}">
                    @error('strand_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Strand Description</label>
                    <textarea name="strand_description" class="form-control @error('strand_name') is-invalid @enderror"
                        cols=" 30" rows="10">
                        {{ old('strand_description') }}
                    </textarea>
                    @error('strand_description')
                    <span class=" invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <button type="submit" class="btn btn-success mt-5" name="submit">Submit</button>
            </form>
        </div>

    </div>
</div>
@endsection