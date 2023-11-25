@extends('layouts.app')

@section('content')
    <div class="p-3 shadow-sm bg-white">
        <h2 class="h4 mb-4 font-weight-bold">{{ $researchForm->title }}</h2>

        <form action="" method="post" enctype="multipart/form-data" class="col-md-5 p-0">
            @csrf

            <div class="custom-file">
                <input type="file" class="custom-file-input @error('document') is-invalid @enderror" name="document"
                    id="document" aria-describedby="Upload PDF document" required>
                <label class="custom-file-label" for="document">Choose file</label>

                @error('document')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mt-3 p-0">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
@endsection
