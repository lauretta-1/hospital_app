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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->bigInteger('hospital_no');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('photo');
            $table->string('phone');
            $table->string('gender');
            $table->date('dob');
            $table->string('email')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('next_of_kin_name');
            $table->string('next_of_kin_phone');
            $table->string('marital_status');
            $table->integer('age')->default(24);
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
        Schema::dropIfExists('patients');
    }
};
