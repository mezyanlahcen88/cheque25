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
        Schema::create('carnets', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->foreignUuid('bank_id')->constrained('banks')->onDelete('cascade');
            $table->foreignUuid('compte_id')->constrained('comptes')->onDelete('cascade');
            $table->integer('nbr_cheque');
            $table->integer('rest');
            $table->string('type');
            $table->string('society');
            $table->string('series');
            $table->string('nbr_first_cheque');
            $table->string('nbr_last_cheque');
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
        Schema::dropIfExists('carnets');
    }
};

