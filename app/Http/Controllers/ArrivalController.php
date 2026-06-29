<?php

namespace App\Http\Controllers;

use App\Models\Arrival;
use App\Models\ArrivalDetail;
use App\Models\Product;
use App\Models\StockMovement;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArrivalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arrivals = Arrival::with('supplier')
            ->latest()
            ->paginate(7);


        $suppliers = Supplier::all();


        $products = Product::all();


        return view('arrivals.index', compact(
            'arrivals',
            'suppliers',
            'products'
        ));
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

            'supplier_id'=>'required',

            'arrival_date'=>'required',

            'products'=>'required|array',

        ]);




        DB::transaction(function () use ($request) {



            // CREATE ARRIVAL

            $arrival = Arrival::create([


                'reference'=>'ARR-'.time(),


                'supplier_id'=>$request->supplier_id,


                'arrival_date'=>$request->arrival_date,


                'total_amount'=>0,


                'status'=>'Received',


                'user_id'=>auth()->id(),


            ]);





            $total = 0;



            foreach($request->products as $item)
            {



                $product = Product::findOrFail(
                    $item['product_id']
                );



                $quantity = $item['quantity'];


                $price = $item['purchase_price'];



                $subtotal = $quantity * $price;



                $total += $subtotal;




                // CREATE ARRIVAL DETAIL

                ArrivalDetail::create([


                    'arrival_id'=>$arrival->id,


                    'product_id'=>$product->id,


                    'quantity'=>$quantity,


                    'purchase_price'=>$price,


                    'subtotal'=>$subtotal,


                ]);






                // UPDATE STOCK

                $product->increment(
                    'quantity',
                    $quantity
                );






                // STOCK MOVEMENT

                StockMovement::create([


                    'product_id'=>$product->id,


                    'type'=>'IN',


                    'quantity'=>$quantity,


                    'description'=>'Arrival '.$arrival->reference,


                    'user_id'=>auth()->id(),


                ]);



            }





            $arrival->update([

                'total_amount'=>$total

            ]);




        });





        return back()
            ->with(
                'success',
                'Arrival created successfully'
            );


    }

    /**
     * Display the specified resource.
     */
    public function show(Arrival $arrival)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Arrival $arrival)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Arrival $arrival)
    {


        $request->validate([
            'supplier_id'=>'required',
        ]);



        $arrival->update([

            'supplier_id'=>$request->supplier_id,

            'arrival_date'=>$request->arrival_date,

        ]);



        return back()
            ->with(
                'success',
                'Arrival updated successfully'
            );


    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Arrival $arrival)
    {

        $arrival->delete();


        return back()
            ->with(
                'success',
                'Arrival deleted successfully'
            );

    }

    public function details($arrival)
    {

        $details = ArrivalDetail::with('product')
            ->where('arrival_id',$arrival)
            ->get();


        return response()->json($details);

    }
}
