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


class ShowVacancy extends LivewireUI
{
    public Vacancy $vacancy;

    public $description;
    public $requirements;

    public function mount(Vacancy $vacancy)
    {
        $this->vacancy = $vacancy;
        $this->description = $vacancy->duties;
        $this->requirements = $vacancy->requirements;
    }

    public function save()
    {
        $this->vacancy->duties = $this->description;
        $this->vacancy->requirements = $this->requirements;
        $this->vacancy->save();
        $this->emitRefresh()->toastr('Vacancy updated');
    }

    public function delete()
    {
        if($this->vacancy->isPublished()){
            return $this->toastrError('Unpublish vacancy first');
        }
        if($this->vacancy->isApplicable()){
            return $this->toastrError('Close vacancy first');
        }
        if($this->vacancy->isApplied()){
            return $this->toastrError('Vacancy has applications');
        }
        $this->vacancy->delete();
        $this->alert('Vacancy deleted');
        $this->redirect(route('vacancy.index'));
    }

    public function publish()
    {
        $this->vacancy->publish();
        $this->emitRefresh()->toastr('Vacancy published');
    }

    public function unpublish()
    {
        $this->vacancy->unpublish();
        $this->emitRefresh()->toastr('Vacancy unpublished');
    }

    public function open()
    {
        $this->vacancy->openApplications();
        $this->emitRefresh()->toastr('Vacancy opened');
    }

    public function close()
    {
        $this->vacancy->closeApplications();
        $this->emitRefresh()->toastr('Vacancy closed');
    }
    
    public function render()
    {
        $this->viewData();
        return view('recruitment::livewire.vacancy.vacancy');
    }

    public function setDescription($value)
    {
        $this->description = $value;
    }

    public function setRequirements($value)
    {
        $this->requirements = $value;
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
            'vacancy.department_id' => 'required',
            'vacancy.section_id' => 'required',
            'vacancy.campus_id' => 'required',
            'vacancy.job_type_id' => 'required',
            'vacancy.duration' => 'nullable|string',
            'vacancy.positions' => 'required|numeric',
            'vacancy.status' => 'required|string',
            'vacancy.published' => 'required|string',
            'vacancy.audience' => 'required|string',
            'vacancy.close_date' => 'required|date',
            'description' => 'required',         
            'requirements' => 'required',         
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
