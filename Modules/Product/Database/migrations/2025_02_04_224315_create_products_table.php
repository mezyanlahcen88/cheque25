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
            $table->string('reference');
            $table->string('name');
            $table->text('description');
            $table->string('product_type');
            $table->string('service');
            $table->string('buy_unit');
            $table->double('buy_price',10,2);
            $table->string('actions');
            $table->string('lot_number');
            $table->timestamp('date_of_expiration');
            $table->string('destockage_unit');
            $table->foreignUuid('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignUuid('brand_id')->constrained('brands')->onDelete('cascade');
            $table->foreignUuid('warehouse_id')->constrained('warehouses')->onDelete('cascade');
            $table->boolean('iscomposable')->default(0);
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
        Schema::dropIfExists('products');
    }
};

