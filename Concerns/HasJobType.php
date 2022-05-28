<?php
namespace Luanardev\Modules\Recruitment\Concerns;
use Luanardev\Modules\HRSettings\Entities\JobType;

trait HasJobType
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function jobtype()
    {
        return $this->belongsTo(JobType::class, 'job_type_id');
    }

    /**
     * @return string
     */
    public function getJobType()
    {
        return isset($this->jobtype->name)? $this->jobtype->name: null;
    }

    /**
     * Check job type
     *
     * @param mixed $type
     * @return boolean
     */
    public function isJobType($type)
    {
        if(is_string($type)){
            $type = JobType::findKey($type);
            return ($this->job_type_id == $type )? true:false;
        }
        elseif(is_numeric($type)){
            return ($this->job_type_id == $type )? true:false;
        }
        elseif($type instanceof JobType){
            return ($this->job_type_id == $type->getKey() )? true:false;
        }
    }

    
}