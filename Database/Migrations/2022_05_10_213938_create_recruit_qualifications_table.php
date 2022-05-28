<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitQualificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hrm_recruit_qualifications', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('applicant_id')->unsigned();
            $table->string('name',100);
            $table->bigInteger('level')->unsigned();
            $table->string('class',100)->nullable();
            $table->string('institution',100);
            $table->string('country',100);
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('graduated', array('Yes', 'No'))->default('Yes');
            $table->date('graduation_date')->nullable();
            $table->string('attachment_name')->nullable();
            $table->string('attachment_file')->nullable();
            $table->timestamps();
            
            $table->foreign('applicant_id')->references('id')->on('hrm_recruit_applicants')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hrm_recruit_qualifications');
    }
}
