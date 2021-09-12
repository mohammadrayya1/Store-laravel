<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();

            $table->text('description')->nullable();
            $table->string('image');
            $table->unsignedFloat('price')->default(0);
            $table->unsignedFloat('sale_prise')->default(0);
            $table->unsignedInteger('quantity')->default(0);
            $table->unsignedInteger('views')->default(0);
            $table->unsignedInteger('sales')->default(0);
            $table->enum('status',['in-stock','sold-out','draft']);
            $table->foreignId('vendor_id')->nullable()->constrained('vendors','vendor_id')->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories','id')->nullOnDelete();
            $table->timestamps();
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
}
