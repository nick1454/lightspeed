<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Size;

class SizeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sizes = [

            ['id'=>1,'name'=>'50 Kg'],

            ['id'=>2,'name'=>'Per Ton'],

            ['id'=>3,'name'=>'10 mm'],
            ['id'=>4,'name'=>'20 mm'],
            ['id'=>5,'name'=>'Dust Grade'],

            ['id'=>6,'name'=>'9x4x3 Inch'],
            ['id'=>7,'name'=>'230x110x75 mm'],
            ['id'=>8,'name'=>'Standard'],

            ['id'=>9,'name'=>'8 mm'],
            ['id'=>10,'name'=>'10 mm'],
            ['id'=>11,'name'=>'12 mm'],
            ['id'=>12,'name'=>'16 mm'],
            ['id'=>13,'name'=>'50x50x6'],
            ['id'=>14,'name'=>'1 mm'],

            ['id'=>15,'name'=>'M20'],
            ['id'=>16,'name'=>'M25'],
            ['id'=>17,'name'=>'Standard'],
            ['id'=>18,'name'=>'60 mm'],

            ['id'=>19,'name'=>'600x200x100'],
            ['id'=>20,'name'=>'600x200x150'],
            ['id'=>21,'name'=>'8 Inch'],
            ['id'=>22,'name'=>'Standard'],

            ['id'=>23,'name'=>'600x600'],
            ['id'=>24,'name'=>'800x800'],
            ['id'=>25,'name'=>'300x600'],
            ['id'=>26,'name'=>'300x300'],

            ['id'=>27,'name'=>'18 mm'],
            ['id'=>28,'name'=>'20 mm'],
            ['id'=>29,'name'=>'Standard'],

            ['id'=>30,'name'=>'20 Liter'],
            ['id'=>31,'name'=>'20 Liter'],
            ['id'=>32,'name'=>'20 Liter'],
            ['id'=>33,'name'=>'40 Kg'],

            ['id'=>34,'name'=>'1 Inch'],
            ['id'=>35,'name'=>'2 Inch'],
            ['id'=>36,'name'=>'1 Inch'],
            ['id'=>37,'name'=>'15 mm'],
            ['id'=>38,'name'=>'20 mm'],

            ['id'=>39,'name'=>'1.5 sqmm'],
            ['id'=>40,'name'=>'2.5 sqmm'],
            ['id'=>41,'name'=>'6 Amp'],
            ['id'=>42,'name'=>'32 Amp'],
            ['id'=>43,'name'=>'12 Watt'],

            ['id'=>44,'name'=>'10 mm'],
            ['id'=>45,'name'=>'2 Inch'],
            ['id'=>46,'name'=>'4 Inch'],
            ['id'=>47,'name'=>'Standard'],

            ['id'=>48,'name'=>'8x4 Ft'],
            ['id'=>49,'name'=>'Standard'],
            ['id'=>50,'name'=>'8x4 Ft'],
            ['id'=>51,'name'=>'8x4 Ft'],

            ['id'=>52,'name'=>'10 Ft'],
            ['id'=>53,'name'=>'Standard'],
            ['id'=>54,'name'=>'8x4 Ft'],

            ['id'=>55,'name'=>'20 Liter'],
            ['id'=>56,'name'=>'10 Meter Roll'],
            ['id'=>57,'name'=>'5 Kg'],

            ['id'=>58,'name'=>'20 Kg'],
            ['id'=>59,'name'=>'5 Kg'],
            ['id'=>60,'name'=>'300 ml'],

            ['id'=>61,'name'=>'5 mm'],
            ['id'=>62,'name'=>'12 mm'],
            ['id'=>63,'name'=>'10 mm'],

            ['id'=>64,'name'=>'7x3 Ft'],
            ['id'=>65,'name'=>'4x4 Ft'],
            ['id'=>66,'name'=>'4x4 Ft'],

            ['id'=>67,'name'=>'50 mm'],
            ['id'=>68,'name'=>'25 mm'],
            ['id'=>69,'name'=>'1 Inch'],

            ['id'=>70,'name'=>'3 Meter'],
            ['id'=>71,'name'=>'Standard'],
            ['id'=>72,'name'=>'Standard'],

            ['id'=>73,'name'=>'Standard'],
            ['id'=>74,'name'=>'1200W'],
            ['id'=>75,'name'=>'Standard'],

            ['id'=>76,'name'=>'8x4 Ft'],
            ['id'=>77,'name'=>'Standard'],
            ['id'=>78,'name'=>'8 Ft'],

            ['id'=>79,'name'=>'8 mm'],
            ['id'=>80,'name'=>'2 mm'],
            ['id'=>81,'name'=>'3 mm'],

            ['id'=>82,'name'=>'5 Liter'],
            ['id'=>83,'name'=>'5 Kg'],
            ['id'=>84,'name'=>'20 Liter'],
            ['id'=>85,'name'=>'25 Kg'],

        ];

        foreach($sizes as $size){
            Size::updateOrCreate(
                ['id'=>$size['id']],
                $size
            );
        }
    }
}
