<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Catalog\Database\Seeders\CategorySeeder;
use Modules\Catalog\Database\Seeders\ProductTypeSeeder;
use Modules\Catalog\Database\Seeders\ProductWithDependenciesSeeder;
use Modules\Sales\Database\Seeders\ProductKeySeeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            CategorySeeder::class,
            ProductTypeSeeder::class,
            ProductWithDependenciesSeeder::class,
            ProductKeySeeder::class,
        ]);
    }
}
