<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitVacancyShortlisted extends Migration
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
                CREATE VIEW hrm_recruit_vacancy_shortlisted AS
                SELECT					
                hrm_recruit_applications.vacancy_id AS id,  
                hrm_config_positions.name AS post,  
                hrm_config_job_type.name AS type,    
                COUNT(hrm_recruit_applications.id) AS shortlisted,
                org_campuses.name AS campus,
                hrm_recruit_vacancies.status
                FROM hrm_recruit_applications
                JOIN hrm_recruit_vacancies ON hrm_recruit_vacancies.id = hrm_recruit_applications.vacancy_id
                JOIN hrm_config_positions ON hrm_config_positions.id = hrm_recruit_vacancies.position_id
                JOIN hrm_config_job_type ON hrm_config_job_type.id = hrm_recruit_vacancies.job_type_id
                JOIN org_campuses ON org_campuses.id = hrm_recruit_vacancies.campus_id                        
                WHERE hrm_recruit_applications.status = 'Shortlisted'
                GROUP BY hrm_recruit_applications.vacancy_id

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
            DROP VIEW IF EXISTS `hrm_recruit_vacancy_shortlisted`;
            SQL;
    }
}
