<?php

namespace Luanardev\Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Luanardev\Modules\Employees\Entities\Staff;

class InterviewPanelist extends Model
{
    use HasFactory, 
        Loggable;

    public $timestamps=false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_recruit_interview_panelists';

	/**
     * The primary key associated with the model.
     *
     * @var string
     */
	protected $primaryKey = 'id';

    /**
     * Fillable attributes
     *
     * @var array
     */
    protected $fillable = [
        'interview_id', 'staff_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function staff()
    {
        return $this->belongsTo(Staff::class, 'staff_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function interview()
    {
        return $this->belongsTo(Interview::class, 'interview_id');
    }

}
