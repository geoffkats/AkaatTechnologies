<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('customer_name')->nullable()->after('order_number');
            $table->string('customer_email')->nullable()->after('customer_name');
            $table->string('customer_phone')->nullable()->after('customer_email');
            $table->string('delivery_method')->nullable()->after('customer_phone'); // pickup, delivery
            $table->text('delivery_address')->nullable()->after('delivery_method');
            $table->decimal('delivery_fee', 10, 2)->default(0)->after('subtotal');
            $table->json('meta_data')->nullable()->after('notes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'customer_name',
                'customer_email', 
                'customer_phone',
                'delivery_method',
                'delivery_address',
                'delivery_fee',
                'meta_data'
            ]);
        });
    }
};
