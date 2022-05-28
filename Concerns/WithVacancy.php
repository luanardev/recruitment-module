<?php
namespace Luanardev\Modules\Recruitment\Concerns;

trait WithVacancy
{

    public function getPosition()
    {
        return $this->vacancy->getPosition();
    }
    
}