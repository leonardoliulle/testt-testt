<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserpublicAndAssessmentsTables extends Migration
{
    public function up()
    {
        // Create UserPublic table
        Schema::create('user_public', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('pass');
            $table->timestamps();
        });

        // Create Assessment table
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('whodid')->constrained('user_public');
            $table->foreignId('whoreceive')->constrained('user_public');
            $table->string('strength');
            $table->string('toworkon');
            $table->text('obs')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        // Drop tables if migration is rolled back
        Schema::dropIfExists('assessments');
        Schema::dropIfExists('user_public');
    }
}
