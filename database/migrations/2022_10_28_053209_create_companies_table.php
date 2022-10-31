<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 企業情報
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('url')->nullable()->nullable();
            $table->string('logo')->nullable()->nullable();
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
            // $table->id();
            // $table->bigInteger('company_info_id')->constrained('company_infos');
            // $table->string('name');
            // $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            // $table->rememberToken();
            // $table->timestamps();
            // $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
