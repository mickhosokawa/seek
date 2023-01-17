<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('career_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // usersテーブルID
            $table->boolean('role')->nullable();
            $table->string('job_title')->nullable();
            //$table->foreignId('company_id')->nullable()->constrained();
            $table->string('company_name')->nullable();
            $table->integer('started_year')->nullable();
            $table->integer('started_month')->nullable();
            $table->integer('ended_year')->nullable();
            $table->integer('ended_month')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('career_histories');
    }
};
