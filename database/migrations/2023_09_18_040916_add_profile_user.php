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
        Schema::table('users', function (Blueprint $table) {
            $table->string("photo")->nullable()->after("password");
            $table->longText("about")->nullable()->after("password");
            $table->date("birthday")->nullable()->after("password");
            $table->string("gender")->nullable()->after("password");
            $table->text("address")->nullable()->after("password");
            $table->string("email")->nullable()->after("password");
            $table->string("phone")->nullable()->after("password");
            $table->string("linkedin")->nullable()->after("password");
            $table->string("facebook")->nullable()->after("password");
            $table->string('job')->nullable()->after("password");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
