<?php

namespace Modules\Clients\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Clients\Http\Requests\ClientsRequest;
use Modules\Clients\Models\Client;

class ClientsController extends Controller
{
    // show all clients
    public function index()
    {
        //$clients = Client::paginate(5);
        //dd($clients);
        $clients=Client::with('projects')->get();
        //$client->projects;
        return view('clients::clients.show', compact('clients'));
    }

    // show form of client
    public function create($id = null)
    {
        $client = $id ?  Client::find($id) : '';
        return view('clients::clients.create', compact('client'));
    }

    //store client
    public function store(ClientsRequest $request)
    {
        $data = $request->all();
        $message = $data['id'] ? 'client updated successfully' : 'client inserted successfully';
        $success =  Client::updateOrCreate(['id' => $data['id']], $data);
        if ($success) {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->success($message);
        }
        return redirect()->route('clients.show');
    }

    //delete client
    public function destroy($id)
    {
        // dd($id);
        $delete = Client::find($id)->delete();
        if ($delete) {
            flash()->option('position', 'bottom-right')->option('timeout', 3000)->info('Client deleted successfully');
        }
        return redirect()->route('clients.show');
    }
}