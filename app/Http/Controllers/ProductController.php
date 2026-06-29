<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $products = Product::with('category')
            ->latest()
            ->paginate(7);

        $categories = Category::all();


        return view('products.index', compact(
            'products',
            'categories',
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

            'category_id'     => 'required|exists:categories,id',

            'name'            => 'required|string|max:255',

            'selling_price'   => 'nullable|numeric|min:0',

            'currency'        => 'nullable|in:USD,CDF',

        ]);





        // Vérifier doublon produit

        if(Product::where('name',$request->name)->exists()){


            return redirect()

                ->back()

                ->withInput()

                ->with('error','This product already exists.');


        }





        $category = Category::findOrFail($request->category_id);



        $lastProduct = Product::latest()->first();


        $number = str_pad(

            ($lastProduct?->id ?? 0) + 1,

            4,

            '0',

            STR_PAD_LEFT

        );


        $code = 'P'
            . strtoupper(substr($category->name,0,1))
            . strtoupper(substr($request->name,0,1))
            . $number;


        $product = Product::create([


            'category_id' => $request->category_id,


            'name' => ucfirst(strtolower($request->name)),


            'code' => $code,


            'quantity' => 0,


            'purchase_price' => 0,

            'selling_price' => $request->selling_price ?? null,



            'discount' => 0,


            'tax' =>  0,


            'currency' => $request->currency ?? 'USD',



            'total' => 0,


        ]);




        return redirect()

            ->route('products.index')

            ->with('success','Product created successfully.');

    }
    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {

        $request->validate([

            'category_id'=>'required|exists:categories,id',

            'name'=>'required|string|max:255',

            'selling_price'=>'nullable|numeric|min:0',

            'discount'=>'nullable|numeric|min:0|max:100',

            'tax'=>'nullable|numeric|min:0',

            'currency'=>'required|in:USD,CDF',

        ]);



        $product->update([

            'category_id'=>$request->category_id,

            'name'=>ucfirst(strtolower($request->name)),

            'selling_price'=>$request->selling_price ?? 0,

            'discount'=>$request->discount ?? 0,

            'tax'=>$request->tax ?? 0,

            'currency'=>$request->currency,


        ]);



        return redirect()
            ->route('products.index')
            ->with('success','Product updated successfully.');

    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //

        {

            $product->delete();


            return redirect()
                ->route('products.index')
                ->with('success','Product deleted successfully.');

        }
    }
}
