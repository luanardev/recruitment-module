<?php

namespace Luanardev\Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Luanardev\Modules\Recruitment\Concerns\WithApplicant;
use Luanardev\Modules\Recruitment\Concerns\WithVacancy;
use Luanardev\Modules\Recruitment\Concerns\ApplicationHelper;

class Application extends Model
{
    use HasFactory, 
        WithApplicant, 
        WithVacancy,
        ApplicationHelper;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_recruit_applications';

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
        'id', 'vacancy_id', 'applicant_id', 'status'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class, 'vacancy_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function applicant()
    {
        return $this->belongsTo(Applicant::class, 'applicant_id');
    }

    public function review()
    {
        $this->setAttribute('status', 'Reviewed');
        $this->save();
    }

    public function shortlist()
    {
        $this->setAttribute('status', 'Shortlisted');
        $this->save();
    }

    public function appoint()
    {
        $this->setAttribute('status', 'Appointed');
        $this->save();
    }

    public function discard()
    {
        $this->setAttribute('status', 'Reviewed');
        $this->save();
    }

    

   
}
