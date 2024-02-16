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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('roleId');
            $table->string('email_verified_at')->nullable();
            $table->boolean('status')->comment('0 => Inactive, 1=> Active, 2=> Pending, 3=> Block ');
            $table->string('password');
            $table->timestamps();
        });
        DB::table('users')->insert([
            [
            'name'      => 'superadmin',
            'username'  => 'superadmin',
            'email'     => 'superadmin@gmail.com',
            'password'      => md5('123456'),
            'status'        =>  1,
            'roleId'        => 1,
            'created_at'    =>Carbon::now()
            ], 
            [
            'name'      => 'admin',
            'username'  => 'admin',
            'email'     => 'admin@gmail.com',
            'password'      => md5('123456'),
            'status'        =>  1,
            'roleId'        => 2,
            'created_at'    =>Carbon::now()
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
