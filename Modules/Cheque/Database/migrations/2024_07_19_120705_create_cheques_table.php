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
        Schema::create('cheques', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->foreignUuid('bank_id')->constrained('banks')->onDelete('cascade');
            $table->foreignUuid('compte_id')->constrained('comptes')->onDelete('cascade');
            $table->foreignUuid('carnet_id')->constrained('carnets')->onDelete('cascade');
            $table->string('series');
            $table->string('number');
            $table->string('amount');
            $table->timestamp('doi')->comment('date of issue');
            $table->string('poi')->comment('place of issue');
            $table->string('beneficiary');
            $table->string('status');
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
        Schema::dropIfExists('cheques');
    }
};

