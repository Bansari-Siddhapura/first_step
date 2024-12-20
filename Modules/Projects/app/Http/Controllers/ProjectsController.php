<?php

namespace Modules\Projects\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Projects\Models\Project;
use Modules\Clients\Models\Client;
use Modules\Projects\Http\Requests\ProjectsRequest;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $projects = Project::with('client')->get();
       //dd($projects);
    //  $projects= Project::find(1);
    //   dd($projects->client);
        return view('projects::projects.show',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id = null)
    {
        $clients = Client::all();
        $project =  $id ? Project::find($id) : '';
        return view('projects::projects.create',compact('clients','project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectsRequest $request)
    {
        $data=$request->all();
        //dd($data);
         $message = $data['id'] ? 'project data updated' : 'project data created';
        $success=Project::updateOrCreate(['id'=>$data['id']],$data);
        if ($success) {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->success($message);
        }
        return redirect()->route('projects.show');
    }

    //delete project
    public function destroy($id)
    {
        //dd($id);
        $delete=Project::find($id)->delete();
        if($delete){
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->info('Project deleted successfully');
        }
        return redirect()->route('projects.show');
    }
}