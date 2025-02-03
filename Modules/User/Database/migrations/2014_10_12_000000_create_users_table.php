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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->foreignId('language_id')->nullable()->constrained()->nullable()->default(1);
            $table->string('password');
            $table->boolean('isactive')->default(0);
            $table->integer('state_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('picture')->nullable();
            $table->text('address')->nullable();
            $table->text('code_postale')->nullable();
            $table->text('gender', 15)->nullable();
            $table->boolean('isSuperAdmin')->default(0);
            $table->timestamp('last_login_at')->nullable();
            $table->string('last_login_ip')->default('127.0.0.1');
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
        Schema::dropIfExists('users');
    }
};
