<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hrm_recruit_vacancies', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('position_id')->unsigned();
            $table->char('scale',1)->nullable();
            $table->bigInteger('campus_id')->unsigned();
            $table->bigInteger('department_id')->unsigned();
            $table->bigInteger('section_id')->unsigned();
            $table->bigInteger('job_type_id')->unsigned();
            $table->string('duration', 100)->nullable();
            $table->integer('positions');
            $table->text('duties')->nullable();
            $table->text('requirements')->nullable();
            $table->text('benefits')->nullable();   
            $table->date('close_date')->nullable();
            $table->enum('applicable', array('Yes', 'No'))->default('No');
            $table->enum('published', array('Yes', 'No'))->default('No');
            $table->enum('status', array('Open', 'Closed','Recruited','Archived'))->default('Open');
            $table->enum('audience', array('Internal', 'External'))->default('External');
            
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
        Schema::dropIfExists('hrm_recruit_vacancies');
    }
}
