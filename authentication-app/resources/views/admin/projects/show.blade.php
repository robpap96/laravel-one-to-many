@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="py-4">
            <h2><a href="{{route('admin.projects.index')}}">Torna alla lista</a></h2>
            <h1>{{$project->name}}</h1>
            {{-- @if ($project->name)
            <h3>Categoria: <a href="{{route('admin.projects.show', $project->type)}}">{{$project->type->project_type}}</a></h3>
                
            @else
            <h3>Nessun Tipo</h3>
            @endif --}}
            @if ($project->cover_image)
                <img src="{{asset("storage/$project->cover_image")}}" alt="{{$project->name}}" width="100px">
            @endif

        </div>
    </div>
@endsection