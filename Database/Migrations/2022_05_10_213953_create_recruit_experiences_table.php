<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitExperiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hrm_recruit_experiences', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('applicant_id')->unsigned();
            $table->string('employer_name',100);
            $table->string('employer_address',100)->nullable();
            $table->string('employer_phone',20)->nullable();
            $table->string('position',100);
            $table->float('salary')->nullable();
            $table->string('duties')->nullable();
            $table->string('benefits')->nullable();
            $table->string('reason_for_leave')->nullable();           
            $table->date('start_date');
            $table->date('end_date');
            $table->string('country',100)->nullable();
           
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
        Schema::dropIfExists('hrm_recruit_experiences');
    }
}
