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
        Schema::create('bike_services', function (Blueprint $table) {
            $table->id();
            $table->string("invoiceId");
            $table->string("client_name");
            $table->string("contact");
            $table->string("address");
            $table->string("bike_name");
            $table->string("bsquantity");
            $table->string("service_type");
            $table->date("first_service");
            $table->date("second_service");
            $table->date("third_service");
            $table->date("fourth_service");
            $table->date("fifth_service");
            $table->date("sixth_service");
            $table->date("seventh_service");
            $table->date("eighth_service");
            $table->date("f_date");
            $table->date("s_date");
            $table->date("t_date");
            $table->date("four_date");
            $table->date("fifth_date");
            $table->date("six_date");
            $table->date("seven_date");
            $table->date("eighth_date");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bike_services');
    }
};
