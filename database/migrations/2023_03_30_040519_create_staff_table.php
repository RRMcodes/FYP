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

        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            $table->string('f_name');
            $table->string('l_name');
            $table->string('address');
            $table->string('email');
            $table->string('contact_number');
            $table->date('dob');
            $table->string('gender');
            $table->string('position');
            $table->string('status');
            $table->string('experience');
            $table->string('start_date');
            $table->string('end_date');
            $table->softDeletes();
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
        Schema::dropIfExists('staff');
    }
};
