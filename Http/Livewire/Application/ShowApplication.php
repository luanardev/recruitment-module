<?php

namespace Luanardev\Modules\Recruitment\Http\Livewire\Application;
use Luanardev\LivewireUI\LivewireUI;
use Luanardev\Modules\Recruitment\Entities\Application;


class ShowApplication extends LivewireUI
{
    public Application $application;

    public function mount(Application $application)
    {
        $this->application = $application;
    }

    public function shortlist()
    {
        $this->application->shortlist();
        $this->emitRefresh()->toastr('Applicant shortlisted');
    }

    public function discard()
    {
        $this->application->discard();
        $this->emitRefresh()->toastr('Applicant discarded');
    }
    
    public function render()
    {
        return view('recruitment::livewire.application.application');
    }

}
