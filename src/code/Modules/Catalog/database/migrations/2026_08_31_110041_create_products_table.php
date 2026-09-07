<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    const TABLE_NAME = 'products';

    public function up(): void
    {
        Schema::create(self::TABLE_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('sku')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 12, 4);
            $table->decimal('special_price', 12, 4)->nullable();
            $table->string('image')->nullable();
            $table->integer('quantity')->default(0);
            $table->integer('sales')->default(0);

            $table->foreignId('type_id')->constrained('product_types')->onDelete('cascade');

            $table->boolean('is_active')->default(true);
            $table->json('attributes')->nullable();
            $table->timestamps();

            $table->index('is_active');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(self::TABLE_NAME);
    }
};
