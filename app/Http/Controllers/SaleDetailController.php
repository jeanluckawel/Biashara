<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\SaleDetail;
use Illuminate\Http\Request;

class SaleDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Sale::with(['customer','user']);



        $sales = $query
            ->latest()
            ->paginate(7);


        return view('sales.detail', compact('sales'));

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

    /**
     * Display the specified resource.
     */
    public function show(SaleDetail $saleDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SaleDetail $saleDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SaleDetail $saleDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SaleDetail $saleDetail)
    {
        //
    }
}
