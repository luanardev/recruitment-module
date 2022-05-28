<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hrm_recruit_applications', function (Blueprint $table) {
            $table->id();        
            $table->bigInteger('vacancy_id')->unsigned();
            $table->bigInteger('applicant_id')->unsigned();
            $table->enum('status', array('Received', 'Reviewed', 'Shortlisted','Interview', 'Appointed' ))->default('Received');
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
        Schema::dropIfExists('hrm_recruit_applications');
    }
}
