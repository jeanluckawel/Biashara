<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $permissions = [


            // Dashboard
            'dashboard.view',


            // Profile
            'profile.view',
            'profile.edit',



            // Categories
            'categories.view',
            'categories.create',
            'categories.edit',
            'categories.delete',



            // Products
            'products.view',
            'products.create',
            'products.edit',
            'products.delete',



            // Stock movements
            'stock.view',
            'stock.create',
            'stock.edit',
            'stock.delete',


            // Suppliers
            'suppliers.view',
            'suppliers.create',
            'suppliers.edit',
            'suppliers.delete',



            // Customers
            'customers.view',
            'customers.create',
            'customers.edit',
            'customers.delete',



            // Arrivals
            'arrivals.view',
            'arrivals.create',
            'arrivals.edit',
            'arrivals.delete',
            'arrivals.details',



            // Arrival details
            'arrival-details.view',



            // Sales
            'sales.view',
            'sales.create',
            'sales.edit',
            'sales.delete',
            'sales.details',
            'sales.print',
            'sales.export',



            // Users
            'users.view',
            'users.create',
            'users.edit',
            'users.delete',



            // Roles
            'roles.view',
            'roles.create',
            'roles.edit',
            'roles.delete',


        ];
        foreach ($permissions as $permission) {
           Permission::create([
               'name' => $permission,
               'guard_name' => 'web'
           ]);
        }
    }

}
