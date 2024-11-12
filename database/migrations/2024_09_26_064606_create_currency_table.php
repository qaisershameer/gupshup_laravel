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
        Schema::create('currency', function (Blueprint $table) {
            $table->id('currencyId'); // Primary key
            $table->string('currencyTitle');
            $table->unsignedBigInteger('uId'); // Foreign key column
        
            // Foreign key constraint
            $table->foreign('uId')->references('id')->on('users')->onDelete('restrict'); // Prevent deletion if foreign key exists
        
            $table->timestamps();
        });
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency');
    }
};