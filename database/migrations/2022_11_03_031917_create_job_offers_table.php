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
        Schema::create('job_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')
                    ->constrained();
            $table->string('title');
            $table->foreignId('suburb_id')
                    ->constrained();
            $table->foreignId('classification_id')
                    ->constrained();
            $table->foreignId('sub_classification_id')
                    ->constrained();
            $table->integer('annual_salary');
            $table->integer('hourly_pay');
            $table->integer('job_type');
            $table->text('description');
            $table->boolean('is_display');
            $table->integer('sort_no');
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
        Schema::dropIfExists('job_offers');
    }
};
