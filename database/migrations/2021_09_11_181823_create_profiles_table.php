<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {

            //cascadeOnDelete for if profile record is removed then user is remoced as well
            $table->foreignId('user_id')->unique()->constrained('users','id')->cascadeOnDelete();
            $table->string('first_name');
            $table->string('last_name');
            $table->date('birthday');
            $table->string('Address')->nullable();
            $table->string('avatr')->nullable();
            $table->enum('gender',['male','female']);
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
        Schema::dropIfExists('profiles');
    }
}
