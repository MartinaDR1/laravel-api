<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderByDesc('id')->paginate(8);
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::orderByDesc('id')->get();
        $technologies=Technology::orderByDesc('id')->get();
        return view('admin.projects.create', compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $val_data =  $request->validated();

        $slug = Project::generateSlug($val_data['title']);

        $val_data['slug'] = $slug;

        if ($request->hasFile('project_image')) {
            $image_path = Storage::put('uploads', $val_data['project_image']);
            $val_data['project_image'] = $image_path;
        }
        if ($request->filled('end_date')) {
            $endDate = date('Y-m-d', strtotime($request->input('end_date')));
            $val_data['end_date'] = $endDate;
        }

        $new_project= Project::create($val_data);

        if($request ->has('technologies')){
            $new_project->technologies()->attach($request->technologies);
        };
        return to_route('admin.projects.index')->with('message', 'Project Created Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view ('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::orderByDesc('id')->get();
        $technologies=Technology::orderByDesc('id')->get();

        return view('admin.projects.edit', compact('project', 'types', 'technologies'));
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
        $val_data = $request->validated();

        $slug = Project::generateSlug($val_data['title']);
        
        $val_data['slug'] = $slug;

        if ($request->hasFile('project_image')) {
            if ($project->project_image) {
                Storage::delete($project->project_image);
            }

            $image_path = Storage::put('uploads', $val_data['project_image']);
            //dd($image_path);
            $val_data['project_image'] = $image_path;
        }

        $project->update($val_data);

        if ($request->has('technologies')) {
            $project->technologies()->sync($request->technologies);
        }
        return to_route('admin.projects.index')->with('message', 'Project updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        if ($project->project_image) {
            Storage::delete($project->project_image);
        }
       $project->delete();
       return to_route('admin.projects.index')->with('message', 'Project delete succesfully');
    }
}
