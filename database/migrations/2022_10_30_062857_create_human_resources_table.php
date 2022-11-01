<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 企業の人事担当or採用に関わる人
     *
     * @return void
     */
    public function up()
    {
        Schema::create('human_resources', function (Blueprint $table) {
            // $table->id();
            // $table->string('name')->nullable();
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->foreignId('companies_id')->constrained();
            // $table->timestamps();
            // $table->softDeletes();
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->foreignId('companies_id')->constrained();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('url')->nullable();
            $table->string('logo')->nullable();
            $table->string('background_image')->nullable();
            $table->string('industry')->nullable();
            $table->string('company_size')->nullable();
            $table->text('specialities')->nullable();
            $table->text('our_mission_statement')->nullable();
            $table->text('featured')->nullable();
            $table->text('other')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('human_resources');
    }
};
