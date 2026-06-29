<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $admin = Role::firstOrCreate([
            'name'=>'Admin',
            'guard_name'=>'web'
        ]);


        $admin->syncPermissions(
            Permission::all()
        );

        $manager = Role::firstOrCreate([
            'name'=>'Manager',
            'guard_name'=>'web'
        ]);


        $manager->syncPermissions([


            'dashboard.view',


            'products.view',
            'products.create',
            'products.edit',


            'categories.view',
            'categories.create',
            'categories.edit',


            'stock.view',
            'stock.create',


            'suppliers.view',
            'customers.view',


            'arrivals.view',
            'arrivals.create',
            'arrivals.details',


            'sales.view',
            'sales.details',
            'sales.export',
            'sales.print',

        ]);


        $cashier = Role::firstOrCreate([
            'name'=>'Cashier',
            'guard_name'=>'web'
        ]);



        $cashier->syncPermissions([


            'dashboard.view',


            'customers.view',
            'customers.create',


            'products.view',


            'sales.view',
            'sales.create',
            'sales.details',
            'sales.print',

        ]);


        $stock = Role::firstOrCreate([
            'name'=>'Stock Manager',
            'guard_name'=>'web'
        ]);


        $stock->syncPermissions([


            'dashboard.view',


            'products.view',
            'products.create',
            'products.edit',


            'categories.view',


            'stock.view',
            'stock.create',
            'stock.edit',


            'arrivals.view',
            'arrivals.create',
            'arrivals.edit',
            'arrivals.details',


            'suppliers.view',
            'suppliers.create',
            'suppliers.edit',


        ]);

    }
}
