<?php

namespace Luanardev\Modules\Recruitment\Http\Livewire\Interview;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Modules\Recruitment\Entities\Interview;
use Luanardev\Modules\Recruitment\Entities\Vacancy;
use Luanardev\Modules\Recruitment\Entities\InterviewApplicant;
use Luanardev\Modules\Recruitment\Entities\InterviewPanelist;
use Luanardev\Modules\Institution\Entities\Campus;

use Luanardev\Modules\Employees\Entities\StaffView;


class CreateInterview extends LivewireUI
{
    public Interview $interview;

    public array $vacancy;

    public array $panelist;

    public function mount()
    {
        $this->interview = new Interview();
        $this->vacancy = [];
        $this->panelist = [];

    }

    public function save()
    {
  
        $this->interview->save();
        foreach($this->panelist as $staff){
            $panelist = new InterviewPanelist();
            $panelist->interview()->associate($this->interview);
            $panelist->staff()->associate($staff);
            $panelist->save();
        }

        $shortlist = $this->shortlist();

        foreach($shortlist as $applicant){
            $shortlist = new InterviewApplicant();
            $shortlist->interview()->associate($this->interview);
            $shortlist->applicant()->associate($applicant);
            $shortlist->save();
        }

        $this->emitRefresh()->toastr('Interview created successfully');
    }

    private function shortlist()
    {
        $shortlist = [];
        foreach($this->vacancy as $vacancyId){
            $vacancy = Vacancy::find($vacancyId);
            $applicants = $vacancy->shortlist()->pluck('applicant_id')->toArray();
            $shortlist = array_merge_recursive_distinct($shortlist, $applicants);
        }
        return $shortlist;
    }

    public function render()
    {
        $this->viewData();
        return view('recruitment::livewire.interview.create');
    }


    public function rules()
    {
        return [           
            'interview.campus_id' => 'required', 
            'interview.date' => 'required|date',
            'interview.time' => 'required|time',
            'interview.venue' => 'required|string',       
        ];
    }

    public function viewData()
    {
        $this->with('campus', Campus::getByUser()->pluck('id', 'name')->flip()->toArray() );
        $this->with('staff', StaffView::getByCampus()->pluck('id', 'fullname')->flip()->toArray() );
        $this->with('vacancy', Vacancy::getShortlisted()->pluck('id', 'post')->flip()->toArray() );

    }
}
