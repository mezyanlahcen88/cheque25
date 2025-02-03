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
        Schema::create('clients', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('picture')->nullable();
            $table->string('ref')->unique();
            $table->string('ice')->nullable()->unique();
            $table->string('name');
            $table->string('fonction')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('secteur_id')->nullable();
            $table->string('cd_postale')->nullable();
            $table->text('address')->nullable();
            $table->text('comment')->nullable();
            $table->string('created_by');
            $table->integer('count_cheque')->default(0);
            $table->double('total_acs',8,2)->default(0.00)->comment('total amount cheques');
            $table->boolean('isactive')->default(0);
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
        Schema::dropIfExists('clients');
    }
};

