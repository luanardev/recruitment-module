<?php

namespace Luanardev\Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Haruncpi\LaravelUserActivity\Traits\Loggable;
use Luanardev\Modules\Employees\Entities\Staff;
use Luanardev\Modules\Recruitment\Concerns\HasCampus;
use Luanardev\Modules\Institution\Concerns\CampusPicker;

class Interview extends Model
{
    use HasFactory, 
        CampusPicker, 
        Loggable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_recruit_interviews';

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
        'venue', 'date', 'time','status','campus_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function applicants()
    {
        return $this->hasManyThrough(Applicant::class, InterviewApplicant::class, 'interview_id', 'id', 'id', 'applicant_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function panelists()
    {
        return $this->hasManyThrough(Staff::class, InterviewPanelist::class, 'interview_id', 'id', 'id', 'staff_id');
    }

    /**
     * Get Authenticated User Campus
     * @return Illuminate\Database\Eloquent\Builder
     */
    public static function getByCampus()
    {      
        $campus = static::getUserCampus();
        if(empty($campus)){
            return static::query();        
        }else{
            return static::findByCampus($campus->id);
        }        
    }

    /**
     * Get Vacancies By Campus Name
     * @return Illuminate\Database\Eloquent\Builder
     */
    public static function findByCampus($id)
    {
        return static::where('campus_id', $id);
    }
}
