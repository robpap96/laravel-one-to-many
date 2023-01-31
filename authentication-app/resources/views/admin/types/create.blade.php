@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Aggiungi una nuova categoria</h1>

    <form action="{{ route('admin.types.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="type_id">Tipo</label>
            <div class="mb-3">
                <label for="type_id" class="form-label">Nome*</label>
                <input type="text" class="form-control @error('type_id') is-invalid @enderror" id="type_id" name="type_id" maxlength="100" value="{{ old('type_id') }}" >
                @error('type_id')
                    <div class="alert alert-danger">
                        {{$message}}
                    <div>
                @enderror
            </div>
        </div>

        <button type="submit" class="btn btn-success">Aggiungi</button>
    </form>
</div>
@endsection