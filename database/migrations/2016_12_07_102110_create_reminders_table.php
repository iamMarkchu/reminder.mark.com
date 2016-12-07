<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemindersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('content', '120');
            $table->dateTime('enddate');
            $table->enum('status', ['serving', 'expired', 'deleted']);
            $table->enum('isloop', ['yes', 'no']);
            $table->smallInteger('loopLevel');
            $table->string('personsend', '20');
            $table->string('personemail', '100');
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
        Schema::drop('reminders');
    }
}
