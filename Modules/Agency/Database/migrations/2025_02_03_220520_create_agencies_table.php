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
        Schema::create('agencies', function (Blueprint $table) {
            $table->uuid('id')->unique();
            $table->string('name');
            $table->string('address');
            $table->string('phone');
            $table->string('fix');
            $table->boolean('isactive')->default(1);
            $table->foreignUuid('bank_id')->constrained('banks')->onDelete('cascade');
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
        Schema::dropIfExists('agencies');
    }
};

