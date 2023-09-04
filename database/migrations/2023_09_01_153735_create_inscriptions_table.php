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
        Schema::create('inscriptions', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedInteger("student_id");
            $table->foreign("student_id")->references("id")->on("students");

            $table->unsignedInteger("classe_id");
            $table->foreign("classe_id")->references("id")->on("classes");

            $table->unsignedInteger("school_years_id");
            $table->foreign("school_years_id")->references("id")->on("school_years");

            $table->string("comments")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscriptions');
    }
};
