<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Modules\Sales\Models\Order;

return new class extends Migration
{

    const TABLE_NAME = 'orders';
    const ORDER_STATUSES = [Order::STATUS_PENDING, Order::STATUS_PAID, Order::STATUS_COMPLETED, Order::STATUS_FAILED, Order::STATUS_CANCELLED];

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $statuses = implode(', ', array_map(fn($status) => "'{$status}'", self::ORDER_STATUSES));
        DB::statement("ALTER TABLE " . self::TABLE_NAME . " MODIFY COLUMN status ENUM(" . $statuses. ") DEFAULT '" . Order::STATUS_PENDING . "'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $oldStatuses = [
            Order::STATUS_PENDING,
            Order::STATUS_PAID,
            Order::STATUS_COMPLETED,
            Order::STATUS_FAILED
        ];

        $statuses = implode(', ', array_map(fn($status) => "'{$status}'", $oldStatuses));
        DB::statement("ALTER TABLE " . self::TABLE_NAME . " MODIFY COLUMN status ENUM(" . $statuses . ") DEFAULT '" . Order::STATUS_PENDING . "'");
    }
};
