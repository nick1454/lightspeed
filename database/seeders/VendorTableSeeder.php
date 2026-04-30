<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vendor;

class VendorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vendors = [
            ['id'=>1,'name'=>'Sharma Cement Traders'],
            ['id'=>2,'name'=>'Ultra Build Distributors'],
            ['id'=>3,'name'=>'Tata Steel Depot'],
            ['id'=>4,'name'=>'Jindal Iron House'],
            ['id'=>5,'name'=>'National Sand Supplier'],
            ['id'=>6,'name'=>'Durga Brick Udyog'],
            ['id'=>7,'name'=>'Magicrete Blocks Agency'],
            ['id'=>8,'name'=>'Kajaria Tile Gallery'],
            ['id'=>9,'name'=>'Stone World Marbles'],
            ['id'=>10,'name'=>'Asian Paint Depot'],

            ['id'=>11,'name'=>'Supreme Pipe House'],
            ['id'=>12,'name'=>'Polycab Electricals'],
            ['id'=>13,'name'=>'Modern Hardware Store'],
            ['id'=>14,'name'=>'Greenply Timber Mart'],
            ['id'=>15,'name'=>'Rooftech Solutions'],

            ['id'=>16,'name'=>'Dr Fixit Distributor'],
            ['id'=>17,'name'=>'Roff Adhesive Center'],
            ['id'=>18,'name'=>'Glassline Traders'],
            ['id'=>19,'name'=>'Fenesta Channel Partner'],
            ['id'=>20,'name'=>'Scaffold India Supplies'],

            ['id'=>21,'name'=>'Bosch Tool Hub'],
            ['id'=>22,'name'=>'Pidilite Construction Chemicals'],
            ['id'=>23,'name'=>'Metro Infra Supplies'],
            ['id'=>24,'name'=>'BuildMart Wholesale'],
            ['id'=>25,'name'=>'Prime Industrial Vendors'],

        ];

        foreach($vendors as $vendor){
            Vendor::updateOrCreate(
                ['id'=>$vendor['id']],
                $vendor
            );
        }
    }
}
