<?php

namespace Luanardev\Modules\Recruitment\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Luanardev\Modules\Recruitment\Concerns\HasDesignation;
use Luanardev\Modules\Recruitment\Concerns\HasGrade;
use Luanardev\Modules\Recruitment\Concerns\HasCampus;
use Luanardev\Modules\Recruitment\Concerns\HasDepartment;
use Luanardev\Modules\Recruitment\Concerns\HasSection;
use Haruncpi\LaravelUserActivity\Traits\Loggable;

class JobVacancy extends Model
{
    use HasFactory, 
        HasDesignation, 
        HasGrade, 
        HasCampus, 
        HasDepartment, 
        HasSection,
        Loggable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hrm_job_vacancies';

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
        'id', 'designation_id', 'grade', 'campus_id', 'department_id', 'section_id',
        'close_date', 'published', 'status'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'close_date' => 'date:Y-m-d',
    ];

    
    public function open()
    {
        $this->setAttribute('status', 'open');
        $this->save();
    }

    public function close()
    {
        $this->setAttribute('status', 'closed');
        $this->save();
    }

    public function publish()
    {
        $this->setAttribute('published', ucwords('yes') );
        $this->save();
    }

    public function unpublish()
    {
        $this->setAttribute('published', ucwords('no') );
        $this->save();
    }

    public function isOpen()
    {
        return (strtolower($this->status) == strtolower('open') )? true:false;
    }

    public function isClosed()
    {
        return (strtolower($this->status) == strtolower('closed') )? true:false;
    }

    public function isPublished()
    {
        return (strtolower($this->published) == strtolower('yes') )? true:false;
    }

    public function isUnpublished()
    {
        return (strtolower($this->published) == strtolower('no') )? true:false;
    }


    
}
