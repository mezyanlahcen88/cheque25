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
        Schema::create('products', function (Blueprint $table) {
            $table->uuid('id')->unique();
                $table->string('picture')->nullable();

            $table->string('name');
            // $table->string('address');
            // $table->boolean('isactive')->default(1);
            // $table->foreignUuid('email_type_id')->constrained('email_types')->onDelete('cascade');
            // $table->foreignId('language_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
};

