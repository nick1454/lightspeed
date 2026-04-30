<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Unit;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $units = [

            [
                'id' => 1,
                'name' => 'Bag',
                'short_name' => 'Bag',
                'description' => 'Used for cement, putty, adhesive and packaged materials',
            ],

            [
                'id' => 2,
                'name' => 'Kilogram',
                'short_name' => 'Kg',
                'description' => 'Weight based unit for steel, chemicals and powdered materials',
            ],

            [
                'id' => 3,
                'name' => 'Metric Ton',
                'short_name' => 'Ton',
                'description' => 'Bulk material unit for sand, aggregates and concrete',
            ],

            [
                'id' => 4,
                'name' => 'Piece',
                'short_name' => 'Pc',
                'description' => 'Single piece unit for bricks, blocks and sheets',
            ],

            [
                'id' => 5,
                'name' => 'Square Foot',
                'short_name' => 'Sqft',
                'description' => 'Area unit for tiles, marble, flooring and glass',
            ],

            [
                'id' => 6,
                'name' => 'Numbers',
                'short_name' => 'Nos',
                'description' => 'Count based unit for fittings, tools and hardware',
            ],

            [
                'id' => 7,
                'name' => 'Liter',
                'short_name' => 'Ltr',
                'description' => 'Volume unit for paints and liquid chemicals',
            ],

            [
                'id' => 8,
                'name' => 'Meter',
                'short_name' => 'Mtr',
                'description' => 'Length unit for pipes, wires and scaffolding',
            ],

            // Future-proof extras

            [
                'id' => 9,
                'name' => 'Cubic Foot',
                'short_name' => 'Cft',
                'description' => 'Volume unit for sand and aggregates',
            ],

            [
                'id' => 10,
                'name' => 'Cubic Meter',
                'short_name' => 'Cum',
                'description' => 'Concrete and excavation volume unit',
            ],

            [
                'id' => 11,
                'name' => 'Roll',
                'short_name' => 'Roll',
                'description' => 'Used for membranes, wires and laminates',
            ],

            [
                'id' => 12,
                'name' => 'Sheet',
                'short_name' => 'Sheet',
                'description' => 'Used for plywood, metal and glass sheets',
            ],

            [
                'id' => 13,
                'name' => 'Box',
                'short_name' => 'Box',
                'description' => 'Packed hardware and fittings',
            ],

            [
                'id' => 14,
                'name' => 'Bundle',
                'short_name' => 'Bdl',
                'description' => 'Steel, rods and timber bundles',
            ],

            [
                'id' => 15,
                'name' => 'Foot',
                'short_name' => 'Ft',
                'description' => 'Linear foot measurement',
            ],

        ];

        foreach ($units as $unit) {
            Unit::updateOrCreate(
                ['id' => $unit['id']],
                $unit
            );
        }
    }
}
