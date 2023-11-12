<?php

namespace App\Http\Controllers;

use App\Models\MarketItems;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
 
class MarketItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagination = session('pagination', 10);
        $items = MarketItems::where('item_qty', '!=', 0)->paginate($pagination);
        foreach ($items as $item) {
            $item->seller = User::find($item->seller_id);
        }
        $empty = MarketItems::count() === 0;
    
        return view('market.index', ['items' => $items, 'empty' => $empty, 'pagination' => $pagination]);
    }

    public function mymarket_index(){
        $id = Auth::id();
        $pagination = session('pagination', 10);
        $items = MarketItems::where('seller_id', $id)->paginate($pagination);
        $empty = MarketItems::where('seller_id', $id)->count() === 0;

        return view('sell.market', ['items' => $items, 'empty' => $empty, 'pagination' => $pagination]);
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
            'item_name' => 'required|string|max:50',
            'item_description' => 'required|string|max:200',
            'item_qty' => 'required',
            'item_price' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->with('errors', $validator->errors());
        }

        MarketItems::create([
            'seller_id' => Auth::id(),
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
        $item->seller = User::find($item->seller_id);

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
        $validator = Validator::make($request->all(),[
            'item_name' => 'required|string|max:50',
            'item_description' => 'required|string|max:200',
            'item_qty' => 'required',
            'item_price' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->with('errors', $validator->errors()->all());
        }
        
        $item->update($request->all()); 
        return redirect()->back()->with('success', 'Item updated successfully.');
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

    public function search(Request $request)
    {
        $id = Auth::id();
        $query = $request->input('search');

        $pagination = session('pagination', 10);
        $items = MarketItems::where('item_name', 'LIKE', '%' . $query . '%')->paginate($pagination);
        foreach ($items as $item) {
            $item->seller = User::find($item->seller_id);
        }
        $empty = MarketItems::count() === 0;

        return view('market.index', ['items' => $items, 'empty' => $empty, 'pagination' => $pagination]);
    }

    public function mymarket_search(Request $request)
    {
        $id = Auth::id();
        $query = $request->input('search');

        $pagination = session('pagination', 10);
        $items = MarketItems::where('seller_id', $id)->where('item_name', 'LIKE', '%' . $query . '%')->paginate($pagination);
        foreach ($items as $item) {
            $item->seller = User::find($item->seller_id);
        }
        $empty = MarketItems::where('seller_id', $id)->count() === 0;

        return view('sell.market', ['items' => $items, 'empty' => $empty, 'pagination' => $pagination]);
    }
}
