<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SubCategoryTableSeeder::class);
        $this->call(MaterialTableSeeder::class);
        $this->call(BrandTableSeeder::class);
        $this->call(SizeTableSeeder::class);
        $this->call(VendorTableSeeder::class);
        $this->call(WarehouseTableSeeder::class);

    }
}
