<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitInterviewVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hrm_recruit_interview_vacancies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('interview_id')->unsigned();
            $table->bigInteger('vacancy_id')->unsigned();

            $table->timestamps();

            $table->foreign('interview_id')->references('id')->on('hrm_recruit_interviews')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hrm_recruit_interview_vacancies');
    }
}
