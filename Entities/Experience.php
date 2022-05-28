<?php

namespace Luanardev\Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Experience extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_recruit_experiences';

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
        'applicant_id', 'employer_name', 'employer_address', 'employer_phone', 'position', 
        'salary', 'duties', 'benefits', 'reason_for_leave', 'country','start_date', 'end_date'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'start_date' => 'date:Y-m-d',
        'end_date' => 'date:Y-m-d'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
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
     * Get  period
     */
    public function period()
    {
        return isset($this->start_date) && isset($this->end_date) ? 
            Carbon::createFromDate($this->start_date)->diff($this->end_date)->format('%y Years, %m Months') : null;
    }
}
