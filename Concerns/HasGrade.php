<?php

namespace Luanardev\Modules\Recruitment\Concerns;
use Luanardev\Modules\Employees\Entities\Grade;

trait HasGrade
{

    public function grossSalary()
    {
        $grade = Grade::findByGrade($this->grade);
        if(!empty($grade)){
            return $grade->gross_salary;
        }
    }
}