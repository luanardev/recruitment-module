<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitVacancyView extends Migration
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
                CREATE VIEW hrm_recruit_vacancy_view AS
                SELECT
                hrm_recruit_vacancies.id,        
                hrm_config_positions.name AS post,
                hrm_config_job_type.name AS type,
                hrm_recruit_vacancies.positions,
                hrm_recruit_vacancies.scale,
                hrm_recruit_vacancies.duration,
                hrm_recruit_vacancies.audience,
                hrm_recruit_vacancies.published,
                hrm_recruit_vacancies.close_date,
                hrm_recruit_vacancies.applicable,    
                hrm_recruit_vacancies.status,
                hrm_recruit_vacancies.duties,
                hrm_recruit_vacancies.requirements,
                hrm_recruit_vacancies.benefits,
                org_branches.name AS branch,
                org_campuses.name AS campus,
                org_departments.name AS department,
                org_sections.name AS section,
                hrm_recruit_vacancies.position_id,
                hrm_recruit_vacancies.job_type_id,
                hrm_recruit_vacancies.campus_id,
                hrm_recruit_vacancies.department_id,             
                hrm_recruit_vacancies.section_id,
                hrm_recruit_vacancies.created_at,
                hrm_recruit_vacancies.updated_at
                FROM hrm_recruit_vacancies
                JOIN org_campuses ON org_campuses.id = hrm_recruit_vacancies.campus_id
                JOIN org_branches ON org_branches.id = org_campuses.branch_id            
                JOIN org_departments ON org_departments.id = hrm_recruit_vacancies.department_id
                JOIN org_sections ON org_sections.id = hrm_recruit_vacancies.section_id
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
            DROP VIEW IF EXISTS `hrm_recruit_vacancy_view`;
            SQL;
    }
}
