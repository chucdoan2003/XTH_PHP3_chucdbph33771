<?php

use App\Models\Product;
use App\Models\productColor;
use App\Models\productMaterial;
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
         Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->constrained();
            $table->foreignIdFor(productMaterial::class)->constrained();
            $table->foreignIdFor(productColor::class)->constrained();
            $table->string('image')->nullable();
            $table->integer('quantity')->default(0);
            $table->float('price')->nullable();

            $table->timestamps();

            $table->unique(['product_id','product_material_id', 'product_color_id'], 'product_variants_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
