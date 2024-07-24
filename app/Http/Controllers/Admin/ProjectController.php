<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // visualizzo tutti i projects
        $projects = Project::all();
        $data = [
            'projects' => $projects
        ];
        // dd($projects);
        return view('admin.projects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {

        // dd($request->all());
        $data = $request->validated();
        $data = $request->all();
        // dd($data);

        // cover_image
        $img_path = Storage::put('uploads', $data['cover_image']);


        $project = new Project();
        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->status = $data['status'];
        $project->cover_image = $img_path;

        $project->save();
        // reindirizzo a show
        return redirect()->route('admin.projects.index', $project)->with('message', 'Nuovo progetto creato:' . " " . "$project->name");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // cerco il primo elemento per slug

        // dd($slug);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();

        $project->update($data);

        return redirect()->route('admin.projects.index', $project)->with('message', "$project->name" . " " .  'modificato con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // se progetto ha immagine la cancello
        if ($project->cover_image) {
            Storage::delete($project->cover_image);
        }
        // cancello progetto
        $project->delete();
        return redirect()->route('admin.projects.index', compact('project'))->with('message', "$project->name" . " " .  'eliminato con successo');
    }
}
