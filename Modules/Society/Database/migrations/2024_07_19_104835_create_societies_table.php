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
        Schema::create('societies', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->foreignUuid('site_id')->constrained('sites')->onDelete('cascade');
            $table->string('ice')->nullable();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('email')->nullable();
            $table->integer('state_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->integer('secteur_id')->nullable();
            $table->string('cd_postale')->nullable();
            $table->string('address')->nullable();
            $table->text('comment')->nullable();
            $table->string('created_by');
            $table->double('total_acs',8,2)->default(0.00);
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
        Schema::dropIfExists('societies');
    }
};

