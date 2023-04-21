<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Category;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $sort = (!empty($sort_request = $request->get("sort"))) ? $sort_request : "updated_at";
        $order = (!empty($order_request = $request->get("order"))) ? $order_request : "DESC";

        $projects = Project::orderBy($sort, $order)->paginate(10)->withQueryString();
        return view("admin.projects.index", compact("projects", "sort", "order"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy("label")->get();
        $technologies = Technology::all();

        return view('admin.projects.create', compact('categories', "technologies"));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $project = new Project;

        $project->name = $data["name"];
        $project->description = $data["description"];
        $project->technology_used = $data["technology_used"];
        $project->start_date = $data["start_date"];
        $project->category_id = $data["category_id"];

        $project->save();

        $technologies = $request->input('technologies', []);
        $project->technologies()->attach($technologies);

        // Reindirizzamento alla pagina di dettaglio della canzone appena salvata
        return redirect()->route('admin.projects.show', ['project' => $project])
            ->with("message", "Progetto creato con successo!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view("admin.projects.show", compact("project"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $categories = Category::orderBy("label")->get();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('project', "categories", "technologies"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        // $validatedData = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'description' => 'required|string',
        //     'technology_used' => 'required|max:255',
        //     "category_id" => "nullable|exists:categories,id",
        //     'start_date' => 'required|date',
        // ],
        // [
        //     "name.required" => "Il nome è obbligatorio",
        //     "name.string" => "Il nome deve essere una stringa",
        //     "name.max:255" => "Il nome deve avere massimo 255 caratteri",
        //     "description.required" => "La descrizione è obbligatoria",
        //     "description.string" => "La descrizione deve essere una stringa",
        //     "technology_used.required" => "Il linguaggio è obbligatorio",
        //     "technology_used.string" => "Il linguaggio deve avere massimo 255 caratteri",
        //     "category_id.exists" => "L\'id della categoria non è valido"
        // ]);

        // $project->fill($validatedData);
        // $project->save();

        // return redirect()->route('admin.projects.show', $project);




        $data = $request->all();

        $project->name = $data["name"];
        $project->description = $data["description"];
        $project->technology_used = $data["technology_used"];
        $project->category_id = $data["category_id"];

        $project->save();

        $technologies = $request->input('technologies', []);
        $project->technologies()->sync($technologies);

        return redirect()->route('admin.projects.show', ['project' => $project])
            ->with("message", "Progetto aggiornato con successo!");
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()->route('admin.projects.index');
    }
}