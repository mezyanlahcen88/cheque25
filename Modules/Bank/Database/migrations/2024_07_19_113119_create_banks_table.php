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
        Schema::create('banks', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('logo');
            $table->string('picture');
            $table->string('effet');
            $table->string('name');
            $table->string('tel');
            $table->string('address');
            $table->boolean('isactive')->default(1);
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
        Schema::dropIfExists('banks');
    }
};

