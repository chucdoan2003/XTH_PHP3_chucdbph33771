<?php

use App\Models\Orders;
use App\Models\User;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();

            //Thông tin người nhận
            $table->string('user_name');
            $table->string('user_email');
            $table->integer('user_phone');
            $table->string('user_address');

            //status
            $table->string('order_status')->default(Orders::STATUS_PENDING);
            $table->string('payment_status')->default(Orders::UNPAID);

            $table->float('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
