<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::latest()->paginate(7);

        return view('customers.index', compact('customers'));
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

            'name'=>'required|string|max:255',

            'phone'=>'nullable|string',

            'address'=>'nullable|string',

        ]);



        $customer = Customer::create([

            'name'=>$request->name,

            'phone'=>$request->phone,

            'address'=>$request->address,

        ]);




        if($request->from == 'sale'){


            return response()->json([

                'success'=>true,

                'customer'=>$customer

            ]);


        }



        return redirect()

            ->route('customers.index')

            ->with('success','Customer created successfully.');

    }
    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([

            'name' => 'required|string|max:255',

            'phone' => 'nullable|string|max:50',

            'address' => 'nullable|string|max:255',

        ]);





        $exists = Customer::where('name', $request->name)
            ->where('phone', $request->phone)
            ->where('id', '!=', $customer->id)
            ->exists();



        if($exists){

            return redirect()
                ->back()
                ->withInput()
                ->with('error','This customer already exists.');

        }



        $customer->update([

            'name' => ucfirst(strtolower($request->name)),

            'phone' => $request->phone,

            'address' => $request->address,

        ]);



        return redirect()

            ->route('customers.index')

            ->with('success','Customer updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {

        $customer->delete();



        return redirect()

            ->route('customers.index')

            ->with('success','Customer deleted successfully.');

    }
}
