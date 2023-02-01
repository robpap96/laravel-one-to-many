@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="py-4">
            <h2><a href="{{route('admin.types.index')}}">Torna alla lista</a></h2>
            <h1>{{$type->name}}</h1>
            <h3>Categoria: <a href="{{route('admin.types.show', $type)}}">{{$type->name}}</a></h3>
        </div>
    </div>
@endsection