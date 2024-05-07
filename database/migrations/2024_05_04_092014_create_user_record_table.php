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
        Schema::create('user_record', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('fname', 20);
            $table->string('email',50);
            $table->string('phoneNo',20);
            $table->integer('age',);
            $table->enum('gander', ['male', 'female', 'other']);
            $table->text('desc');
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
        Schema::dropIfExists('user_record');
    }
};
