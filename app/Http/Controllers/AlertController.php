<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class AlertController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->latest()
            ->paginate(10);

        $categories = Category::all();

        $lowStockProducts = Product::where('quantity', '<=', 5)
            ->orderBy('quantity')
            ->get();

        return view('alerts.index', compact(
            'products',
            'categories',
            'lowStockProducts'
        ));
    }
}
