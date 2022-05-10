<?php
namespace Luanardev\Modules\Recruitment\Concerns;
use Luanardev\Modules\Institution\Entities\Section;

trait HasSection
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }

    /**
     * @return string
     */
    public function getSection()
    {
        return isset($this->section->name)? $this->section->name: null;
    }
}