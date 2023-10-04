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
        Schema::create('portfolio', function (Blueprint $table) {
            $table->string('id', 50)->primary();
            $table->string('id_category', 50);
            $table->string('title');
            $table->string('photo')->nullable();
            $table->string('link')->nullable()->default('#');
            $table->timestamps();

            $table->foreign("id_category")->references("id")->on("category_portfolio")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio');
    }
};
