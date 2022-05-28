<?php

namespace Luanardev\Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Luanardev\Modules\Recruitment\Concerns\HasPosition;
use Luanardev\Modules\Recruitment\Concerns\HasJobType;
use Luanardev\Modules\Recruitment\Concerns\HasCampus;
use Luanardev\Modules\Recruitment\Concerns\HasDepartment;
use Luanardev\Modules\Recruitment\Concerns\HasSection;
use Luanardev\Modules\Recruitment\Concerns\HasApplications;
use Luanardev\Modules\Recruitment\Concerns\VacancyHelper;
use Luanardev\Modules\Institution\Concerns\CampusPicker;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class Vacancy extends Model
{
    use HasFactory, 
        HasPosition, 
        HasJobType, 
        HasCampus, 
        HasDepartment, 
        HasSection,
        HasApplications,
        VacancyHelper,
        CampusPicker,
        Loggable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_recruit_vacancies';

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
        'position_id', 'scale', 'campus_id', 'department_id', 'section_id','job_type_id', 
        'close_date', 'duration', 'positions', 'duties', 'requirements', 'benefits', 
        'published','applicable', 'status', 'audience'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'close_date' => 'date:Y-m-d',
    ];
    
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

     /**
     * Get Shortlisted Vacancies By Campus Name
     * @return Illuminate\Support\Collection
     */
    public static function getShortlisted($selected=[])
    {
        if(count($selected) == 0){
            return VacancyShortlisted::getByCampus()
                ->whereStatus('Open')
                ->get();
        }else{
            return VacancyShortlisted::whereIn('id', $selected)
                ->whereStatus('Open')
                ->get();
        }
       
       
    }
 
    public function setOpen()
    {
        $this->setAttribute('status', ucwords('Open'));
        return $this;
    }

    public function setClosed()
    {
        $this->setAttribute('status', ucwords('Closed'));
        return $this;
    }

    public function setRecruited()
    {
        $this->setAttribute('status', ucwords('Recruited'));
        return $this;
    }

    public function setPublished()
    {
        $this->setAttribute('published', ucwords('Yes') );
        return $this;
    }

    public function setNotPublished()
    {
        $this->setAttribute('published', ucwords('No') );
        return $this;
    }

    public function setApplicable()
    {
        $this->setAttribute('applicable', ucwords('Yes') );
        return $this;
    }

    public function setNotApplicable()
    {
        $this->setAttribute('applicable', ucwords('No') );
        return $this;
    }

    public function publish()
    {
        $this->setPublished();
        $this->save();
    }

    public function unpublish()
    {
        $this->setNotPublished();
        $this->save();
    }

    public function open()
    {
        $this->setOpen();
        $this->save();
    }

    public function close()
    {
        $this->setClosed();
        $this->save();
    }

    public function openApplications()
    {
        $this->setApplicable();
        $this->save();
    }

    public function closeApplications()
    {
        $this->setNotApplicable();
        $this->save();
    }

    public function makeExternal()
    {
        $this->setAttribute('audience', ucwords('external'));
        $this->save();
    }
    
    public function makeInternal()
    {
        $this->setAttribute('audience', ucwords('internal') );
        $this->save();
    }

    public function isPermanent()
    {
        return $this->isJobType('permanent');
    }

    public function isNotPermanent()
    {
        return !$this->isPermanent();
    }

    
}
