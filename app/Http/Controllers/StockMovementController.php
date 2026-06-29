<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class StockMovementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $movements = StockMovement::with([
            'product.category',
            'user'
        ])
            ->latest()
            ->paginate(7);


        $products = Product::orderBy('name')->get();


        return view(
            'stock.index',
            compact(
                'movements',
                'products'
            )
        );

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

        $request->validate([

            'product_id'=>'required|exists:products,id',

            'quantity'=>'required|integer|min:1',

            'description'=>'nullable|string'

        ]);


        $product = Product::findOrFail(
            $request->product_id
        );


        $product->increment(
            'quantity',
            $request->quantity
        );


        StockMovement::create([


            'product_id'=>$product->id,


            'user_id'=>auth()->id(),


            'type'=>'IN',


            'quantity'=>$request->quantity,


            'description'=>$request->description ?? 'Restock'


        ]);


        return back()->with(
            'success',
            'Stock added successfully.'
        );


    }

    /**
     * Display the specified resource.
     */
    public function show(StockMovement $stockMovement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StockMovement $stockMovement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StockMovement $stockMovement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockMovement $stockMovement)
    {
        //
    }
}
