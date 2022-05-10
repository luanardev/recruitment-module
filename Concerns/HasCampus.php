<?php
namespace Luanardev\Modules\Recruitment\Concerns;
use Luanardev\Modules\Institution\Entities\Campus;

trait HasCampus
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campus()
    {
        return $this->belongsTo(Campus::class, 'campus_id');
    }

    /**
     * @return string
     */
    public function getCampus()
    {
        return isset($this->campus->name)? $this->campus->name: null;
    }
}