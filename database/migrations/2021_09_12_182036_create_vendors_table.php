<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVendorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendors', function (Blueprint $table) {

            $table->id('vendor_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->char('currancy',3)->default('USD');

            //language
            $table->char('local',2)->default('EN');
            $table->string('path_image')->nullable();
            $table->text('description')->nullable();
            $table->enum('status',['active','inactive'])->default('active');





            //make two colum //create_timpstamp& updated_timestamp
            // $table->timestamp('create_timestamp')->nullable();
            //$table->timestamp('updated_timstamp')->nullable();


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
        Schema::dropIfExists('vendors');
    }
}
