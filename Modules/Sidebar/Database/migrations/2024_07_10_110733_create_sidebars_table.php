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
        Schema::create('sidebars', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('name');
            $table->string('icon')->nullable();
            $table->string('permission');
            $table->string('sidebar_id')->nullable();
            $table->integer('order')->default(1);
            $table->string('route')->nullable();
            $table->string('type')->commet('parent or child')->default('sidebar');
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
        Schema::dropIfExists('sidebars');
    }
};

