<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;
use App\Models\SaleDetail;
use App\Models\StockMovement;
use Illuminate\Support\Facades\DB;


class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::orderBy('name')->get();

        $products = Product::where('quantity','>',0)
            ->orderBy('name')
            ->get();


        return view('sales.index',compact(
            'customers',
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

    //    dd($request->all());
        $request->validate([

            'products' => 'required',

            'total_amount' => 'required|numeric',

            'paid_amount' => 'required|numeric',

            'payment_method' => 'required',

        ]);

        $products = json_decode($request->products, true);

        if(empty($products))
        {
            return back()->with('error','No product selected.');
        }

        DB::transaction(function() use($request,$products){

            /*
            |--------------------------------------------------------------------------
            | STATUS
            |--------------------------------------------------------------------------
            */

            if($request->paid_amount >= $request->total_amount){

                $status='Paid';

            }elseif($request->paid_amount > 0){

                $status='Partial';

            }else{

                $status='Pending';

            }

            /*
            |--------------------------------------------------------------------------
            | CREATE SALE
            |--------------------------------------------------------------------------
            */

            $sale = Sale::create([

                'customer_id'=>$request->customer_id,

                'user_id'=>auth()->id(),

                'reference'=>'INV-'.date('YmdHis'),

                'sale_date'=>today(),

                'total_amount'=>$request->total_amount,

                'paid_amount'=>$request->paid_amount,

                'currency'=>$products[0]['currency'],

                'payment_method'=>$request->payment_method,

                'status'=>$status,

            ]);

            /*
            |--------------------------------------------------------------------------
            | DETAILS
            |--------------------------------------------------------------------------
            */

            foreach($products as $item){

                $product = Product::findOrFail($item['id']);

                $subtotal = $item['qty'] * $item['price'];

                SaleDetail::create([

                    'sale_id'=>$sale->id,

                    'product_id'=>$product->id,

                    'quantity'=>$item['qty'],

                    'unit_price'=>$item['price'],

                    'discount'=>0,

                    'subtotal'=>$subtotal,

                ]);

                /*
                |--------------------------------------------------------------------------
                | UPDATE STOCK
                |--------------------------------------------------------------------------
                */

                $product->decrement(
                    'quantity',
                    $item['qty']
                );

                /*
                |--------------------------------------------------------------------------
                | STOCK MOVEMENT
                |--------------------------------------------------------------------------
                */

                StockMovement::create([

                    'product_id'=>$product->id,

                    'type'=>'OUT',

                    'quantity'=>$item['qty'],

                    'description'=>'Sale '.$sale->reference,

                    'user_id'=>auth()->id(),

                ]);

            }

        });

        return redirect()
                ->route('sales.index')
                ->with(
                    'success',
                    'Sale completed successfully.'
                );
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }

    public function details(Sale $sale)
    {

    }
}
