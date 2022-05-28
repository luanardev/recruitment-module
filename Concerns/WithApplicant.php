<?php
namespace Luanardev\Modules\Recruitment\Concerns;

trait WithApplicant
{

    public function getApplicantName()
    {
        return $this->applicant->title.' '.
                $this->applicant->firstname.' '. 
                $this->applicant->lastname; 
    }
    
}