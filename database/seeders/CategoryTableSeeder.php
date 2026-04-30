<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['id'=>1,'name'=>'Cement','description'=>'Ordinary Portland cement, white cement and specialty cement'],
            ['id'=>2,'name'=>'Sand','description'=>'River sand, M-sand and plaster sand'],
            ['id'=>3,'name'=>'Aggregates','description'=>'Stone aggregates, gravel and crushed stone'],
            ['id'=>4,'name'=>'Bricks','description'=>'Clay bricks, fly ash bricks and concrete blocks'],
            ['id'=>5,'name'=>'Steel & TMT Bars','description'=>'Reinforcement bars, structural steel and rods'],
            ['id'=>6,'name'=>'Concrete','description'=>'Ready mix concrete and precast concrete products'],
            ['id'=>7,'name'=>'Blocks','description'=>'AAC blocks, hollow blocks and solid blocks'],
            ['id'=>8,'name'=>'Tiles','description'=>'Floor tiles, wall tiles and vitrified tiles'],
            ['id'=>9,'name'=>'Marble & Granite','description'=>'Natural stones for flooring and cladding'],
            ['id'=>10,'name'=>'Paints','description'=>'Interior, exterior and industrial paints'],
            ['id'=>11,'name'=>'Plumbing Materials','description'=>'Pipes fittings valves and sanitary supplies'],
            ['id'=>12,'name'=>'Electrical Materials','description'=>'Wires cables switches and accessories'],
            ['id'=>13,'name'=>'Hardware','description'=>'Nuts bolts fasteners and hardware'],
            ['id'=>14,'name'=>'Wood & Timber','description'=>'Plywood timber boards and wood products'],
            ['id'=>15,'name'=>'Roofing Materials','description'=>'Roof sheets shingles and roofing products'],
            ['id'=>16,'name'=>'Waterproofing','description'=>'Membranes chemicals and waterproof coatings'],
            ['id'=>17,'name'=>'Adhesives & Sealants','description'=>'Tile adhesives construction chemicals sealants'],
            ['id'=>18,'name'=>'Glass','description'=>'Construction and architectural glass'],
            ['id'=>19,'name'=>'Doors & Windows','description'=>'Doors windows frames and fittings'],
            ['id'=>20,'name'=>'Insulation Materials','description'=>'Thermal and acoustic insulation'],
            ['id'=>21,'name'=>'Scaffolding','description'=>'Scaffolding pipes fittings accessories'],
            ['id'=>22,'name'=>'Tools & Equipment','description'=>'Hand tools power tools construction equipment'],
            ['id'=>23,'name'=>'PVC Materials','description'=>'PVC pipes fittings and sheets'],
            ['id'=>24,'name'=>'Flooring Materials','description'=>'Wooden vinyl and industrial flooring'],
            ['id'=>25,'name'=>'Construction Chemicals','description'=>'Grouts admixtures curing compounds chemicals'],

        ];

        foreach($categories as $category){
            Category::updateOrCreate(
                ['id'=>$category['id']],
                $category
            );
        }
    }
}
