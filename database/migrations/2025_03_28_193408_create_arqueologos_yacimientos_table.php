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
        Schema::create('arqueologos_yacimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('arqueologo_id');  
            $table->unsignedBigInteger('yacimiento_id');   
            $table->timestamps();
    
            $table->foreign('arqueologo_id')->references('id')->on('arqueologos')->onDelete('cascade');
            $table->foreign('yacimiento_id')->references('id')->on('yacimientos')->onDelete('cascade');
    
            $table->unique(['arqueologo_id', 'yacimiento_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('arqueologos_yacimientos');
    }
};
