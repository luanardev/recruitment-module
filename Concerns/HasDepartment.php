<?php
namespace Luanardev\Modules\Recruitment\Concerns;
use Luanardev\Modules\Institution\Entities\Department;

trait HasDepartment
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    /**
     * @return string
     */
    public function getDepartment()
    {
        return isset($this->department->name)? $this->department->name: null;
    }


}