@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Aggiungi una nuova categoria</h1>

    <form action="{{ route('admin.types.update', $type) }}" method="PUT" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="type_id">Tipo</label>
            <select class="form-select" name="type_id" id="type_id">
                <option value="">Nessun Tipo</option>
                @foreach ($types as $t)
                    <option value="{{$t->id}}" {{ old('type_id') == $t->id ? 'selected' : '' }} >{{$t->project_type}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Aggiungi</button>
    </form>
</div>
@endsection