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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('nid');
            $table->longText('address');
            $table->string('shopName')->nullable();
            $table->longText('shopAddress')->nullable();
            $table->string('bankName')->nullable();
            $table->string('bankBranch')->nullable();
            $table->string('accountHolder')->nullable();
            $table->string('accountNumber')->nullable();
            $table->string('city')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
