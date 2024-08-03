<?php

use App\Models\Orders;
use App\Models\productVariants;
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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(productVariants::class)->constrained();
            $table->foreignIdFor(Orders::class)->constrained();

            //sao lưu thông tin sản phẩm và biến thể
            $table->string('product_name');
            $table->string('product_sku');
            $table->float('product_price');
            $table->float('product_price_sale');
            $table->string('product_thumb_nail');

            $table->string('variant_material_name');
            $table->string('variant_color_name');
            $table->integer('quantity');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_items');
    }
};
