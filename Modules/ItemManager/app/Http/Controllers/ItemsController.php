<?php

namespace Modules\ItemManager\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\ItemManager\Http\Requests\ItemsRequest;
use Modules\ItemManager\Models\ItemMaster;
use Flasher\Prime\FlasherInterface;

use function Flasher\Prime\flash;

class ItemsController extends Controller
{

    //Display All Items
    public function index()
    {
        $items = ItemMaster::paginate(5);
        return view('itemmanager::items.show', compact('items'));
    }

    public function  create($id = null)
    {
        $editable = ItemMaster::find($id);
        return view('itemmanager::items.create', compact('editable'));
    }

    //store data into database(insert & update)
    public function store(ItemsRequest $request)
    {
        $data = $request->all();
      
        //$data['category'] = implode(',',$data['category']);
        $data['license_update'] = $data['license_update'] ?? '0';
        $data['serve_latest_updates'] = $data['serve_latest_updates'] ?? '0';
        //dd($data['category']);
        $message = $data['id'] ? 'item update successfully' : 'item insert successfully';
        ItemMaster::updateOrCreate(['id' => $data['id']], $data);
        flash()->option('position', 'bottom-right')->option('timeout', 3000)->success($message);
        return redirect()->route('items.show');
    }
    public function destroy($id)
    {
        ItemMaster::find($id)->delete();
        flash()->option('position', 'bottom-right')->option('timeout', 3000)->info('item deleted successfully');
        return redirect()->route('items.show');
    }
}
