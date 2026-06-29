<?php

namespace App\Http\Controllers;

use App\Models\Arrival;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Sale;
use App\Models\StockMovement;
use App\Models\Supplier;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {

        return view('dashbord.index',[

            'productsCount' => Product::count(),

            'usersCount' => User::count(),


            'lowStockCount' => Product::where(
                'quantity',
                '<=',
                5
            )->count(),


            'movementsCount' => StockMovement::count(),


            'categoriesCount' => Category::count(),


            'suppliersCount' => Supplier::count(),


            'arrivalsCount' => Arrival::count(),



            'salesTodayCount' => Sale::whereDate(
                'sale_date',
                today()
            )->count(),



            'totalSales' => Sale::sum(
                'total_amount'
            ),



            'customersCount' => Customer::count(),



            'outStockCount' => Product::where(
                'quantity',
                0
            )->count(),


        ]);

    }
}
