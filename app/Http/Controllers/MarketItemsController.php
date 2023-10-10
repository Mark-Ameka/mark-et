<?php

namespace App\Http\Controllers;

use App\Models\MarketItems;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarketItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = MarketItems::all();
    
        return view('market.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('market.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'item_name' => 'required',
            'item_description' => 'required',
            'item_qty' => 'required',
            'item_price' => 'required',
        ]);

        if ($validator->fails())
            return redirect()->back()->with('errors', $validator->errors()->all());

        MarketItems::create([
            'item_name' => $request->item_name,
            'item_description' => $request->item_description,
            'item_qty' => $request->item_qty,
            'item_price' => $request->item_price,
        ]);

        return redirect()->back()->with('success', 'Item added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $item = MarketItems::findOrFail($id);
        return view('market.view')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = MarketItems::findOrFail($id); 
        return view('market.edit', ['item' => $item]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = MarketItems::findOrFail($id); 
        $item->update($request->all()); 
        return redirect('/home');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = MarketItems::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Item deleted successfully.');
    }
}
