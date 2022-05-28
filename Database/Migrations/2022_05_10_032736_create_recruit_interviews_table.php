<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitInterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hrm_recruit_interviews', function (Blueprint $table) {
            $table->id();
            $table->string('venue');
            $table->date('date');
            $table->time('time');
            $table->string('description')->nullable();
            $table->enum('status', array('Pending', 'Activated', 'Closed'))->default('Pending');
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
        Schema::dropIfExists('hrm_recruit_interviews');
    }
}
