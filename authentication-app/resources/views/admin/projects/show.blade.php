@extends('layouts.admin')

@section('content')
    <div class="container">
        <h2><a href="{{route('admin.projects.index')}}">Torna alla lista</a></h2>
        <h1>{{$project->name}}</h1>
        <h3>Categoria: {{$project->type?->project_type ?: 'Nessun Tipo'}}</h3>
        @if ($project->cover_image)
            <img src="{{asset("storage/$project->cover_image")}}" alt="{{$project->name}}" width="100px">
        @endif
    </div>
@endsection