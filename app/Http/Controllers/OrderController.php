<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\MarketItems;
use App\Models\Orders;
use App\Models\User;
use Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Orders::where('buyer_id', Auth::id())->get();
        $is_pending = Orders::where('buyer_id', Auth::id())->where('pending', 1)->first();
        $is_notpending = Orders::where('buyer_id', Auth::id())->where('pending', 0)->first();
        
        foreach ($orders as $order) {
            $order->items = MarketItems::find($order->item_id);
            $order->seller = User::find($order->items['seller_id']);
        }
        $empty = Orders::where('buyer_id', Auth::id())->count() === 0;
        return view('orders.index', ['orders' => $orders, 
                                    'empty' => $empty, 
                                    'is_pending' => $is_pending, 
                                    'is_notpending' => $is_notpending
                                    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function add_order(Request $request, $id)
    {
        $item = MarketItems::find($id);

        $validator = Validator::make($request->all(), [
            'total_quantity' => ['required', 'lte:'.$item->item_qty, 'gt:0'],
        ]);

        if($validator->fails()){
            return redirect()->back()->with('errors', $validator->errors());
        }

        Orders::create([
            'item_id' => $id,
            'buyer_id' => Auth::id(),
            'total_quantity' => $request->total_quantity,
            'total_amount' => $request->total_quantity * $item->item_price,
        ]);

        $item->update(['item_qty' => $item->item_qty - $request->total_quantity]);

        return redirect()->back()->with('success', 'Order successful!');
    }
    
    public function cancel_order($id){
        $order = Orders::findOrFail($id);
        $item = MarketItems::find($order->item_id);

        $item->update(['item_qty' => $item->item_qty + $order->total_quantity]);
        $order->delete();

        return redirect()->back()->with('success', 'Order Cancelled');
    }

    public function completed($id)
    {
        $order = Orders::findOrFail($id);
        
        $order->update(['pending' => 0]);

        return redirect()->back()->with('success', 'Received');
    }

    public function clear_all(){
        Orders::where('buyer_id', Auth::id())->where('pending', 0)->delete();
    
        return redirect()->back()->with('success', 'Received Items Cleared');
    }
    
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
