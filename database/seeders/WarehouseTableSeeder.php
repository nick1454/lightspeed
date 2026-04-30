<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Warehouse;

class WarehouseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $warehouses = [

            [
                'name' => 'Main Central Warehouse',
                'address' => 'Panipat Industrial Area, Haryana'
            ],

            [
                'name' => 'Cement Godown',
                'address' => 'GT Road Panipat, Haryana'
            ],

            [
                'name' => 'Steel Yard',
                'address' => 'Sector 29 Panipat, Haryana'
            ],

            [
                'name' => 'Aggregate Yard',
                'address' => 'Transport Nagar Panipat, Haryana'
            ],

            [
                'name' => 'Tile & Sanitary Store',
                'address' => 'Model Town Panipat, Haryana'
            ],

            [
                'name' => 'Electrical Store',
                'address' => 'Industrial Estate Panipat, Haryana'
            ],

            [
                'name' => 'Project Site Warehouse A',
                'address' => 'Site A Warehouse Block'
            ],

            [
                'name' => 'Project Site Warehouse B',
                'address' => 'Site B Warehouse Block'
            ],

            [
                'name' => 'Chemical Storage Unit',
                'address' => 'Safe Storage Zone Panipat'
            ],

            [
                'name' => 'Tool & Equipment Store',
                'address' => 'Workshop Compound Panipat'
            ],

        ];

        foreach($warehouses as $warehouse){
            Warehouse::updateOrCreate(
                [
                    'name' => $warehouse['name']
                ],
                $warehouse
            );
        }
    }
}
