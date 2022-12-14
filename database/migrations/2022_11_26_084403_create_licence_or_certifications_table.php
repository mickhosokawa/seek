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
        Schema::create('licence_or_certifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('licence_name')->nullable();
            $table->string('issuing_organization')->nullable();
            $table->string('issue_year')->nullable();
            $table->string('issue_month')->nullable();
            $table->string('expiry_year')->nullable();
            $table->string('expiry_month')->nullable();
            $table->boolean('is_expired')->nullable();
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
        Schema::dropIfExists('licence_or_certifications');
    }
};
