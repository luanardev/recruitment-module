<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hrm_recruit_applicants', function (Blueprint $table) {

            $table->id();

            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            $table->string('title',20)->nullable();
            $table->string('firstname',100)->nullable();
            $table->string('lastname',100)->nullable();
            $table->string('middlename',100)->nullable();
            $table->string('maidenname',100)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', array('Male', 'Female'))->nullable();
            $table->string('marital_status',100)->nullable();
            $table->string('phone1',20)->nullable();
            $table->string('phone2',20)->nullable();
            $table->string('postal_address',100)->nullable();
            $table->string('physical_address',100)->nullable();
            $table->string('nationality',100)->nullable();
            $table->string('home_country',100)->nullable();
            $table->string('home_district',100)->nullable();
            $table->string('home_village',100)->nullable();
            $table->string('home_authority',100)->nullable();            
            $table->enum('employed', array('Yes', 'No'))->default('No');
            $table->enum('disabled', array('Yes', 'No'))->default('No');
            $table->enum('convicted', array('Yes', 'No'))->default('No');
            $table->string('conviction')->nullable();
            $table->string('disability')->nullable();
            $table->string('medical_state')->nullable();
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
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('hrm_recruit_applicants');
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        
    }
}
