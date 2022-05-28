<?php

namespace Luanardev\Modules\Recruitment\Http\Livewire\Vacancy;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Modules\Institution\Entities\Department;
use Luanardev\Modules\Institution\Entities\Section;
use Luanardev\Modules\Institution\Entities\Campus;
use Luanardev\Modules\HRSettings\Entities\JobType;
use Luanardev\Modules\HRSettings\Entities\Position;
use Luanardev\Modules\HRSettings\Entities\JobScale;
use Luanardev\Modules\Recruitment\Entities\Vacancy;


class CreateVacancy extends LivewireUI
{
    public Vacancy $vacancy;
    public $description;
    public $requirements;

    public function mount()
    {
        $this->vacancy = new Vacancy();
    }

    public function save()
    {
        $this->validate();
        
        $this->vacancy->setOpen(); 
        $this->vacancy->setApplicable();
        $this->vacancy->setNotPublished();     
        $this->vacancy->save();
        $this->alert('Vacancy created');
        $this->redirect(route('vacancy.index'));
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function setRequirements($value)
    {
        $this->requirements = $value;
    }

    public function render()
    {
        $this->viewData();
        return view('recruitment::livewire.vacancy.create');
    }

    public function getListeners()
    {
        return [
            'setDescription',
            'setRequirements'
        ];
    }

    public function rules()
    {
        return [           
            'vacancy.position_id' => 'required', 
            'vacancy.scale' => 'required|string',
            'vacancy.job_type_id' => 'required',
            'vacancy.department_id' => 'required',
            'vacancy.section_id' => 'required',
            'vacancy.campus_id' => 'required',           
            'vacancy.duration' => 'nullable|string',
            'vacancy.positions' => 'required|numeric',
            'vacancy.audience' => 'required|string',
            'vacancy.close_date' => 'required|date',
            'vacancy.duties' => 'nullable|string',
            'vacancy.requirements' => 'nullable|string',
            'vacancy.benefits' => 'nullable|string',           
        ];
    }

    public function viewData()
    {
        $this->with('positions', Position::pluck('id', 'name')->flip()->toArray());
        $this->with('departments', Department::pluck('id', 'name')->flip()->toArray());
        $this->with('sections', Section::pluck('id', 'name')->flip()->toArray());
        $this->with('campuses', Campus::getByUser()->pluck('id', 'name')->flip()->toArray());
        $this->with('scales', JobScale::pluck('scale')->toArray());      
        $this->with('jobtypes', JobType::pluck('id', 'name')->flip()->toArray());

    }
}
