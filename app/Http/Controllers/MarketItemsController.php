<?php

namespace App\Http\Controllers;

use App\Models\MarketItems;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
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
        $filename = null;
        
        $validator = Validator::make($request->all(),[
            'item_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'item_name' => 'required|string|max:50',
            'item_description' => 'required|string|max:200',
            'item_qty' => 'required',
            'item_price' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->with('errors', $validator->errors());
        }

        if($request->hasFile('item_image')){
            $file = $request->file('item_image');
            $extension = $file->getClientOriginalExtension();
            
            $filename = time().'.'.$extension;
            $directory = 'items';

            $file->move($directory, $filename);
        } else{
            $filename = 'default.png';
        }
        
        MarketItems::create([
            'seller_id' => Auth::id(),
            'item_image' => $filename,
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

        // Session::put('previous_url', url()->previous());
        // $previousUrl = Session::get('previous_url');

        return view('market.view', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $is_default = true;
        $item = MarketItems::findOrFail($id);

        if($item->item_image != 'default.png'){
            $is_default = false;
        }
        return view('market.edit', ['item' => $item, 'is_default' => $is_default]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = MarketItems::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'item_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'item_name' => 'required|string|max:50',
            'item_description' => 'required|string|max:200',
            'item_qty' => 'required',
            'item_price' => 'required',
        ]);

        if ($validator->fails()){
            return redirect()->back()->with('errors', $validator->errors()->all());
        }

        // Item Image
        if ($request->hasFile('item_image')) {
            $file = $request->file('item_image');
            $extension = $file->getClientOriginalExtension();
            
            $filename = time().'.'.$extension;
            $directory = 'items';
    
            $file->move($directory, $filename);
    
            if ($item->item_image != 'default.png') {
                File::delete(public_path('items/' . $item->item_image));
            }

            $item->item_image = $filename;
        }

        $item->item_name = $request->item_name;
        $item->item_description = $request->item_description;
        $item->item_qty = $request->item_qty;
        $item->item_price = $request->item_price;

        $item->save();
        return redirect()->back()->with('success', 'Item updated successfully.');
    }

    public function remove_image(Request $request, $id)
    {
        $item = MarketItems::find($id);
        $validated = $request->validate([
            'item_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($item->item_image != 'default.png') {
            $filename = 'default.png';
    
            File::delete(public_path('items/' . $item->item_image));
    
            $validated['item_image'] = $filename;
        }

        $item->update(['item_image' => $validated['item_image']]);
        return redirect()->back()->with('success', 'Item updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $item = MarketItems::findOrFail($id);
        
        if ($item->item_image != 'default.png') {
            File::delete(public_path('items/' . $item->item_image));
        }

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
