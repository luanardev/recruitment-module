<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitApplicationView extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->dropView());
    }

    /**
     * Create table view
     *
     * @return string
     */
    private function createView()
    {
        return <<<SQL
                CREATE VIEW hrm_recruit_application_view AS
                SELECT
                hrm_recruit_applications.id,        
                hrm_config_positions.name AS position,
                hrm_config_job_type.name AS job_type,
                hrm_recruit_vacancies.scale,
                hrm_recruit_vacancies.duration,
                hrm_recruit_applicants.title, 
                CONCAT(hrm_recruit_applicants.firstname,' ', hrm_recruit_applicants.lastname) AS name,
                hrm_recruit_applicants.gender,
                TIMESTAMPDIFF(YEAR, hrm_recruit_applicants.date_of_birth, CURDATE()) AS age,
                hrm_recruit_applicants.email,
                hrm_recruit_applicants.phone1,
                hrm_recruit_applicants.phone2,
                hrm_recruit_applicants.physical_address,
                hrm_recruit_applications.vacancy_id,
                hrm_recruit_applications.applicant_id,
                hrm_recruit_vacancies.position_id,
                hrm_recruit_vacancies.job_type_id,
                hrm_recruit_applications.status,
                hrm_recruit_applications.created_at,
                hrm_recruit_applications.updated_at     
                FROM hrm_recruit_applications            
                JOIN hrm_recruit_vacancies ON hrm_recruit_vacancies.id = hrm_recruit_applications.vacancy_id
                JOIN hrm_recruit_applicants ON hrm_recruit_applicants.id = hrm_recruit_applications.applicant_id
                JOIN hrm_config_positions ON hrm_config_positions.id = hrm_recruit_vacancies.position_id
                JOIN hrm_config_job_type ON hrm_config_job_type.id = hrm_recruit_vacancies.job_type_id
            SQL;
    }

    /**
     * Drop table view
     *
     * @return strinf
     */
    private function dropView()
    {
        return <<<SQL
            DROP VIEW IF EXISTS `hrm_recruit_application_view`;
            SQL;
    }
}
