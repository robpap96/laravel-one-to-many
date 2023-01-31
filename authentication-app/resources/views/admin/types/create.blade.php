@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Aggiungi una nuova categoria</h1>

    <form action="{{ route('admin.types.store') }}" method="PUT" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="project_type" class="form-label">Nuovo Tipo*</label>
            <input type="text" class="form-control @error('project_type') is-invalid @enderror" id="project_type" name="project_type" maxlength="100" value="{{ old('project_type', $types->project_type) }}" >
            @error('project_type')
                <div class="alert alert-danger">
                    {{$message}}
                <div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success">Aggiungi</button>
    </form>
</div>
@endsection