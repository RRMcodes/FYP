<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemLog;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $items = Item::all();
        return view('item.index')->with(compact('items'));
    }

    public function itemLog()
    {
        $itemLogs = ItemLog::all();
        $item = Item::all();
        return view('item.log')->with(compact('itemLogs','item'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('item.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {

        $item = $request->except(['_token']);
        Item::create($item);
        return redirect()->route('item.index')->with('message', 'Item created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $item = Item::find($id);
        return view('item.show')->with(compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $item = Item::find($id);
        return view('item.edit')->with(compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request)
    {
        $new_item = $request->except(['_token']);
        $item = Item::find($request->id);
        $total = $new_item['quantity'] - $item->quantity;
        if ($total > 0 ){
            ItemLog::create([
                'item_id'=>$item->id,
                'quantity'=>abs($total),
                'status'=> 'added'
            ]);        }
        else if ($total < 0){
            ItemLog::create([
                'item_id'=>$item->id,
                'quantity'=>abs($total),
                'status'=> 'deducted'
            ]);
        }



        Item::find($request->id)->update($new_item);
        return redirect()->route('item.index')->with('message', 'Item updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        $item->delete();

        return redirect()->route('item.index')->with('message', 'Item deleted successfully.');
    }
}
