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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->string("invoiceId");
            $table->string("cus_name")->nullable();
            $table->string("product_name");
            $table->string("cat_name");
            $table->string("address")->nullable();
            $table->string("cost");
            $table->string("SKU");
            $table->string("sale");
            $table->integer("method_id");
            $table->string("pro_quantity");
            $table->date("dob");
            $table->string("contact")->nullable();
            $table->string("profit");
            $table->string("total");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
