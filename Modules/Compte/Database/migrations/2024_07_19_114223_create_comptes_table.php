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
        Schema::create('comptes', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('type_compte');
            $table->foreignUuid('bank_id')->constrained('banks')->onDelete('cascade');
            $table->foreignUuid('society_id')->nullable()->constrained('societies')->onDelete('cascade');
            $table->foreignUuid('employe_id')->nullable()->constrained('employes')->onDelete('cascade');
            $table->string('agence');
            $table->string('city');
            $table->string('rip');
            $table->string('start_solde');
            $table->timestamp('start_date');
            $table->boolean('isactive')->default(1);
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('comptes');
    }
};

