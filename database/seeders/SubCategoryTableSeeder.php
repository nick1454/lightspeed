<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubCategory;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [

            // Cement
            ['category_id'=>1,'name'=>'OPC Cement','description'=>'Ordinary Portland Cement'],
            ['category_id'=>1,'name'=>'PPC Cement','description'=>'Portland Pozzolana Cement'],
            ['category_id'=>1,'name'=>'White Cement','description'=>'Decorative finishing cement'],
            ['category_id'=>1,'name'=>'Rapid Hardening Cement','description'=>'High early strength cement'],

            // Sand
            ['category_id'=>2,'name'=>'River Sand','description'=>'Natural river construction sand'],
            ['category_id'=>2,'name'=>'M-Sand','description'=>'Manufactured sand'],
            ['category_id'=>2,'name'=>'Plaster Sand','description'=>'Fine plastering sand'],

            // Aggregates
            ['category_id'=>3,'name'=>'10mm Aggregate','description'=>'Small stone aggregate'],
            ['category_id'=>3,'name'=>'20mm Aggregate','description'=>'Standard aggregate'],
            ['category_id'=>3,'name'=>'Crusher Dust','description'=>'Crushed stone dust'],

            // Bricks
            ['category_id'=>4,'name'=>'Red Clay Bricks','description'=>'Traditional fired bricks'],
            ['category_id'=>4,'name'=>'Fly Ash Bricks','description'=>'Fly ash eco bricks'],
            ['category_id'=>4,'name'=>'Concrete Bricks','description'=>'Solid concrete bricks'],

            // Steel
            ['category_id'=>5,'name'=>'TMT Bars Fe500','description'=>'Fe500 reinforcement'],
            ['category_id'=>5,'name'=>'TMT Bars Fe550','description'=>'Fe550 reinforcement'],
            ['category_id'=>5,'name'=>'Structural Steel','description'=>'Angles channels beams'],
            ['category_id'=>5,'name'=>'Binding Wire','description'=>'Steel binding wire'],

            // Concrete
            ['category_id'=>6,'name'=>'Ready Mix Concrete','description'=>'RMC products'],
            ['category_id'=>6,'name'=>'Precast Concrete','description'=>'Factory precast units'],
            ['category_id'=>6,'name'=>'Concrete Pavers','description'=>'Paver blocks'],

            // Blocks
            ['category_id'=>7,'name'=>'AAC Blocks','description'=>'Autoclaved aerated blocks'],
            ['category_id'=>7,'name'=>'Hollow Blocks','description'=>'Concrete hollow blocks'],
            ['category_id'=>7,'name'=>'Solid Blocks','description'=>'Solid blocks'],

            // Tiles
            ['category_id'=>8,'name'=>'Vitrified Tiles','description'=>'Premium floor tiles'],
            ['category_id'=>8,'name'=>'Ceramic Tiles','description'=>'Ceramic tiles'],
            ['category_id'=>8,'name'=>'Bathroom Tiles','description'=>'Wet area tiles'],

            // Marble
            ['category_id'=>9,'name'=>'Marble Slabs','description'=>'Natural marble'],
            ['category_id'=>9,'name'=>'Granite Slabs','description'=>'Granite products'],
            ['category_id'=>9,'name'=>'Stone Cladding','description'=>'Decorative cladding'],

            // Paint
            ['category_id'=>10,'name'=>'Interior Paint','description'=>'Indoor paints'],
            ['category_id'=>10,'name'=>'Exterior Paint','description'=>'Outdoor paints'],
            ['category_id'=>10,'name'=>'Primer','description'=>'Base coat'],
            ['category_id'=>10,'name'=>'Putty','description'=>'Wall putty'],

            // Plumbing
            ['category_id'=>11,'name'=>'PVC Pipes','description'=>'Standard pipes'],
            ['category_id'=>11,'name'=>'CPVC Pipes','description'=>'Hot cold pipes'],
            ['category_id'=>11,'name'=>'Bathroom Fittings','description'=>'Sanitary fittings'],
            ['category_id'=>11,'name'=>'Valves','description'=>'Control valves'],

            // Electrical
            ['category_id'=>12,'name'=>'Electrical Wires','description'=>'Copper wires'],
            ['category_id'=>12,'name'=>'Switches','description'=>'Modular switches'],
            ['category_id'=>12,'name'=>'MCB & DB','description'=>'Protection devices'],
            ['category_id'=>12,'name'=>'Lighting','description'=>'Lighting products'],

            // Hardware
            ['category_id'=>13,'name'=>'Fasteners','description'=>'Bolts nuts screws'],
            ['category_id'=>13,'name'=>'Door Hardware','description'=>'Locks hinges handles'],
            ['category_id'=>13,'name'=>'Safety Hardware','description'=>'Safety accessories'],

            // Wood
            ['category_id'=>14,'name'=>'Plywood','description'=>'Plywood sheets'],
            ['category_id'=>14,'name'=>'Timber Logs','description'=>'Natural timber'],
            ['category_id'=>14,'name'=>'MDF Boards','description'=>'Engineered boards'],
            ['category_id'=>14,'name'=>'Laminates','description'=>'Decorative laminates'],

            // Roofing
            ['category_id'=>15,'name'=>'GI Roofing Sheets','description'=>'Galvanized sheets'],
            ['category_id'=>15,'name'=>'Shingles','description'=>'Roof shingles'],
            ['category_id'=>15,'name'=>'Polycarbonate Sheets','description'=>'Roofing sheets'],

            // Waterproofing
            ['category_id'=>16,'name'=>'Waterproof Coatings','description'=>'Coatings'],
            ['category_id'=>16,'name'=>'Bitumen Membranes','description'=>'Membranes'],
            ['category_id'=>16,'name'=>'Injection Grouts','description'=>'Grouting'],

            // Adhesives
            ['category_id'=>17,'name'=>'Tile Adhesive','description'=>'Tile adhesive'],
            ['category_id'=>17,'name'=>'Epoxy Grout','description'=>'Epoxy grout'],
            ['category_id'=>17,'name'=>'Construction Sealants','description'=>'Sealants'],

            // Glass
            ['category_id'=>18,'name'=>'Float Glass','description'=>'Clear glass'],
            ['category_id'=>18,'name'=>'Toughened Glass','description'=>'Tempered glass'],
            ['category_id'=>18,'name'=>'Laminated Glass','description'=>'Security glass'],

            // Doors
            ['category_id'=>19,'name'=>'Flush Doors','description'=>'Flush doors'],
            ['category_id'=>19,'name'=>'UPVC Windows','description'=>'UPVC windows'],
            ['category_id'=>19,'name'=>'Aluminium Windows','description'=>'Aluminium windows'],

            // Insulation
            ['category_id'=>20,'name'=>'Thermal Insulation','description'=>'Heat insulation'],
            ['category_id'=>20,'name'=>'Acoustic Insulation','description'=>'Sound insulation'],
            ['category_id'=>20,'name'=>'Foam Boards','description'=>'Foam boards'],

            // Scaffolding
            ['category_id'=>21,'name'=>'Scaffolding Pipes','description'=>'Scaffold pipes'],
            ['category_id'=>21,'name'=>'Couplers','description'=>'Connectors'],
            ['category_id'=>21,'name'=>'Walk Boards','description'=>'Platforms'],

            // Tools
            ['category_id'=>22,'name'=>'Hand Tools','description'=>'Manual tools'],
            ['category_id'=>22,'name'=>'Power Tools','description'=>'Power tools'],
            ['category_id'=>22,'name'=>'Safety Equipment','description'=>'PPE'],

            // PVC
            ['category_id'=>23,'name'=>'PVC Sheets','description'=>'PVC sheets'],
            ['category_id'=>23,'name'=>'PVC Fittings','description'=>'PVC fittings'],
            ['category_id'=>23,'name'=>'PVC Panels','description'=>'Panels'],

            // Flooring
            ['category_id'=>24,'name'=>'Wooden Flooring','description'=>'Wood flooring'],
            ['category_id'=>24,'name'=>'Vinyl Flooring','description'=>'Vinyl flooring'],
            ['category_id'=>24,'name'=>'Epoxy Flooring','description'=>'Industrial flooring'],

            // Chemicals
            ['category_id'=>25,'name'=>'Admixtures','description'=>'Concrete admixtures'],
            ['category_id'=>25,'name'=>'Tile Grouts','description'=>'Grouting'],
            ['category_id'=>25,'name'=>'Curing Compounds','description'=>'Curing chemicals'],
            ['category_id'=>25,'name'=>'Repair Mortars','description'=>'Repair products'],
        ];

        foreach($subcategories as $sub){
            SubCategory::updateOrCreate(
                [
                    'category_id'=>$sub['category_id'],
                    'name'=>$sub['name']
                ],
                $sub
            );
        }
    }
}
