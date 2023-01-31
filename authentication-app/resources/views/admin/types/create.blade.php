@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Aggiungi una nuova categoria</h1>

    <form action="{{ route('admin.type.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="type_id">Tipo</label>
            <select class="form-select" name="type_id" id="type_id">
                <option value="">Nessun Tipo</option>
                @foreach ($types as $type)
                    <option value="{{$type->id}}" {{ old('type_id') == $type->id ? 'selected' : '' }} >{{$type->project_type}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Aggiungi</button>
    </form>
</div>
@endsection