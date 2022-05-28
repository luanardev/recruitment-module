<?php
namespace Luanardev\Modules\Recruitment\Concerns;
use Luanardev\Modules\Institution\Entities\Campus;
use Luanardev\Modules\Recruitment\Entities\Applicant;
use Luanardev\Modules\Recruitment\Entities\Application;

trait HasApplications
{

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function applications()
    {
        return $this->hasMany(Application::class, 'vacancy_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function applicants()
    {
        return $this->hasManyThrough(Applicant::class, Application::class, 'vacancy_id', 'id', 'id', 'applicant_id');
    }

    /**
     * Get shortlisted applicants
     *
     * @return \Illuminate\Support\Collection
     */
    public function shortlist()
    {
        return $this->applications()->whereStatus('Shortlisted')->get();
    }

    public function isApplied()
    {
        return ($this->applications()->count() > 0 )? true:false;
    }

    public function totalApplications()
    {
        return $this->applications()->count();
    }

    public function totalMale()
    {
        return $this->applicants()->whereGender('Male')->count();
    }

    public function totalFemale()
    {
        return $this->applicants()->whereGender('Female')->count();
    }

    public function totalReviewed()
    {
        return $this->applications()->whereStatus('Reviewed')->count();
    }

    public function totalShortlisted()
    {
        return $this->applications()->whereStatus('Shortlisted')->count();
    }

    
   
}