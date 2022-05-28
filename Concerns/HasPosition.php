<?php
namespace Luanardev\Modules\Recruitment\Concerns;
use Luanardev\Modules\HRSettings\Entities\Position;

trait HasPosition
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }

    /**
     * @return string
     */
    public function getPosition()
    {
        return isset($this->position->name)? $this->position->name: null;
    }
}