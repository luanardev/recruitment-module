<?php
namespace Luanardev\Modules\Recruitment\Concerns;
use Luanardev\Modules\Employees\Entities\Designation;

trait HasDesignation
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    /**
     * @return string
     */
    public function getDesignation()
    {
        return isset($this->designation->name)? $this->designation->name: null;
    }
}