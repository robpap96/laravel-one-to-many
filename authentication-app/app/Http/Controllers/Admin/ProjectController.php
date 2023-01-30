<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();

        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        if( $data['cover_image']) {
            $data['cover_image'] = Storage::put('uploads', $data['cover_image']);
        }

        $new_project = new Project();
        $new_project->fill($data);
        $new_project->slug = Str::slug($new_project->name);
        $new_project->save();

        return redirect()->route('admin.projects.index')->with('message', "Progetto $new_project->name aggiunto con successo!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $old_name = $project->name;

        $project->slug = Str::slug($data['name']);
        
        if(isset($data['cover_image'])){
            Storage::delete($project->cover_image);
            $data['cover_image'] = Storage::put('uploads', $data['cover_image']);
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')->with('message', "Progetto $old_name modificato con successo!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $old_name = $project->name;
        if($project->cover_image){
            Storage::delete($project->cover_image);
        }
        $project->delete();

        return redirect()->route('admin.projects.index')->with('message', "Il progetto $old_name è stato cancellato con successo!");
    }
}

