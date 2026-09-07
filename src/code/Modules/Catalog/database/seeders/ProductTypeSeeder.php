<?php

namespace Modules\Catalog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ProductTypeSeeder extends Seeder
{
    const TABLE_NAME = 'product_types';
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productTypes = [
            'Донат',
            'Подписки',
            'Предметы',
            'Аккаунты',
            'Ключи',
            'Игровая валюта',
            'Другое'
        ];
        Schema::disableForeignKeyConstraints();

        DB::table(self::TABLE_NAME)->truncate();


        foreach ($productTypes as $productType) {
            DB::table(self::TABLE_NAME)->insert([
                'name' => $productType,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        Schema::enableForeignKeyConstraints();
    }
}
