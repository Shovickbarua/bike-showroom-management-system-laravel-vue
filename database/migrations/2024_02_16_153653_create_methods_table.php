<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('methods', function (Blueprint $table) {
            $table->id();
            $table->string("method_name");
            $table->timestamps();
        });
        DB::table('methods')->insert([
            [
                'method_name'          =>'Cash',
                'created_at'           => Carbon::now()   
            ], 
            [
                'method_name'          =>'Check',
                'created_at'           => Carbon::now()   
            ],
            [
                'method_name'          =>'Credit',
                'created_at'           => Carbon::now()   
            ],
           
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('methods');
    }
};
