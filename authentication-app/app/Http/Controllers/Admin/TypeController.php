<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TypeController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::all();

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();

        
        return view('admin.types.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)  {      
        $data = $request->validated();
        $types = Type::all();
        $new_type = new Type();      
        $new_type->fill($data);      
        // $new_type->slug = Str::slug($new_type->project_type);      
        $new_type->save();
        return redirect()->route('admin.types.index')->with('message', "Nuovo tipo aggiunto con successo!")->with('types', "types");  
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {        
        $types = Type::all();               
        
        return view('admin.types.edit', compact('types', 'type')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $data = $request->validated();

        $old_name = $type->project_type;

        // $type->slug = Str::slug($data['project_type']);
        $type->update($data);

        return redirect()->route('admin.types.index')->with('message', "Progetto $old_name modificato con successo!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $old_name = $type->project_type;
        $type->delete();

        return redirect()->route('admin.types.index')->with('message', "Il progetto $old_name è stato cancellato con successo!");
    }
}
