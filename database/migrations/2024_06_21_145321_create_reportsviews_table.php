<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('reportsviews', function (Blueprint $table) {
            $table->id();
            $table->string('httplink');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('alias');
            $table->string('pass');
            $table->string('group');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportsviews');
    }
};
