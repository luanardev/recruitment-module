<?php

namespace Luanardev\Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Qualification extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_recruit_qualifactions';

	/**
     * The primary key associated with the model.
     *
     * @var string
     */
	protected $primaryKey = 'id';

    /**
     * @var array
     */
    protected $fillable = [
        'applicant_id','name', 'level', 'class', 'institution', 'country', 'start_date', 'end_date', 
        'graduated', 'graduation_date', 'attachment_name', 'attachment_file'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d',
        'graduation_date' => 'date:Y-m-d',
    ];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }

    public function isGradudated()
    {
        return (strtolower($this->status) == strtolower('open') )? true:false;
    }

    /**
     * Joining date
     *
     * @return string
     */
    public function startDate()
    {
        return (isset($this->start_date))? $this->start_date->format('d-M-Y'):null;
    }

    /**
     * Exit date
     *
     * @return string
     */
    public function endDate()
    {
        return (isset($this->end_date)) ? $this->end_date->format('d-M-Y'):null;
    }

    /**
     * Exit date
     *
     * @return string
     */
    public function graduationDate()
    {
        return (isset($this->graduation_date)) ? $this->graduation_date->format('d-M-Y'):null;
    }
}
