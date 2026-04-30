<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['id'=>1,'name'=>'UltraTech','description'=>'Cement manufacturer'],
            ['id'=>2,'name'=>'ACC','description'=>'Cement manufacturer'],
            ['id'=>3,'name'=>'Birla','description'=>'Building materials brand'],
            ['id'=>4,'name'=>'JK Cement','description'=>'White and gray cement'],
            ['id'=>5,'name'=>'Tata Tiscon','description'=>'TMT steel'],
            ['id'=>6,'name'=>'JSW Steel','description'=>'Steel manufacturer'],
            ['id'=>7,'name'=>'SAIL','description'=>'Structural steel'],
            ['id'=>8,'name'=>'Jindal Wire','description'=>'Binding wire'],
            ['id'=>9,'name'=>'Magicrete','description'=>'AAC blocks'],
            ['id'=>10,'name'=>'Kajaria','description'=>'Tiles brand'],
            ['id'=>11,'name'=>'Somany','description'=>'Ceramic tiles'],
            ['id'=>12,'name'=>'Asian Paints','description'=>'Paint manufacturer'],
            ['id'=>13,'name'=>'Berger','description'=>'Paints and putty'],
            ['id'=>14,'name'=>'Supreme','description'=>'PVC products'],
            ['id'=>15,'name'=>'Ashirvad','description'=>'CPVC pipes'],
            ['id'=>16,'name'=>'Jaquar','description'=>'Plumbing fittings'],
            ['id'=>17,'name'=>'Polycab','description'=>'Electrical wires'],
            ['id'=>18,'name'=>'Anchor','description'=>'Switchgear'],
            ['id'=>19,'name'=>'Havells','description'=>'Lighting'],
            ['id'=>20,'name'=>'Godrej','description'=>'Door hardware'],
            ['id'=>21,'name'=>'Greenply','description'=>'Plywood'],
            ['id'=>22,'name'=>'Century','description'=>'Laminates'],
            ['id'=>23,'name'=>'Tata BlueScope','description'=>'Roofing'],
            ['id'=>24,'name'=>'Owens Corning','description'=>'Shingles'],
            ['id'=>25,'name'=>'Lexan','description'=>'Polycarbonate'],
            ['id'=>26,'name'=>'Dr Fixit','description'=>'Waterproofing'],
            ['id'=>27,'name'=>'Fosroc','description'=>'Membranes'],
            ['id'=>28,'name'=>'Sika','description'=>'Injection grout'],
            ['id'=>29,'name'=>'Roff','description'=>'Tile adhesives'],
            ['id'=>30,'name'=>'Dow','description'=>'Sealants'],
            ['id'=>31,'name'=>'Century Doors','description'=>'Flush doors'],
            ['id'=>32,'name'=>'Fenesta','description'=>'UPVC windows'],
            ['id'=>33,'name'=>'Jindal Aluminium','description'=>'Aluminium systems'],
            ['id'=>34,'name'=>'Taparia','description'=>'Hand tools'],
            ['id'=>35,'name'=>'Bosch','description'=>'Power tools'],
            ['id'=>36,'name'=>'Karam','description'=>'Safety equipment'],
            ['id'=>37,'name'=>'Pergo','description'=>'Wood flooring'],
            ['id'=>38,'name'=>'Armstrong','description'=>'Vinyl flooring'],
            ['id'=>39,'name'=>'Pidilite','description'=>'Epoxy systems'],
            ['id'=>40,'name'=>'BASF','description'=>'Admixtures'],
            ['id'=>41,'name'=>'CICO','description'=>'Curing chemicals'],
            ['id'=>42,'name'=>'MYK Arment','description'=>'Repair mortars'],

        ];

        foreach($brands as $brand){
            Brand::updateOrCreate(
                ['id'=>$brand['id']],
                $brand
            );
        }
    }
}
